<?php
require_once __DIR__. '/vendor/autoload.php';

use App\ControllerProducts;

$form = new ControllerProducts();

$form-> ControllerIndexStart($_POST);

header('Location: /' );