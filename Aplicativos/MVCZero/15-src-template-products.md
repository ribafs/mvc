## Estrutura do diretório products

/src/template/products

add.php
edit.php
index.php

- add.php

```html
<div class="container">
    <h2 class="text-center">Products</h2>
    <!--<b>You are in the View: src/template/products/add.php (everything in this box comes from that file)</b><br>-->
    <!-- add customer form -->
    <div>
        <br>
        <form action="<?php echo URL; ?>products/add" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Description</label></td>
            <td><input class="form-control" type="text" name="description" value="" required /></td></tr>
            <td><label>Unity</label></td>
            <td><input class="form-control" type="text" name="unity" value="" required /></td></tr>
            <td><label>Date</label></td>
            <td><input class="form-control" type="date" name="date" value="" /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_add_product" value="Add Product" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
```

- edit.php

```html
<div class="container">
    <h2 class="text-center">Product</h2>
    <!--<h5>You are in the View: src/template/products/edit.php (everything in this box comes from that file)</h5>-->
    <!-- add customer form -->
    <div>
		<br><br>

        <form action="<?php echo URL; ?>products/update" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Description</label></td>
            <td><input class="form-control" type="text" name="description" value="<?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>" required autofocus/></td></tr>
            <td><label>Unity</label></td>
            <td><input class="form-control" type="text" name="unity" value="<?php echo htmlspecialchars($product->unity, ENT_QUOTES, 'UTF-8'); ?>" required /></td></tr>
            <td><label>Date</label></td>
            <td><input class="form-control" type="date" name="date" value="<?php echo htmlspecialchars($product->date, ENT_QUOTES, 'UTF-8'); ?>" /></td></tr>
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <tr><td></td><td><input type="submit" name="submit_update_product" value="Update Product" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
<br><br><br>
```

- index.php

```php
<div class="container">
    <h2 class="text-center">Products</h2>
    <!--<b>You are in the View: src/template/products/index.php (everything in this box comes from that file)</b><br>-->
    <!-- main content output -->

	<a class="btn btn-primary btn-sm" href="<?=URL . 'products/add'; ?>">Add Customer</a>

    <div>
        <br>        
        <b>List of products (data from model)</b><div class="text-right"><b>Amount of products: <?php echo $amount_of_products; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Description</b></td>
                <td><b>Unity</b></td>
                <td><b>Date</b></td>
                <td colspan="2" align="center">ACTIONS</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php if (isset($product->id)) echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->unity)) echo htmlspecialchars($product->unity, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->date)) echo htmlspecialchars($product->date, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'products/delete/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
                    <td><a href="<?php echo URL . 'products/edit/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
```

