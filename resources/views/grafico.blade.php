<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Graficos</title>
  </head>
  <body>
    <h1 class="text-center">Variacion Indicadores</h1>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display:felx; justify-content:space-between;">
                        <form action="{{ url('grafico') }}" method="POST">
                            @csrf
                            <div class="col mt-2">
                                <label for="fechInicio" class="form-label">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ $fecha_inicio }}">
                            </div> 
                            <div class="col mt-2">
                                <label for="fechaFin" class="form-label">Fecha Fin</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ $fecha_fin }}">
                            </div>
                            <button type="submit" class="btn btn-info btn-sm">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div id="container">

                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href=" {{ url('/') }}" class="btn btn-success">Volver</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
  </body>

  <script>
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Variacion Indicadores'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: {!! $data !!}
    }]
});
  </script>
</html>