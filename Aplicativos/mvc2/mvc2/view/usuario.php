<?php include ('layout/head.php'); ?>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Documento</th>
    </tr>
  </thead>
  <tbody>

<?php //var_dump($dat);
//  var_dump($menu);
  if($dat!=false){
    foreach($dat as $key=>$value){ 
      echo '<tr><td>'.$value->id.'</td><td>'.$value->nombre.'</td><td>'.$value->documento.'</td><td><button type="button" class="btn btn-warning" onclick="editar('.$value->id.')">Editar</button></td><td><button type="button" class="btn btn-danger" onclick="eliminar('.$value->id.')">Eliminar</button></td><td><button type="button" class="btn btn-primary" onclick="mostrar('.$value->id.')">Ver</button></td></tr>';
  
    }
  }else{
    echo '<tr><td class="text-center" colspan="3">No hay registros</td></td>';
  }
  
?>

  </tbody>

</table>

<a class="btn btn-primary" href="index.php?c=usuario&a=create">Crear un usuario</a>

<input type="hidden" id="c" value="usuario">

<!--
<div class="modal fade" id="modalEditar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Editar</h3>
        <button type="button" class="close" data-dismiss="modal">
          <span>x</span>
        </button>
      </div>
      <div class="modal-body" id="form_edit">
        <form>
          <input type="hidden" name="c" value="usuario">
          <input type="hidden" name="a" value="update">

          <div class="form-group">
            <label for="num_doc">Número de documento</label>
            <input type="text" id="num_doc" class="form-control" name="num_docE" required pattern="[0-9]{10,12}" title="El numero debe contener de 10 a 12 digitos">
          </div>
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" class="form-control" name="nameE" required pattern="[A-Za-z]{0,45}">
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Editar">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEliminar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Confirmación</h3>
        <button type="button" class="close" data-dismiss="modal">
          <span>x</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el registro: 
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-danger w-50">Si</button>
        <button type="button" class=" btn btn-primary w-50">No</button>
      </div>
    </div>
  </div>
</div>
-->
<?php 
include ('layout/script.php');
include ('layout/footer.php'); ?>