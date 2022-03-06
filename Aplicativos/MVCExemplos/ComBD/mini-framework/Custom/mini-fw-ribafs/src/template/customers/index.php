<div class="container">
    <h2 class="text-center">Customers</h2>
	<a class="btn btn-primary btn-sm" href="<?=URL . 'customers/add'; ?>">Add Customer</a>

    <div>
        <br>        
        <b>Lista de customers (dados do model)</b><div class="text-right"><b>Soma de customers: <?php echo $total_customers; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Name</b></td>
                <td><b>E-mail</b></td>
                <td><b>Birthday</b></td>
                <td colspan="2" align="center">AÇÕES</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td><?php if (isset($customer->id)) echo htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->name)) echo htmlspecialchars($customer->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->birthday)) echo htmlspecialchars($customer->birthday, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'customers/delete/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'customers/edit/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
