<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';

use App\Admin\Database\ConnectDatabase;
use App\Admin\Database\ProductsTable;

if(isset($_POST['btnSubmit'])){

    $connectDb = new ConnectDatabase();
    $productTable = new ProductsTable($connectDb->getConnect());

    $title = $description = $price = null;
    extract($_POST);

    $image = $_FILES['image'];
    $imageUrl = "../public/images/{$image['name']}";

    move_uploaded_file($image['tmp_name'], $imageUrl);

    $res = $productTable->addProduct($title, $description, $price, $imageUrl);

    if($res){

        $html = '<h1>Товар успешно добавлен!</h1>';
        $html .= '<a href="showProducts.php">Вернутся к списку товаров</a>';

        echo $html;
    }
}
