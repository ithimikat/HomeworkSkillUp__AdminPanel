<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';

use App\Admin\Database\ConnectDatabase;
use App\Admin\Database\ProductsTable;

if(isset($_GET['id'])){

    $idProduct = $_GET['id'];

    $connectDb = new ConnectDatabase();
    $productsTable = new ProductsTable($connectDb->getConnect());

    $res = $productsTable->deleteProduct($idProduct);

    echo $res;
}
