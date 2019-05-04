<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tournament page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css">
    <link rel="stylesheet" href="fontawesome-free-5.8.1-web/css/all.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <script language="javascript" rel="javascript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        require_once('classes.php');
        $db=new Database;
        $db->setDbSettings("localhost", "root", "", "course_database");
        $db->open_connection();
    ?>
    <div class="header">
        <div class="logo"></div>
        <div class="login-info">
            <a href="" class="registration"><i class="fas fa-edit"><span class="registration-text">Регистрация</span></i></a>
            <a href="" class="enter"><i class="fas fa-lock"><span class="enter-text">Вход</span></i></a>
        </div>
        <div class="enter-invisible">
            <div class="triangle-enter"></div>
            <h3 class="enter-header">Вход <i class="fas fa-times"></i></h3>
            <div class="enter-main">
                <div class="login-password">
                    <input type="text" name="login" placeholder="Логин" size="40">
                    <input type="password" name="password" placeholder="Пароль" size="40">
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"><span>Запомнить меня</span></label>
                    <a href="" class="forgot">Забыли пароль?</a>
                </div>
                <input type="button" value="Войти">
            </div>
        </div>
        <div class="registration-invisible">
            <div class="triangle-registration"></div>
            <h3 class="registration-header">Регистрация <i class="fas fa-times"></i></h3>
            <div class="registration-main">
                <div class="login-password">
                    <input type="text" name="login" placeholder="Логин" size="40">
                    <input type="password" name="password" placeholder="Пароль" size="40">
                </div>
                <input type="button" value="Зарегистрироваться">
            </div>
        </div>  
    </div>
    <div class="nav-wrapper">
        <nav class="menu">
            <ul>
                <li><a href="index1.php"><i class="fas fa-home"></i>Главная</a></li>
                <li><a href=""><i class="fas fa-gamepad"></i>Матчи</a></li>
                <li><a href=""><i class="fas fa-users"></i>Команды</a></li>
                <li><a href="#"><i class="fas fa-trophy"></i>Турниры</a></li>
                <li><a href=""><i class="fas fa-film"></i>Видео</a></li>
            </ul>
        </nav>
    </div>
    <div class="tournament-bg-wrapper">
        <span class="tournament-title">Турниры</span>
        <div class="tournament-bg"></div>
    </div>
    <div class="main-content">
        <ul class="tabs">
            <li class="tab-link current" data-tab="tab-1"><a href="">Прошедшие</a></li>
            <li class="tab-link" data-tab="tab-2"><a href="">Текущие</a></li>
            <li class="tab-link" data-tab="tab-3"><a href="">Будущие</a></li>
        </ul>
        <div id="tab-1" class="tab-content current">
            <div class="tournament-indexx-wrapper">
                <h3 class="tournament-header"><i class="fas fa-trophy"></i>Турниры</h3>
                <?php
                    $db->getTournamentPage($_GET['idtour'], -1);
                ?>
            </div>
        </div>
        <div id="tab-2" class="tab-content">
            <div class="tournament-indexx-wrapper">
                <h3 class="tournament-header"><i class="fas fa-trophy"></i>Турниры</h3>
                <?php
                    $db->getTournamentPage($_GET['idtour'], 0);
                ?>
            </div>
        </div>
        <div id="tab-3" class="tab-content">
            <div class="tournament-indexx-wrapper">
                <h3 class="tournament-header"><i class="fas fa-trophy"></i>Турниры</h3>
                <?php
                    $db->getTournamentPage($_GET['idtour'], 1);
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
       &copy; 2019 gginfo - все для любителей киберспорта.
    </div>
</body>
</html>