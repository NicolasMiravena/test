@extends('app')

@section('contenido')
<h1 class="page-header text-center">Indicadores</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>
            Tabla indicadores
            <button type="button" id="agregar" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right">Agregar</button>
            <a href=" {{ url('grafico') }}" class="btn btn-success">grafica</a>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Indicador</th>
                    <th>Codigo Indicador</th>
                    <th>Unidad Medida Indicador</th>
                    <th>Valor Indicador</th>
                    <th>Fecha Indicador</th>
                    <th>Origen Indicador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="indicadoresBody">

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            mostrarDatos();

            $('#addForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function() {
                        $('#addnew').modal('hide');
                        $('#addForm')[0].reset();
                        mostrarDatos();
                    }
                })
            });

            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var nombreIndicador = $(this).data('nombre');
                var codigoIndicador = $(this).data('codigo');
                var unidadMedidaIndicador = $(this).data('medida');
                var valorIndicador = $(this).data('valor');
                var fechaIndicador = $(this).data('fecha');
                var origenIndicador = $(this).data('origen');
                $('#editmodal').modal('show');
                $('#editnombreIndicador').val(nombreIndicador);
                $('#editcodigoIndicador').val(codigoIndicador);
                $('#editunidadMedidaIndicador').val(unidadMedidaIndicador);
                $('#editvalorIndicador').val(valorIndicador);
                $('#editfechaIndicador').val(fechaIndicador);
                $('#editorigenIndicador').val(origenIndicador);
                $('#indicadorId').val(id);
            });

            $('#editForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#editmodal').modal('hide');
                    mostrarDatos();
                })
            });

            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deleteIndicador').val(id);
            });

            $('#deleteIndicador').click(function(){
                var id = $(this).val();
                $.post(" {{ URL::to('delete')}} ", {id:id}, function() {
                    $('#deletemodal').modal('hide');
                    mostrarDatos();
                })
            })
        })

        function mostrarDatos(){
            $.get("{{ URL::to('show') }}", function(data){
                $('#indicadoresBody').empty().html(data);
            })
        }

    </script>
@endsection