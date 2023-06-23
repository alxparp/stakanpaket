<?php defined('STAKANPAKET') or die('Access denied'); ?>
<div id="content"  role="main" class="content-register">
    <div class="kroshka">
        <a href="<?=PATH?>">Главная</a> / <span>Архив новостей</span>
    </div>

    <div class="content-txt">
        <?php if($all_news): ?>
            <?php foreach($all_news as $item): ?>
                <h2 class="h2"><a href="?view=news&amp;news_id=<?=$item['news_id']?>"><?=$item['title']?></a></h2>
                <span class="news_date"><?=$item['date']?></span>
                <p><?=$item['anons']?></p>
                <p><a href="?view=news&amp;news_id=<?=$item['news_id']?>">Подробнее...</a></p>
                <br>
                <hr>
            <?php endforeach; ?>
            <?php if($pagination['pages_count'] > 1) pagination($pagination['page'], $pagination['pages_count']); ?>
        <?php else: ?>
            <p>Новостей пока нет!</p>
        <?php endif; ?>
    </div> <!-- .content-txt -->
</div>