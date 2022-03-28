<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
mb_internal_encoding("UTF-8");

require_once('core/db.php');

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="wrap">
        <div class="wrapper wrapper1">

            <div id="list">

            </div>
            <div id="form">
                <form id="main_form" method="POST">
                    <p><textarea class="form-control message" rows="1" name="message" placeholder="Ваш отзыв"></textarea></p>
                    <p class="nick">
                        <label for="name">НИК:</label>
                        <input class="form-control login" id="name" name="login" placeholder="Ваше имя">
                    </p>
                    <p><input type="submit" src="img/arrow-send.png" class="btn btn-info btn-block" value=" "></p>
                </form>
                <button class="send"></button>
            </div>
        </div>
    </div>

<!--    <script src="/js/jquery-3.5.1.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>

