<?php defined('STAKANPAKET') or die('Access denied'); ?>
<div class="content">
    <h2>Добавление контактов</h2>
    <?php
    if(isset($_SESSION['edit_contacts']['res'])){
        echo $_SESSION['edit_contacts']['res'];
//        unset($_SESSION['edit_contacts']['res']);
    }
    ?>

    <form action="" method="post">
        <label for="contact1">Контакт 1</label><br>
        <input type="text" name="contact1" value="<?=htmlspecialchars($get_contact['first_contact'])?>"><br><br>

        <label for="contact1">Контакт 2</label><br>
        <input type="text" name="contact2" value="<?=htmlspecialchars($get_contact['second_contact'])?>"><br><br>

        <label for="contact1">Контакт 3</label><br>
        <input type="text" name="contact3" value="<?=htmlspecialchars($get_contact['third_contact'])?>"><br><br>

        <label for="contact1">Емаил</label><br>
        <input type="text" name="email" value="<?=htmlspecialchars($get_contact['email'])?>"><br><br>

        <input type="submit" value="Сохранить">
    </form>
</div>