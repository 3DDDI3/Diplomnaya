<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Игроки</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css">
    <link rel="stylesheet" href="fontawesome-free-5.8.1-web/css/all.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <script language="javascript" rel="javascript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script language="javascript" rel="javascript" type="text/javascript" src="jquery-cookie/jquery.cookie.js"></script>
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
        <div class="logo">
            <img src="./images/img/logo.png">
        </div>
        <div class="login-info">
            <a href="" class="registration"><i class="fas fa-edit"><span class="registration-text">Регистрация</span></i></a>
            <span class="or">или</span>
            <a href="" class="enter"><i class="fas fa-lock"><span class="enter-text">Вход</span></i></a>
        </div>
        <div class="enter-invisible">
            <div class="triangle-enter"></div>
            <h3 class="enter-header">Вход <i class="fas fa-times"></i></h3>
            <div class="enter-main">
                <form id="entrance-form">
                    <div class="login-password">
                        <input type="text" name="login" placeholder="Логин" required pattern="[a-zA-zа-яА-яёЁ0-9]+">
                        <input type="password" name="password" placeholder="Пароль" required pattern="[a-zA-zа-яА-яёЁ0-9]+">
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="remember"><span>Запомнить меня</span></label>
                        <a href="" class="forgot">Забыли пароль?</a>
                    </div>
                    <input type="submit" value="Войти">
                </form>
            </div>
        </div>
        <div class="registration-invisible">
            <div class="triangle-registration"></div>
            <h3 class="registration-header">Регистрация <i class="fas fa-times"></i></h3>
            <div class="registration-main">
                <form id="registration-form">
                    <div class="login-password">
                        <input type="text" name="login" placeholder="Логин" size="40" required> 
                        <input type="password" name="password" placeholder="Пароль" size="40" required>
                    </div>
                    <input type="submit" value="Зарегистрироваться">
                </form>
            </div>
        </div> 
        <div class="invisible-user">
            <i class="fas fa-user-circle"></i>
            <span class="user-login"></span>
            <i class="fas fa-sign-out-alt"></i>
        </div>
    </div>
    <div class="nav-wrapper">
        <nav class="menu">
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Главная</a></li>
                <li><a href="matches1.php"><i class="fas fa-gamepad"></i>Матчи</a></li>
                <li><a href="teams1.php"><i class="fas fa-users"></i>Команды</a></li>
                <li><a href="players1.php"><i class="fas fa-user"></i>Игроки</a></li>
                <li><a href="tournaments1.php"><i class="fas fa-trophy"></i></i>Турниры</a></li>
            </ul>
        </nav>
    </div>
    <div class="tournament-bg-wrapper">
        <?php
           $db->getPlayerName($_GET['idplayer']); 
        ?>
        <div class="tournament-bg"></div>
    </div>
    <div class="mini-admin-panel">
        <button id="add-record"><i class="fas fa-plus"></i>Создать турнир</button>
        <button id="delete-record"><i class="fas fa-minus"></i>Удалить турнир</button>
        <i class="fas fa-angle-double-left"></i>
    </div>
    <div class="arrow">
        <i class="fas fa-angle-double-right"></i>
    </div>
    <div class="administration-panel-block">
        <div class="administration-panel-wrapper">
            <form id="create-player-form" class="administration-panel" method="post">
                <h3 class="administration-panel-title">Создание игрока</h3>
                <ul class="admin-form">
                    <li>
                        <label for="player-name">Имя</label>
                        <input type="text" id="player-name" required>
                    </li>
                    <li>
                        <label for="player-nickname">Никнейм</label>
                        <input type="text" id="player-nickname" required>
                    </li>
                    <li>
                        <label for="player-birthday">Дата рождения</label>
                        <input type="date" id="player-birthday">
                    </li>
                    <li>
                        <label for="player-role">Роль</label>
                        <select id="player-role" required>
                            <?php
                                $query="SELECT idRole, role FROM roles ORDER BY role";
                                $db->getOptionsForSelect($query, "idRole", "role");
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="player-photo" class="logo-tournament">Фотография</label>
                        <label class="file-label" for="player-photo">
                            <i class="fas fa-file-upload"><span>Добавить изображение</span></i>
                        </label>
                        <input type="file" id="player-photo" accept="image/*">
                    </li>
                    <li>
                        <label for="player-team">Команда</label>
                        <select id="player-team" required>
                            <?php
                                $query="SELECT idTeam, name FROM teams ORDER BY name";
                                $db->getOptionsForSelect($query, "idTeam", "name");
                            ?>
                        </select>
                    </li>
                    <li>
                        <button type="reset">Очистить поля</button>
                        <button type="submit">Добавить игрока</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <div class="main-content">
            <?php
                $db->getPlayerPage($_GET['idplayer']);
            ?>
    </div>
    <div class="footer">
       &copy; 2019 ggInfo - все для любителей киберспорта.
   </div>
</body>
</html>