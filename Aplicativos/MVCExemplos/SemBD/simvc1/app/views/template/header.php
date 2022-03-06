<html>
	<head>
		<title><?php echo $this->title ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL . 'asset/css/bootstrap.min.css' ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo URL . 'asset/css/font-awesome.min.css' ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo URL . 'asset/css/main.css' ?>">
	</head>
	<body>
	<div class="jumbotron">
		<div class="container text-center">
		<h1>SIMVC</h1>
		<h3>Minimal PHP MVC Framework</h3>
		</div>
	</div>
	<div class="container">
		<h1 class="text-center">This is <?php echo $this->pageTitle ?></h1><br />
		<div class="btn-group center-block">
			<a href="<?php echo URL ?>" class="btn btn-info">
				Main Page
			</a>
			<a href="<?php echo URL . 'home/page1' ?>" class="btn btn-success">
				Page 1
			</a>
			<a href="<?php echo URL . 'home/page2' ?>" class="btn btn-warning">
				Page 2
			</a>
			<a href="<?php echo URL . 'movies' ?>" class="btn btn-danger">
				Movies
			</a>
		</div>
	</div>
	<br>
