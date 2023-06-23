<?php defined('STAKANPAKET') or die('Access denied'); ?>
<div id="content"  role="main" class="content-register">
    <div class="banner_gif">
        <a href="?view=cat&category=25"><img src="<?=TEMPLATE?>/images/banner_stakan.jpg" alt=""></a>
    </div>
    <div id="favorites">
        <div class="favorite">
            <div class="favorite_header">
                <a href="?view=hits">Лидеры продаж</a>
            </div>
            <?php if($hits): ?>
                <?php foreach($hits as $product): ?>
                    <div class="product-index product-catalog">
                        <div class="product-table-img">
                            <a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" width="120" ></a>
                        </div> <!-- .product-table-img -->
                        <h6><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h6>
                        <p>Цена :  <span><?=$product['price']?></span> грн</p>
                        <a href="?view=addtocart&amp;goods_id=<?=$product['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Здесь товаров пока нет!</p>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
        <div class="favorite">
            <div class="favorite_header">
                <a href="?view=new">Рекомендуемые</a>
            </div>
            <?php if($new): ?>
                <?php foreach($new as $product): ?>
                    <div class="product-index product-catalog">
                        <div class="product-table-img">
                            <a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" width="120" ></a>
                        </div> <!-- .product-table-img -->
                        <h6><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h6>
                        <p>Цена :  <span><?=$product['price']?></span> грн</p>
                        <a href="?view=addtocart&amp;goods_id=<?=$product['goods_id']?>" class="add-in-basket">Добавить в корзину</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Здесь товаров пока нет!</p>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
    </div>
</div>