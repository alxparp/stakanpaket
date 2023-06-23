<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">

    <div class="kroshka">
        <?php if(count($brand_name) > 1): // если подкатегория (слайдер, моноблок...) ?>
            <a href="<?=PATH?>">Главная</a> / <a href="?view=cat&amp;category=<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <span><?=$brand_name[1]['brand_name']?></span>
        <?php elseif(count($brand_name) == 1): // если не дочерняя категория ?>
            <a href="<?=PATH?>">Главная</a> / <span><?=$brand_name[0]['brand_name']?></span>
        <?php endif; ?>
    </div> <!-- .kroshka -->

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
                <a href="?view=cat&amp;category=<?=$category?>&amp;order=<?=$key?>&amp;page=<?=$page?>" class="sort-bot"><?=$value[0]?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if($products): // если получены товары категории ?>
        <?php foreach($products as $product): ?>
            <?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'): // если вид - сетка ?>
                <div class="product-index product-catalog">
                    <div class="product-table-img">
                        <a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" width="120" ></a>
                    </div> <!-- .product-table-img -->
                    <h6><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h6>
                    <p>Цена :  <span><?=$product['price']?></span> грн</p>
                    <a href="?view=addtocart&amp;goods_id=<?=$product['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                </div>
            <?php else: ?>
                <div class="product-line">
                    <div class="product-line-img">
                        <a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" width="48" alt=""></a>
                    </div>
                    <div class="product-line-price">
                        <p>Цена :  <span><?=$product['price']?></span> грн</p>
                        <a href="?view=addtocart&amp;goods_id=<?=$product['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                    </div>
                    <div class="product-line-opis">
                        <h2><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
                        <p><?=$product['anons']?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="clear"></div>
        <?php if($pagination['pages_count'] > 1) pagination($pagination['page'], $pagination['pages_count']); ?>
    <?php else: ?>
        <p>Здесь товаров пока нет!</p>
    <?php endif; ?>
</div>
