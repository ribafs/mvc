<?php 
// Busca
if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];
}
print '<div class="container" align="center">';
print '<h4>Registro(s) encontrado(s)</h4>';

if(count($rows) > 0){
?>
<div class="container" align="center">
  <table class="table table-hover">
    <tr>
      <th>ID</th><th>Nome</th><th>Idade</th>
    </tr>
 
<?php
    foreach ($rows as $row){
      print '<tr>';
        print '<td>'.$row->id.'</td><td>'.$row->nome.'</td><td>'.$row->idade.'</td>';
      print '</tr>';
    } 
    echo "</table>";

}else{
    print '<h3>Nenhum Registro encontrado!</h3>';
}
?>
<br>
<input name="send" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
</div>

