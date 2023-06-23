<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">
    <div class="kroshka">
        <a href="<?=PATH?>">Главная</a> / <span><?=$news_text['title']?></span>
    </div>

    <div class="content-txt">
        <?php if($news_text): ?>
            <h2 class="h2"><?=$news_text['title']?></h2>
            <br />
            <span class="news_date"><?=$news_text['date']?></span>
            <p><?=$news_text['text']?></p>
        <?php else: ?>
            <p>Такой страницы нет!</p>
        <?php endif; ?>
    </div>
</div>