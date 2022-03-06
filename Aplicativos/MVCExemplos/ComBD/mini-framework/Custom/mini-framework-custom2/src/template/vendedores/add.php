<div class="container">
    <h2 class="text-center">Vendedores</h2>
    <!--<b>You are in the View: src/template/vendedores/add.php (everything in this box comes from that file)</b><br>-->
    <!-- add customer form -->
    <div>
        <br>
        <form action="<?php echo URL; ?>vendedores/add" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Nome</label></td>
            <td><input class="form-control" type="text" name="nome" value="" required /></td></tr>
            <td><label>E-mail</label></td>
            <td><input class="form-control" type="email" name="email" value="" required /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_add_vendedor" value="Add Vendedor" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
