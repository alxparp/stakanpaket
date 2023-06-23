<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">
    <div class="kroshka">
        <a href="<?=PATH?>">Главная</a> / <span><?=$get_page['title']?></span>
    </div>
            
    <div class="content-txt">
        <?php if($get_page): ?>
            <h2 class="h2"><?=$get_page['title']?></h2>
            <p><?=$get_page['text']?></p>
        <?php else: ?>
            <p>Такой страницы нет!</p>
        <?php endif; ?>
    </div>
</div>