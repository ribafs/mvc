<?php require_once('view/layout/head.php'); ?>
<h1>Registrar Cliente</h1>

<form method="POST" action="index.php" class="col-md-6 offset-md-3">

 <input type="hidden" name="c" value="cliente">
 <input type="hidden" name="a" value="store">
 
  <div class="form-group">
    <label>Tipo documento</label>
    <select name="tipodocumento" class="form-control" required>
    	<option value="">Seleccione...</option>
    	<option value="1">Cédula</option>
    	<option value="2">Tarjeta Identidad</option>
    </select>
  </div>
  <div class="form-group">
    <label>Número de documento</label>
    <input type="number" class="form-control" name="documento" required>
  </div>

  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="form-group">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" required>
  </div>
  <div class="form-group text-center">
  <input type="submit" class="btn btn-primary" value="Registrarse">
  <a href="index.php" class="btn btn-dark">Volver</a>
</div>
</form>

<?php require_once('view/layout/script.php'); ?>
<?php require_once('view/layout/footer.php'); ?>