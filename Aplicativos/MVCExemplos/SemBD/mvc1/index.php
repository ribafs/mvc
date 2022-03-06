<?php

require_once 'Controller/index.php';

$controller = new Index();

$controller->index();

$controller->edit();

$controller->update();

$controller->error();
