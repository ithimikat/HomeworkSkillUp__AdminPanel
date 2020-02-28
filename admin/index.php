<?php

session_start();

if(isset($_SESSION['login'])){
    header('Location: src/showProducts.php');
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель</title>
</head>
<body>
    <form action="src/showProducts.php" method="post">
        <label>
            <span>Логин</span>
            <input type="text" name="login" required>
        </label>
        <label>
            <span>Пароль</span>
            <input type="password" name="password" required>
        </label>
        <button name="btnSubmit">Войти</button>
    </form>
</body>
</html>
