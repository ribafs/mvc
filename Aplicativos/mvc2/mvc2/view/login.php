<?php include('layout/head.php');
//echo '<div class="jumbotron text-center">'.$prueba."  ".$prueba2.'</div>';
?>
<form id="fLogin" class="form btnAjax col-md-6 offset-md-3">
  <input type="hidden" value="usuario" name="c">
  <input type="hidden" value="login" name="a">
  
  <h2>Login</h2>
  <div class="form-group">
    <label for="user">
      Nombre de usuario
    </label>
    <input type="text" name="user" id="user" class="form-control">
  </div>
  <div class="form-group">
    <label for="pass">
      Contraseña
    </label>
    <input type="password" name="pass" id="pass" class="form-control">
  </div>
  <input data-form="fLogin" type="submit" class="btn btn-primary" value="Ingresar">
</form>

<?php include('layout/script.php'); ?>
<?php include('layout/footer.php');