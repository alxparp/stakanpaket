<?php defined('STAKANPAKET') or die('Access denied'); ?>
    <section id="sec_news" role="complementary">
        <div id="news">
            <div id="news_header">
                Новости
            </div>
            <div id="news_description">
                <?php if($news): ?>
                    <?php foreach ($news as $item): ?>
                    <p>
                        <span><?=$item['date']?></span>
                        <a href="?view=news&amp;news_id=<?=$item['news_id']?>"><?=$item['title']?></a>
                    </p>
                    <?php endforeach; ?>
                    <a href="?view=archive" class="news-arh">Все новости</a>
                <?php else: ?>
                    <p>Новостей пока нет.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="sec_informer" role="complementary">
        <!-- Информеры -->
        <?php foreach($informers as $informer): ?>
            <div class="informers">
                <div class="informer_header">
                    <?=$informer[0]?>
                </div>
                <div class="informer_description">
                <?php foreach($informer['sub'] as $key => $sub): ?>
                    <p>- <a href="?view=informer&amp;informer_id=<?=$key?>"><?=$sub?></a></p>
                <?php endforeach; ?>
                </div>
            </div> <!-- .info -->
        <?php endforeach; ?>
        <!-- Информеры -->
    </section>