<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body {
            margin: 30px 50px;
            text-align: justify;
        }

        .tab {
            margin-left: 50px;
        }

        .firmas {
            display: flex;
            /*Convertimos al menú en flexbox*/
            justify-content: space-between;
            /*Con esto le indicamos que margine todos los items que se encuentra adentro hacia la derecha e izquierda*/
            align-items: center;
            /*con esto alineamos de manera vertical*/
            text-align: center;

        }

        .firma {
            width: 40%;
            display: inline-block;
        }

        .firma1 {
            text-align: right;
            margin-left: 30px;
            margin-right: 30px;
            text-align: center;
        }

        .firma2 {
            text-align: left;
            margin-left: 30px;
            margin-right: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div align="center">
        <h2><b>FACULTAD INTEGRAL DEL CHACO</b></h2>
        <P><u>FACULTAD INTEGRAL DEL CHACO</u></P>
        <br>
        <br>
        <h3><b><u>CERTIFICADO DE TRABAJO</u></b></h3>
    </div>
    <br>
    <h5><b>CERTIFICA:</b></h5>
    <br>
    <P>Revisadas las Bases de Datos en el Sistema respectivo, se evidencia que:</P>
    <p class="tab"><b>Nombre: {{ $certificado->Personal->apellido }} {{ $certificado->Personal->nombre }} </b></p>
    <p class="tab"><b>Cédula de identidad: {{ $certificado->Personal->ci }}</b></p>
    <p class="tab"><b>Cargo: {{ $certificado->Personal->TipoPersonal->nombre }}</b></p>
    <p class="tab"><b>Codigo: {{ $certificado->codigo }}</b></p>
    <br>
    <P>Profesional que presta servicios en la Facultad Integral del Chaco como Profesor</P>

    <P>Es todo cuanto se certifica en honor a la verdad, de acuerdo con documentos que cursan en oficina a solicitud del
        intereado (a) y para fines consiguientes que en su derecho corresponde.</P>

    <br>
    <div align="center">
        <P><b>Camiri, {{ $certificado->created_at->format('d') }} de
                @if ($certificado->created_at->format('F') == 'January')
                    Enero
                @endif
                @if ($certificado->created_at->format('F') == 'February')
                    Febrero
                @endif
                @if ($certificado->created_at->format('F') == 'March')
                    Marzo
                @endif
                @if ($certificado->created_at->format('F') == 'April')
                    Abril
                @endif
                @if ($certificado->created_at->format('F') == 'May')
                    Mayo
                @endif
                @if ($certificado->created_at->format('F') == 'June')
                    Junio
                @endif
                @if ($certificado->created_at->format('F') == 'July')
                    Julio
                @endif
                @if ($certificado->created_at->format('F') == 'August')
                    Agosto
                @endif
                @if ($certificado->created_at->format('F') == 'September')
                    Septiembre
                @endif
                @if ($certificado->created_at->format('F') == 'October')
                    Octubre
                @endif
                @if ($certificado->created_at->format('F') == 'November')
                    Noviembre
                @endif
                @if ($certificado->created_at->format('F') == 'December')
                    Diciembre
                @endif
                del {{ $certificado->created_at->format('Y') }}
            </b> </b></P>
    </div>
    <br>
    <br>
    <br>
    @if (strlen($qr) > 0)
        <div class="firmas">
            <div class="firma">
                <img src="{{ $qr }}" width="150px" height="150px">
            </div>
            <div class="firma">
                <p class="firma2"></p>
            </div>
        </div>
    @endif

</body>

</html>
