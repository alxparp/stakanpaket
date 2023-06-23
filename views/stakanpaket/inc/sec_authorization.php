<?php defined('STAKANPAKET') or die('Access denied'); ?>
<section id="sec_authorization">
    <div id="authorization">
        <h3>Авторизация</h3>
        <div class="authform">
            <?php if(!$_SESSION['auth']['user']): ?>
                <form method="post" action="#">
                    <label for="login">Логин: </label><br>
                    <input type="text" name="login" id="login"><br>
                    <label for="pass">Пароль: </label><br>
                    <input type="password" name="pass" id="pass"><br><br>
                    <input type="submit" name="auth" id="auth" value="Войти">
                    <p class="link"><a href="?view=reg">Регистрация</a></p>
                </form>
            <?php
                if(isset($_SESSION['auth']['error'])) {
                    echo $_SESSION['auth']['error'];
                    unset($_SESSION['auth']);
                }
            ?>
            <?php else: ?>
                <p class="welcome">Добро пожаловать, <?=htmlspecialchars($_SESSION['auth']['user'])?></p>
                <a class="logout" href="?do=logout">Выход</a>
            <?php endif; ?>
        </div> <!-- .authform -->
    </div>
</section>