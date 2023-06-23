<?php defined('STAKANPAKET') or die('Access denied') ?>
<section id="sec_parameters">
    <div id="parameters">
        <div id="parameter_header">
            Параметры
        </div>
        <div id="parameter_description">
            <div class="share-search">
                <div>
                    <form method="get" action="">
                        <input type="hidden" name="view" value="filter">
                        <p>Стоимость:</p>
                        <label for="startprice">От</label>
                        <input class="podbor-price" type="text" name="startprice" value="<?=$startprice?>">
                        <label for="endprice">До</label>
                        <input class="podbor-price" type="text" name="endprice" value="<?=$endprice?>">
                        <br><br>
                        <p>Производители:</p>

                        <?php foreach($cat as $key => $item): ?>
                            <?php if($item[0]): ?>
                                <input type="checkbox" name="brand[]" value="<?=$key?>" id="<?=$key?>" <?php if($key == $brand[$key]) echo "checked"?> />
                                <label for="<?=$key?>"><?=$item[0]?></label> <br />
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <input class="podbor" type="submit" name="param_search" value="Найти">
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>