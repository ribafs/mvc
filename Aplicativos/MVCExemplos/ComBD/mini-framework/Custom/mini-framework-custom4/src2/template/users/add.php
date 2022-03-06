<div class="container">
    <h2 class="text-center">Users</h2>
    <!--<b>You are in the View: src/template/users/add.php (everything in this box comes from that file)</b><br>-->
    <!-- add customer form -->
    <div>
        <br>
        <form action="<?php echo URL; ?>users/add" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Login</label></td>
            <td><input class="form-control" type="text" name="login" value="" required /></td></tr>
            <td><label>Senha</label></td>
            <td><input class="form-control" type="password" name="senha" value="" required /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_add_user" value="Add User" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
