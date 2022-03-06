<div class="container">
    <h2 class="text-center">Produtos</h2>
    <div>
        <br>
        <form action="<?php echo URL; ?>produtos/add" method="POST">   
        <table class="table table-hover table-stripped">
            <td><label>Nome</label></td>
            <td><input class="form-control" type="text" name="nome" value="" /></td></tr>
            <tr><td><label>Descrição</label></td>
            <td><input class="form-control" type="text" name="descricao" value="" required /></td></tr>
            <td><label>Unidade</label></td>
            <td><input class="form-control" type="text" name="unidade" value="" required /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_add_produto" value="Add Produto" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
