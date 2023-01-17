<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;
use Illuminate\Support\Facades\Storage;

class CertificadoController extends Controller
{
    public function index()
    {
        //Libreria: https://github.com/endroid/qr-code

        $writer = new PngWriter();
        $qrCode = new QrCode('http://www.supportficct.com');
        $qrCode->setSize(250);
        $result = $writer->write($qrCode);

        $dir = "qr/";
        $image = $result->getString();
        $imageName = "qr" . "-" . uniqid() . ".png";
        Storage::disk('public')->put($dir . $imageName, $image);
        $url="/storage/".$dir.$imageName;
        dd($url);
        return view('certificados.index');
    }
}
