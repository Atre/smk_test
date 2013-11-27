<?php
session_start();

include('templategenerator.php');
include('database.php');

class IndexController {

    private $templateGenerator;

    public function __construct() {
        $this->templateGenerator = new TemplateGenerator();
    }

    public function loadView($view, $data) {
        $this->templateGenerator->loadTemplate('header', $data);
        $this->templateGenerator->loadTemplate($view, $data);
        $this->templateGenerator->loadTemplate('footer', $data);
    }
}

$index = new IndexController();
$data['title'] = 'Hello';
$data['isLoggedIn'] = 0;
if(isset($_SESSION['id'])) {

    $data['isLoggedIn'] = 1;

}
/**
 * Router
 */
if(isset($_GET['nav'])) {
    $nav = htmlspecialchars($_GET['nav']);
    switch($nav) {
        case 'contacts':
            $index->loadView('contacts', $data);
            break;
        case 'cabinet':
            $data = array_merge($data, Database::getInstance()->getUserById($_SESSION['id'])[0]);
            $data['id'] = $_SESSION['id'];
            $index->loadView('cabinet', $data);
            break;
        case 'registration':
            $index->loadView('registration', $data);
            break;
        case 'login':
            if($data['isLoggedIn']) {
                $index->loadView('main', $data);
            }
            else {
                $index->loadView('login', $data);
            }
            break;
        case 'enter':
                $index->loadView('login', $data);
            break;
        case 'logout':
            unset($_SESSION['id']);
            $data['isLoggedIn'] = 0;
            $index->loadView('main', $data);
            break;
        default:
            $index->loadView('404', $data);
            break;
    }
}
else {
    $index->loadView('main', $data);
}

/*
 * Form process
 */
if(isset($_POST['submit'])) {
    header("Location: index.php");
}

if(isset($_POST['submitlogin'])) {
    $login = htmlspecialchars($_POST['login']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $id = Database::getInstance()->loginUser($login, $pwd);
    if($id > 0) {
        $_SESSION['id'] = $id;
        $data['id'] = $id;
        header("Location: index.php");
    }
}