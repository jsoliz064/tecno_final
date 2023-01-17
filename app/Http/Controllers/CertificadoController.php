<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificado;
use App\Models\Personal;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificadoController extends Controller
{
    public function index()
    {
        $certificados = Certificado::all();
        return view('certificados.index', compact('certificados'));
    }
    public function create()
    {
        $personal = Personal::all();
        return view('certificados.create', compact('personal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'personal_id' => 'required',
        ]);

        //Libreria: https://github.com/endroid/qr-code
        $codigo = uniqid();
        $link = env('SERVER_NAME') . env('ASSET_URL') . "/certificado/verificar/" . $codigo;

        $writer = new PngWriter();
        $qrCode = new QrCode($link);
        $qrCode->setSize(250);
        $result = $writer->write($qrCode);

        $dir = "qr/";
        $image = $result->getString();
        $imageName = "qr" . "-" . $codigo . ".png";
        Storage::disk('public')->put($dir . $imageName, $image);
        $url = "/storage/" . $dir . $imageName;

        $certificado = Certificado::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'personal_id' => $request->personal_id,
            'codigo' => $codigo,
            'qr_path' => $url,
            'link' => $link
        ]);
        return redirect()->route('certificados.index')->with('success', 'Certificado registrado exitosamente');
    }
    public function verificar($codigo)
    {
        $certificado = Certificado::where('codigo', $codigo)->get()->first();
        if ($certificado == null) {
            $qr = "";
            return view('certificados.show', compact('certificado', 'qr'));
        }
        $ruta = "../public" . $certificado->qr_path;
        $imagenBase64 = "";
        if (file_exists($ruta)) {
            $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        }

        $qr = $imagenBase64;
        return view('certificados.show', compact('certificado', 'qr'));
    }
    public function show(Certificado $certificado)
    {
        $ruta = "../public".$certificado->qr_path;
        //$ruta=substr($ruta,9,strlen($ruta));
        $imagenBase64 = "";
        //if (Storage::exists($ruta)) {
            //dd("ga");
            $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        //}
        $qr = $imagenBase64;
        return view('certificados.show', compact('certificado', 'qr'));
    }

    public function download(Certificado $certificado)
    {
        $ruta = $certificado->qr_path;
        $imagenBase64 = "";
        if (Storage::exists($ruta)) {
            $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        }
        $qr = $imagenBase64;
        $pdf = Pdf::loadView('certificado', compact('certificado', 'qr'));
        return $pdf->download('certificado.pdf');
    }

    public function destroy(Certificado $certificado)
    {
        $ruta = "public" . $certificado->qr_path;
        if (file_exists("../" . $ruta)) {
            unlink("../" . $ruta);
        }
        $certificado->delete();
        return redirect()->route('certificados.index')->with('success', 'Certificado eliminado exitosamente');
    }
}
