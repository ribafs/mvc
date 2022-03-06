  <div class="modal fade" id="confModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmacion</h3>
          <button type="button" data-dismiss="modal" class="close">
            <span>x</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="btnAjax" id="formDel">
            <input type="hidden" name="c" value="usuario">
            <input type="hidden" name="a" value="delete">
            <input type="hidden" name="id" id="id">
            Desea eliminar el registro con el id: <span id="spanId"></span><br>
            <input type="submit" class="btn btn-danger w-25 mt-4" value="Si">
            <input type="button" class="btn btn-primary w-25 mt-4" value="No" data-dismiss="modal">
          </form>
        </div>
<!--
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" value="Cerrar" data-dismiss="modal">
        </div>
-->
      </div>
    </div>
  </div>   

  <div class="modal fade" id="msjModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"></h3>
          <button type="button" data-dismiss="modal" class="close">
            <span>x</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" value="Cerrar" data-dismiss="modal" autofocus>
        </div>
      </div>
    </div>
  </div>
  
  </div><!-- Container-fluid -->
  <script src="public/js/jquery-3.3.1.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/funciones.js"></script>
  <script src="public/js/pruebaAjax.js"></script>