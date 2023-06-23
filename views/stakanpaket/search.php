<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">
    <h2 class="h2">Результаты поиска</h2>

    <?php if($result_search['notfound']): // если ничего не найдено ?>
        <?php
            $var1 = $result_search['notfound'];
            mb_convert_variables('UTF-8', "cp1251,UTF-8,windows-1251", $var1);
            echo $var1;
        ?>
    <?php else: // если есть результаты поиска ?>

        <div class="vid-sort">
            Вид:
            <a href="#" id="grid" class="grid_list"><img src="<?=TEMPLATE?>/images/vid-tabl.gif" alt="табличный вид"></a>
            <a href="#" id="list" class="grid_list"><img src="<?=TEMPLATE?>/images/vid-line.gif" alt="линейный вид"></a>
            &nbsp;&nbsp;
            Сортировать по:&nbsp;
            <a id="param_order" class="sort-top">от А до Я</a>
            <div class="sort-wrap">
                <?php foreach($current_order['order_p'] as $key => $value): ?>
                    <?php if($value[0] == $current_order['order_p']) continue; ?>
                    <a href="?view=search&amp;search=<?=$search?>&amp;order=<?=$key?>" class="sort-bot"><?=$value[0]?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php for($i = $pagination['start_pos']; $i < $pagination[endpos]; $i++): ?>
            <?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'): // если вид - сетка ?>
                <div class="product-index product-catalog">
                    <div class="product-table-img">
                        <a href="?view=product&amp;goods_id=<?=$result_search[$i]['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$result_search[$i]['img']?>" alt="" width="120" ></a>
                    </div> <!-- .product-table-img -->
                    <h6><a href="?view=product&amp;goods_id=<?=$result_search[$i]['goods_id']?>"><?=$result_search[$i]['name']?></a></h6>
                    <p>Цена :  <span><?=$result_search[$i]['price']?></span> грн</p>
                    <a href="?view=addtocart&amp;goods_id=<?=$result_search[$i]['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                </div>
            <?php else: ?>
                <div class="product-line">
                    <div class="product-line-img">
                        <a href="?view=product&amp;goods_id=<?=$result_search[$i]['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$result_search[$i]['img']?>" width="48" alt=""></a>
                    </div>
                    <div class="product-line-price">
                        <p>Цена :  <span><?=$result_search[$i]['price']?></span> грн</p>
                        <a href="?view=addtocart&amp;goods_id=<?=$result_search[$i]['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                    </div>
                    <div class="product-line-opis">
                        <h2><a href="?view=product&amp;goods_id=<?=$result_search[$i]['goods_id']?>"><?=$result_search[$i]['name']?></a></h2>
                        <p><?=$result_search[$i]['anons']?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
        <div class="clear"></div>
        <?php if($pagination['pages_count'] > 1) pagination($pagination['page'], $pagination['pages_count']); ?>
    <?php endif; ?>
</div>
