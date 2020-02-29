<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';
require_once 'authorizationCheck.php';

use App\Admin\Database\ConnectDatabase;
use App\Admin\Database\ProductsTable;

$connectDb = new ConnectDatabase();

$productsTable = new ProductsTable($connectDb->getConnect());
$products = $productsTable->getAllProducts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/products.css">
    <script src="../public/js/removeProductViaAjax.js"></script>
</head>
<body>
<div class="container">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <h3><?= $product['title'] ?></h3>
            <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
            <p><?= $product['description'] ?></p>
            <span><?= $product['price'] ?></span>
            <button type="button" class="btnDeleteProduct" value="<?= $product['id'] ?>">Удалить</button>
        </div>
    <?php endforeach; ?>
    <form action="../public/addProduct.php">
        <button>Добавить новый товар</button>
    </form>
</div>
</body>
</html>
