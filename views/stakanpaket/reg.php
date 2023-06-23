<?php defined('STAKANPAKET') or die('Access denied');?>
<div id="content"  role="main" class="content-register">
    <div class="content-txt">
        <h2 class="h2">Регистрация</h2>

        <form method="post" action="#">
            <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td class="zakaz-txt">*Логин</td>
                    <td class="zakaz-inpt"><input type="text" name="login" value="<?=htmlspecialchars($_SESSION['reg']['login'])?>"></td>
                    <td class="zakaz-prim"></td>
                </tr>
                <tr>
                    <td class="zakaz-txt">*Пароль</td>
                    <td class="zakaz-inpt"><input type="password" name="pass"></td>
                    <td class="zakaz-prim"></td>
                </tr>
                <tr>
                    <td class="zakaz-txt">*ФИО</td>
                    <td class="zakaz-inpt"><input type="text" name="name" value="<?=htmlspecialchars($_SESSION['reg']['name'])?>"></td>
                    <td class="zakaz-prim">Пример: Иванов Иван Иванович</td>
                </tr>
                <tr>
                    <td class="zakaz-txt">*Е-маил</td>
                    <td class="zakaz-inpt"><input type="text" name="email" value="<?=htmlspecialchars($_SESSION['reg']['email'])?>"></td>
                    <td class="zakaz-prim">Пример: test@mail.ru</td>
                </tr>
                <tr>
                    <td class="zakaz-txt">*Телефон</td>
                    <td class="zakaz-inpt"><input type="text" name="phone" value="<?=htmlspecialchars($_SESSION['reg']['phone'])?>"></td>
                    <td class="zakaz-prim">Пример: 38 096 987 99 99</td>
                </tr>
                <tr>
                    <td class="zakaz-txt">*Адрес доставки</td>
                    <td class="zakaz-inpt"><input type="text" name="address" value="<?=htmlspecialchars($_SESSION['reg']['addres'])?>"></td>
                    <td class="zakaz-prim">Пример: г. Киев, пр. Шевченко, ул. Г.Сковороды д.19, кв 51.</td>
                </tr>
            </tbody></table>
            <input type="submit" name="reg" value="Зарегистрироваться">
        </form>

        <?php

        if(isset($_SESSION['reg']['res'])){

            $var1 = $_SESSION['reg']['res'];
            mb_convert_variables('UTF-8', "cp1251,UTF-8,windows-1251", $var1);
            echo '<div class="error">' .$var1. '</div>';
            unset($_SESSION['reg']);
        }

        ?>

    </div>
</div>