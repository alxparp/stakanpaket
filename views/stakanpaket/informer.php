<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">
    <div class="kroshka">
        <a href="<?=PATH?>">Главная</a> / <span><?=$text_informer['informer_name']?></span> / <span><?=$text_informer['link_name']?></span>
    </div>

    <div class="content-txt">
        <?php if($text_informer): ?>
            <h2 class="h2"><?=$text_informer['link_name']?></h2>
            <p><?=$text_informer['text']?></p>
        <?php else: ?>
            <p>Такой страницы нет!</p>
        <?php endif; ?>
    </div>
</div>