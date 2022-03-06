<div class="container">
    <h2 class="text-center">Users</h2>
    <!--<b>You are in the View: src/template/users/index.php (everything in this box comes from that file)</b><br>-->
    <!-- main content output -->

	<a class="btn btn-primary btn-sm" href="<?=URL . 'users/add'; ?>">Add User</a>

    <div>
        <br>        
        <b>List of Users (data from model)</b><div class="text-right"><b>Amount of Users: <?php echo $amount_of_users; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Login</b></td>
                <td><b>Senha</b></td>
                <td colspan="2" align="center">ACTIONS</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->id)) echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->login)) echo $user->login; ?></td>
                    <td><?php if (isset($user->senha)) echo htmlspecialchars($user->senha, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'users/delete/' . htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'users/edit/' . htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
