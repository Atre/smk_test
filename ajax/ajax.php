<?php
require_once('../database.php');

/*
 * Form validation
 */
if(isset($_GET['json'])) {
    $get = $_GET['json'];
    $arr = json_decode($get);
    $error = '';

    if(strlen($arr->fname) == 0) {
        $error .= 'Введите имя<br />';
    }
    if(strlen($arr->sname) == 0) {
        $error .= 'Введите фамилию<br />';
    }
    if(strlen($arr->email) == 0) {
        $error .= 'Введите email<br />';
    }
    else if(preg_match('/\S+@\S+\.\S+/', $arr->email) == 0) {
        $error .= 'Введите корректный email<br />';
    }
    if(strlen($arr->login) == 0) {
        $error .= 'Введите логин<br />';
    }
    else if(!isset($arr->update) && Database::getInstance()->checkLogin($arr->login) == false) {
        $error .= 'Логин занят<br />';
    }
    if(strlen($arr->pwd) == 0) {
        $error .= 'Введите пароль<br />';
    }
    else if(strlen($arr->pwd) < 6 || strlen($arr->pwd) > 6) {
        $error .= 'Пароль не может быть меньше 6 и больше 16 символов<br />';
    }
    if($arr->pwd !== $arr->pwdre) {
        $error .= 'Пароли не совпадают<br />';
    }
    if(strlen($arr->bdate) == 0) {
        $error .= 'Введите дату рождения<br />';
    }
    if(strlen($arr->phone) == 0) {
        $error .= 'Введите номер телефона<br />';
    }
    else if(preg_match('/^\+?[0-9]{3}-?[0-9]{7}$/', $arr->phone) == 0) {
        $error .= 'Введите корректный номер телефона (***-*******)<br/>';
    }

    if(isset($arr->update)) {
        Database::getInstance()->updateProfile($arr->id, $arr);
        echo('Профиль обновлен');
    }
    else if(strlen($error) == 0) {
        Database::getInstance()->addToDb($arr);
        //mail($arr->email,'Registration','Well done!');
        echo('Вы успешно зарегистрировались!1');
    }
    else {
        echo($error);
    }

    return;
}