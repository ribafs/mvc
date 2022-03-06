<div class="container">
    <h2 class="text-center">Produto</h2>
    <div>
		<br><br>

        <form action="<?php echo URL; ?>produtos/update" method="POST">   
        <table class="table table-hover table-stripped">
            <td><label>Nome</label></td>
            <td><input class="form-control" type="text" name="nome" value="<?php echo htmlspecialchars($um->nome, ENT_QUOTES, 'UTF-8'); ?>" /></td></tr>
            <tr><td><label>Descrição</label></td>
            <td><input class="form-control" type="text" name="descricao" value="<?php echo htmlspecialchars($um->descricao, ENT_QUOTES, 'UTF-8'); ?>" required autofocus/></td></tr>
            <td><label>Unidade</label></td>
            <td><input class="form-control" type="text" name="unidade" value="<?php echo htmlspecialchars($um->unidade, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <input type="hidden" name="produto_id" value="<?php echo htmlspecialchars($um->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_produto" value="Update Produto" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
<br><br><br>
