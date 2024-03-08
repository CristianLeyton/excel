<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generar etiquetas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="">
    <main class="container">

        <header class="mt-5">
            <h3>Generar etiquetas</h3>
            <h5>Farmacia Cabildo</h5>
        </header>
        <hr>
        <p>
            Instrucciones: <br>
            • Genere el archivo "Etiquetas" desde el sistema Winfarma<br>
            • Guarde el archivo con la extension .xlsx<br>
            • Importe el archivo en esta página y de click en "Cargar Excel"<br>
            • Luego podrá exportar el pdf que se genera, con las etiquetas <br>
            <br>
            • Si quiere generar su archivo excel manualmente, le dejo un ejemplo: 
            <a class="btn btn-primary" style="transform: scale(0.7)" href="{{ url('/Ejemplo.xlsx') }}">Descargar ejemplo <i class='bx bxs-file-blank'></i> </a>
        </p>

        <hr>
        <h5>Importar archivo Excel:</h5>
        <form action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="file-input" accept=".xlsx" onchange="habilitarBoton()">
            <br>
            <button id="btn-generar" class="mt-3 btn btn-success" type="submit" disabled>
                <i class='bx bxs-file-export' style="transform: scale(1.3)"></i>
                Cargar Excel</button>
        </form>
        <hr>
        {{-- <a class="btn btn-primary" href="{{ url('/export') }}">Generar</a> --}}

        @if($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    El archivo debe tener la extensión <b>.xlsx</b>
                @endforeach
        </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <a href="{{ route('exportar-pdf') }}" class="btn btn-danger" title="PDF" target="_blank">
                <i class='bx bxs-file-blank' style="transform: scale(1.3)"></i>
                Generar PDF
            </a>
        @endif
    </main>
</body>

</html>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script>
    function habilitarBoton() {
        var fileInput = document.getElementById('file-input');
        var generarBtn = document.getElementById('btn-generar');

        // Habilita el botón si se ha seleccionado un archivo, de lo contrario, deshabilita el botón
        generarBtn.disabled = !fileInput.files.length;
    }
</script>
