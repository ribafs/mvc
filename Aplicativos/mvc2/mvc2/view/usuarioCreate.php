<?php include ('layout/head.php'); ?>

<form id="form_create" class="btnAjax">
 <input type="hidden" name="c" value="usuario">
 <input type="hidden" name="a" value="store">
 
  <div class="form-group">
    <label for="num_doc">Número de documento</label>
    <input type="text" id="num_doc" class="form-control" name="num_doc" required pattern="[0-9]{10,12}" title="El numero debe contener de 10 a 12 digitos">
  </div>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" id="name" class="form-control" name="name" required pattern="[A-Za-z]{0,45}">
  </div>
  <div class="form-group">
    <label for="contrasena">Contraseña</label>
    <input type="password" id="contrasena" class="form-control" name="contrasena" required>
  </div>
  <input type="submit" class="btn btn-primary" value="Crear">
  <a href="index.php?c=usuario&a=index" class="btn btn-dark">Volver</a>
</form>

<?php 
include ('layout/script.php');
include ('layout/footer.php'); ?>