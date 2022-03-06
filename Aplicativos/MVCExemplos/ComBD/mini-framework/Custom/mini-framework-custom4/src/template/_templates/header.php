<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=APP_TITTLE?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <div align="center"><h1><?=APP_TITTLE?></h1>
	<a href="<?php echo URL; ?>/public/images/mvc.png"><img class="center-img" src="<?php echo URL; ?>/public/images/mvc.png"></a>
    </div>
	<div class="container">
		<!-- MENU -->
		<nav class="navbar-expand bg-dark navbar-dark">
			<ul class="navbar-nav justify-content-center">
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URL; ?>customers">Customers</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URL; ?>products">Products</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URL; ?>vendedores">Vendedores</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URL; ?>users">Users</a>
			  </li>
			</ul>
		</nav>
	</div>
