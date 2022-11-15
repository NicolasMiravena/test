<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Agregar nuevo Indicador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('save') }}" id="addForm">
                    <div class="mb-3">
                        <label for="nombreIndicador">Nombre Indicador</label>
                        <input type="text" name="nombreIndicador" class="form-control" placeholder="Nombre Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigoIndicador">Codigo Indicador</label>
                        <input type="text" name="codigoIndicador" class="form-control" placeholder="Codigo Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="unidadMedidaIndicador">Unidad Medida Indicador</label>
                        <input type="text" name="unidadMedidaIndicador" class="form-control" placeholder="Unidad Medida Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="valorIndicador">Valor Indicador</label>
                        <input type="text" name="valorIndicador" class="form-control" placeholder="Valor Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaIndicador">Fecha Indicador</label>
                        <input type="date" name="fechaIndicador" class="form-control" placeholder="Fecha Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="origenIndicador">Origen Indicador</label>
                        <input type="text" name="origenIndicador" class="form-control" placeholder="Origen Indicador" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal editar --}}

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Editar Indicador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('update') }}" id="editForm">
                    <input type="hidden" id="indicadorId" name="indicadorId">
                    <div class="mb-3">
                        <label for="editnombreIndicador">Nombre Indicador</label>
                        <input type="text" name="editnombreIndicador" id="editnombreIndicador" class="form-control" placeholder="Nombre Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="editcodigoIndicador">Codigo Indicador</label>
                        <input type="text" name="editcodigoIndicador" id="editcodigoIndicador" class="form-control" placeholder="Codigo Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="editunidadMedidaIndicador">Unidad Medida Indicador</label>
                        <input type="text" name="editunidadMedidaIndicador" id="editunidadMedidaIndicador" class="form-control" placeholder="Unidad Medida Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="editvalorIndicador">Valor Indicador</label>
                        <input type="text" name="editvalorIndicador" id="editvalorIndicador" class="form-control" placeholder="Valor Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="editfechaIndicador">Fecha Indicador</label>
                        <input type="text" name="editfechaIndicador" id="editfechaIndicador" class="form-control" placeholder="Fecha Indicador" required>
                    </div>
                    <div class="mb-3">
                        <label for="editorigenIndicador">Origen Indicador</label>
                        <input type="text" name="editorigenIndicador"  id="editorigenIndicador" class="form-control" placeholder="Origen Indicador" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal eliminar --}}

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Eliminar Indicador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>¿Esta seguro que desea eliminar este Indicador?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="deleteIndicador" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>