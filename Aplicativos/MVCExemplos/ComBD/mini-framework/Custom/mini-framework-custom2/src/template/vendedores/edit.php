<div class="container">
    <h2 class="text-center">Vendedores</h2>
    <!--<h5>You are in the View: src/tempalte/vendedores/edit.php (everything in this box comes from that file)</h5>-->
    <!-- add countrie form -->
    <div>
		<br><br>

        <form action="<?php echo URL; ?>vendedores/update" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Nome</label></td>
            <td><input class="form-control" type="text" name="nome" value="<?php echo $vendedor->nome; ?>" required autofocus/></td></tr>
            <td><label>E-mail</label></td>
            <td><input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($vendedor->email, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <input type="hidden" name="vendedor_id" value="<?php echo htmlspecialchars($vendedor->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_vendedor" value="Update Vendedor" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
<br><br><br>
