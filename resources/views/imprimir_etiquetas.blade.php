<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Etiquetas PDF</title>
</head>
<style>

	@page {
        margin-top: 1.5cm;
		margin-bottom: 0;
		margin-left: 0;
		margin-right: 0;
	}
</style>
<body>
{{-- <h3 class="text-center"> Etiquetas de {{$etiquetas[0]->laboratorio}}</h3> --}}

    <div class="container-fluid d-flex flex-wrap" style="width: 100vw;">
    @foreach ($etiquetas as $producto)
    <div class="card text-center" style="height: 3cm; width: 5.5cm; display: inline-block; margin-bottom: 4px;">
        <div class="card-body d-flex flex-column justify-content-between p-1">
          <h3 class="card-title mb-0">${{ round($producto->precio,2)}}</h3>
          <p class="">{{ Str::limit($producto->producto, 100) }}</p>
        </div>
            {{-- <span class="text-muted">{{ $producto->laboratorio }}</span>
            <span class="text-muted">{{ $producto->codbarra }}</span> --}}
    </div>
    @endforeach
    </div>
</body>
</html>