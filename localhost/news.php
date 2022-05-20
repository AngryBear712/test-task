<?
require_once('.\app\DB_Connect.php');
$new_bd = new \app\DB_Connect();
$arResult = $new_bd -> DB_Connect();
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
    <title>Document</title>
</head>
<body>
<header>
    <div class="news">
        <div class="main_block">
            <h1 class="title">Новости</h1>
            <div class="news_list">
                <?foreach ($arResult as $item):?>
                    <div class="news_item">
                        <div class = 'data'><?=$item['idate']?></div>
                        <div class = 'item_title'><a href="view.php?id=<?=$item['id']?>"><?=$item['title']?></a></div>
                        <div class="item_anons"><?=$item['announce']?></div>
                    </div>
                <?endforeach;?>

                <div class="page">
                    <h3 class="title_page">Страницы:</h3>
                    <ul class="pagination">
                        <?for ($i = 1; $i < $arResult['NUM_PAGE']; $i++):?>
                            <li>
                                <? if (isset($_GET['page']) && $_GET['page'] == $i):?>
                                    <a href=news.php?page=<?=$i?> class="active"><span><?=$i?></span></a>
                                <?else:?>
                                    <a href=news.php?page=<?=$i?>><span><?=$i?></span></a>
                                <?endif;?>
                            </li>
                        <?endfor;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>