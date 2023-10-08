<?php
require_once __DIR__. '/vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\ModuleProducts;

$dbArr = json_decode(ModuleProducts::getInst()->baseСonnection(), true);


$loader = new FilesystemLoader('templates');
$view = new Environment($loader);





?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/css/style.css">
    <title>Products</title>
</head>

<body>
<main class="main product">
    <br><br><br>
    <div class="product__container">
        <div class="product__items">
            <?php foreach ($dbArr as $key => $val): ?>
                <?=$products = $view->render('product.html', $val);?>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($dbArr as $key => $val): ?>
                    <?=$slider = $view->render('slider.html', $val);?>
            <?php endforeach; ?>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>

    <br><br><br><br><br><br><br>

    <div class="product__container">
        <form action="form.php" method="post">
            <div><input type="text" name="title_top" placeholder="Top заголовок"></div>
            <div><input type="text" name="product_name" placeholder="Названия товара"></div>
            <div><input type="text" name="text" placeholder="Описания товара"></div>
            <div><input type="text" name="price" placeholder="Цена"></div>
            <div><input type="text" name="discount" placeholder="Скидка"></div>
            <div><input type="text" name="id" placeholder="Ид товара"></div>
            <div><select name="images">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </div>
            <div>
                <input type="radio" name="key_mod" value="add">Добавить товар<Br>
                <input type="radio" name="key_mod" value="update">Обновить товар<Br>
                <input type="radio" name="key_mod" value="del">Удалить товар</p>
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>


    <br><br><br><br>

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>
