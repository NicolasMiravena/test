<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <div class="form-group">
        <div class="input-group">
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <label class="control-label" for="date">Fecha Inicio</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <label class="control-label" for="date">Fecha Fin</label>
                <input type="text" class="form-control">
            </div>
            <input type="button" value="FIltrar">
        </div>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre Indicador</th>
                    <th>Codigo Indicador</th>
                    <th>Unidad Medida Indicador</th>
                    <th>Valor Indicador</th>
                    <th>Fecha Indicador</th>
                    <th>Origen Indicador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($lista as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombreIndicador }}</td>
                    <td>{{ $item->codigoIndicador }}</td>
                    <td>{{ $item->unidadMedidaIndicador }}</td>
                    <td>{{ $item->valorIndicador }}</td>
                    <td>{{ $item->fechaIndicador }}</td>
                    <td>{{ $item->origenIndicador }}</td>
                    <td>
                        <input type="button" value="Modificar" class="btn btn-warning">
                        <input type="button" value="Eliminar" class="btn btn-danger" id="btnEliminar" onclick="eliminar( {{$item->id}} )">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $lista->links() }}
    </div>
</body>

<script>
    function eliminar(id){
        
    }
</script>
</html>