<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificado;
use App\Models\Personal;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Writer\ValidationException;

class CertificadoController extends Controller
{
    public $url = "http://supportficct.com/tecno_final";
    public $asseturl = "http://supportficct.com/tecno_final/public";

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
        $link = $this->url . "/certificado/verificar/" . $codigo;

        $qrCode = QrCode::create($link)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(250)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $image = $result->getString();
        $imageName = "codigoqr" . $codigo . ".png";
        $path = public_path() . '/qr/' . $imageName;
        $url = "/qr/" . $imageName;
        file_put_contents($path, $image);

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
        $ruta =  $this->asseturl . $certificado->qr_path;
        $imagenBase64 = "";
        //if (file_exists($ruta)) {
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        //}

        $qr = $imagenBase64;
        return view('certificados.show', compact('certificado', 'qr'));
    }
    public function show(Certificado $certificado)
    {
        $ruta =  $this->asseturl  .  $certificado->qr_path;
        $imagenBase64 = "";
        //if (file_exists($ruta)) {
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        //}
        $qr = $imagenBase64;
        return view('certificados.show', compact('certificado', 'qr'));
    }

    public function download(Certificado $certificado)
    {
        $ruta = $this->asseturl  . $certificado->qr_path;
        $imagenBase64 = "";
        //if (file_exists($ruta)) {
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        //}
        $qr = $imagenBase64;
        $pdf = Pdf::loadView('certificado', compact('certificado', 'qr'));
        return $pdf->download('certificado.pdf');
    }

    public function destroy(Certificado $certificado)
    {
        if ($certificado->qr_path) {
            $ruta = public_path($certificado->qr_path);
            if (file_exists($ruta)) {
                unlink($ruta);
            }
        }
        $certificado->delete();
        return redirect()->route('certificados.index')->with('success', 'Certificado eliminado exitosamente');
    }
}
