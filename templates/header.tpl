<html>
<head>
    <title> <?php echo $this->title?> </title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/form.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="?nav=contacts">Контакты</a></li>
                <?php if($this->isLoggedIn): ?>
                <li><a href="?nav=cabinet">Личный кабинет</a></li>
                <li><a href="?nav=logout">Выйти</a></li>
                <?php else: ?>
                <li><a href="?nav=enter">Войти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div id="content">

