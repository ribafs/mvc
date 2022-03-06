<div class="container">
    <h2 class="text-center">Users</h2>
    <!--<h5>You are in the View: src/tempalte/users/edit.php (everything in this box comes from that file)</h5>-->
    <!-- add countrie form -->
    <div>
		<br><br>

        <form action="<?php echo URL; ?>users/update" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Login</label></td>
            <td><input class="form-control" type="text" name="login" value="<?php echo $user->login; ?>" required autofocus/></td></tr>
            <td><label>Senha</label></td>
            <td><input class="form-control" type="password" name="senha" value="<?php echo htmlspecialchars($user->senha, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_user" value="Update User" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
<br><br><br>
