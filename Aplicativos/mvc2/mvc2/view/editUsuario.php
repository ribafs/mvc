<form class="btnAjax" id="formEdit">
  <input type="hidden" name="c" value="usuario">
  <input type="hidden" name="a" value="update">
  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <div class="form-group">
    <label for="num_doc">Número de documento</label>
    <input type="text" id="num_doc" class="form-control" name="num_doc" required pattern="[0-9]{10,12}" title="El numero debe contener de 10 a 12 digitos" value="<?php echo $documento; ?>">
  </div>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" id="name" class="form-control" name="name" required pattern="[A-Za-z]{0,45}" value="<?php echo $nombre; ?>">
  </div>
  <input type="submit" class="btn btn-success btn-block" value="Cambiar">
</form>