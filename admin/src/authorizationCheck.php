<?php

session_start();

if(!isset($_SESSION['login'])){
    if(isset($_POST['btnSubmit'])){

        $conf = require_once(__DIR__ . DIRECTORY_SEPARATOR . '../config/configLogin.php');

        $login = $_POST['login'];
        $password = $_POST['password'];

        //если логин и пароль неверны показываю ошибку и ссылку на возврат к форме входа
        if(!($login === $conf['login'] && $password === $conf['password'])){

            $html = '<div>';
            $html .= '<h1>Неверный логин или пароль</h1>';
            $html .= "<a href='{$_SERVER['HTTP_REFERER']}'>Попробовать еще раз</a>";
            $html .= '</div>';

            echo $html;
            exit;
        }

        $_SESSION['login'] = true;

    } else{
        header('Location: /admin/');
    }
}