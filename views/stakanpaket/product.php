<?php defined('STAKANPAKET') or die('Access denied'); ?>
<div id="content"  role="main" class="content-register">
<?php if($goods): // если есть запрошенный товар ?>
    <div class="kroshka">
        <?php if(count($brand_name) > 1): // если подкатегория (слайдер, моноблок...) ?>
            <a href="<?=PATH?>">Главная</a> / <a href="?view=cat&amp;category=<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <a href="?view=cat&amp;category=<?=$brand_name[1]['brand_id']?>"><?=$brand_name[1]['brand_name']?></a> / <span><?=$goods['name']?></span>
        <?php elseif(count($brand_name) == 1): // если не дочерняя категория ?>
            <a href="<?=PATH?>">Главная</a> / <a href="?view=cat&amp;category=<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <span><?=$goods['name']?></span>
        <?php endif; ?>
    </div> <!-- .kroshka -->

    <h2 class="h2"><?=$goods['name']?></h2>
    <div id="content_cart_descr">
    <?php if($goods['img_slide']): // если есть картинки галереи ?>

<!--            <div class="item_img">-->
<!--                <img src="" />-->
<!--            </div> .item_img -->
            <div class="item_gallery">
               <div class="item_thumbs">
                   <?php foreach($goods['img_slide'] as $item): ?>
                       <a rel="gallery" title="<?=$goods['name']?>" href="<?=GALLERYIMG?>photos/<?=$item?>"><img src="<?=GALLERYIMG?>thumbs/<?=$item?>" /></a>
                   <?php endforeach; ?>
              </div> <!-- .item_thumbs -->
            </div>

    <?php endif; ?>
    </div>
    <img class="main_image" src="<?=PRODUCTIMG?><?=$goods['img']?>">

    <div class="short-opais">
        <?=$goods['anons']?>
    </div>

    <div id="price_cart">
        <p class="price-detail"><?=$goods['price']?> грн</p>
        <p class="available">Есть в наличии</p>
        <a href="?view=addtocart&amp;goods_id=<?=$goods['goods_id']?>" class="add-in-basket-cart">Добавить в корзину</a>
    </div>

    <div class="clear"></div>

    <div class="long-opais">
<!--        <h2 class="h2">Полное описание</h2>-->
        <?=$goods['content']?>
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
<?php else: ?>
    <div class="error">Такого товара нет</div>
<?php endif; ?>
</div>


