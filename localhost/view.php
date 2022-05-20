<?
require_once('.\app\DB_Connect.php');
$new_bd = new \app\DB_Connect();
$arResult = $new_bd -> DB_Connect();
$arResult = reset($arResult)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=".\main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Новости</title>
</head>
<body>
<header>
    <div class="news">
        <div class="main_block">
            <h1 class="title"><?=$arResult['title']?></h1>
            <div class="news_list">
                    <div class="news_item">
                        <span class="item_anons"><?=$arResult['content']?></span>
                    </div>
            </div>
            <ul class="test">
            <a href="\">Все новости >> </a>
            </ul>
        </div>
    </div>
</header>
</body>
</html>
