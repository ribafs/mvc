<?php include('layout/head.php');?>

<button id="btnMostrar" class="btn btn-primary">Mostrar lista desplegable</button>

<h1>Registrar Cliente</h1>

<form class="col-md-6 offset-md-3 fAjax" data-metodo="POST">

 <input type="hidden" name="c" value="cliente">
 <input type="hidden" name="a" value="store">
 
  <div class="form-group">
    <label>Tipo documento</label>
    <select name="tipodocumento" class="form-control">
    	<option value="">Seleccione...</option>
    	<option value="1">Cédula</option>
    	<option value="2">Tarjeta Identidad</option>
    </select>
  </div>
  <div class="form-group">
    <label>Número de documento</label>
    <input type="number" class="form-control" name="documento">
  </div>

  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="form-group">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido">
  </div>
  <div class="form-group text-center">
  <button id="btnRegistrar" class="btn btn-primary">Registrarse</button>
  <!--<input type="button" class="btn btn-primary" value="Registrarse">-->
  <a href="index.php" class="btn btn-dark">Volver</a>
</div>
</form>

<div id="lista"></div>
<?php include('layout/script.php'); 
 	  include('layout/footer.php');?>