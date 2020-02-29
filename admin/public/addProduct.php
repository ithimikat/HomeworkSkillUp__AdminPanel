<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление товара</title>
    <link rel="stylesheet" href="css/addProduct.css">
</head>
<body>
<div class="container">
    <h1>Добавление нового товара</h1>
    <form action="../src/addProductToDatabase.php" method="post" enctype="multipart/form-data">
        <label>
            <span>Название товара</span>
            <input type="text" name="title" required>
        </label>
        <label>
            <span>Описание</span>
            <textarea name="description" cols="30" rows="10" required></textarea>
        </label>
        <label>
            <span>Цена</span>
            <input type="number" name="price" required>
        </label>
        <label>
            <span>Изображение товара</span>
            <input type="file" name="image" accept="image/*" required>
        </label>
        <button name="btnSubmit">Добавить</button>
    </form>
</div>
</body>
</html>