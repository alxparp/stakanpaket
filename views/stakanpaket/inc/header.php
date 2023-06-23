<?php
    defined('STAKANPAKET') or die('Access denied');
    header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WBSWTMZ');</script>
    <!-- End Google Tag Manager -->
    <meta name="viewport" content="width=device-width,initial-scale=0.85,maximum-scale=0.85" />
    <link rel="shortcut icon" href="<?=TEMPLATE?>images/stakanpaket_favicon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Оптовый интернет магазин</title>
    <link rel="stylesheet" href="<?=TEMPLATE?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>css/style.css">
    <script src="<?=TEMPLATE?>js/functions.js"></script>
    <script src="<?=TEMPLATE?>js/jquery-1.7.2.min.js"></script>
    <script src="<?=TEMPLATE?>js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="<?=TEMPLATE?>js/jquery.cookie.js"></script>
    <script src="<?=TEMPLATE?>js/workscripts.js"></script>
    <script type="text/javascript"> var query = '<?=$_SERVER['QUERY_STRING']?>';</script>
    <!-- Fancybox -->
    <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <!-- Fancybox -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBSWTMZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
    <header role="banner" id="header">
        <div id="logo_header_first">
            <a class="header_element" id="logo" href="/"><img src="<?=TEMPLATE?>images/stakanpaket_logo.png" alt=""></a>
            <div class="header_element" id="numbers">
                <h5>+3 (068) 193-29-03</h5>
                <p>По будням с 8:00 до 20:00</p>
            </div>
            <nav role="navigation">
                <ul class="header_element" id="mainNav">
                    <?php if($pages): ?>
                        <?php foreach($pages as $item): ?>
                            <li><a href="?view=page&amp;page_id=<?=$item['page_id']?>"><?=$item['title']?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
        <div id="cat_search">

            <form method="get" id="search" class="column" action="">
                <input type="hidden" name="view" value="search" />
                <input type="text" name="search" id="quickquery" placeholder="Что вы хотите купить?" />
                <script type="text/javascript">
                    //<![CDATA[
                    placeholderSetup('quickquery');
                    //]]>
                </script>
                <input type="submit" value="Найти">
            </form>

            <ul id="category" class="accordion">
                <ol class="category_header">Категории</ol>
                <?php foreach($cat as $key => $item): ?>
                    <?php if(count($item) > 1): // если это родительская категория ?>
                        <h3><li><a href="#" style="font-weight:bold;">+ <?=$item[0]?></a></li></h3>
                        <ul>
                            <li><a href="?view=cat&category=<?=$key?>">&nbsp;&nbsp;&nbsp;&nbsp;- Все модели</a></li>
                            <?php foreach($item['sub'] as $key => $sub): ?>
                                <li><a href="?view=cat&category=<?=$key?>">&nbsp;&nbsp;&nbsp;&nbsp;- <?=$sub?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif($item[0]): // если самостоятельная категория ?>
                        <li><a href="?view=cat&category=<?=$key?>" style="font-weight:bold;">&nbsp;&nbsp; <?=$item[0]?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <div id="basket" class="column">
                <p><a href="?view=cart">
                    <?php if($_SESSION['total_quantity']): ?>
                        <span><?=$_SESSION['total_quantity']?></span> на сумму <span><?=$_SESSION['total_sum']?></span> грн.
                    <?php else: ?>
                        Корзина пуста
                    <?php endif; ?>
                    </a></p>
            </div>
            <div class="clear"></div>

        </div>
        <div class="clear"></div>
    </header>