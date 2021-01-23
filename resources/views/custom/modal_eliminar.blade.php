<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">¿Deseas eliminar esta Categoría?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i style="color: #d4c32f; width: 20px;" class="fas fa-exclamation-triangle"></i><b> Advertencia!</b> <em>Una vez eliminado este registro ya no se puede volver a recuperar.</em>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form :action="urlaeliminar" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Sí</button>
                </form>
            </div>
        </div>
    </div>
</div>
