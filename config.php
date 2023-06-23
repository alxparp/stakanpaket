<?php

defined('STAKANPAKET') or die('Access denied');

// домен
define('PATH', 'http://stakanpaket.ua/');

// контроллер
define('CONTROLLER', 'controller/controller.php');

// модель
define('MODEL', 'model/model.php');

// вид
define('VIEW', 'views/');

// папка с активным шаблоном
define('TEMPLATE', VIEW.'lagarage/');

// папка с картинками контента
 define('PRODUCTIMG', PATH.'userfiles/product_img/baseimg/');

// папка с картинками галереи
 define('GALLERYIMG', PATH.'userfiles/product_img/');

// максимально допустимый вес загружаемых картинок - 1 Мб
 define('SIZE', 1048576);


// сервер БД
define('HOST', 'localhost');

// пользователь
define('USER', 'root');

// пароль
define('PASS', 'root');

// БД
define('DB', 'stakanpaket');

// название магазина - title
define('TITLE', 'Оптовый магазин одноразовых стаканов и пакетов');

// email администратора
 define('ADMIN_EMAIL', 'alex@gmail.com');

// количество товаров на страницу
 define('PERPAGE', 9);

// папка шаблонов административной части
 define('ADMIN_TEMPLATE', 'templates/');

mysql_connect(HOST, USER, PASS) or die('No connect to Server');
mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');
mysql_set_charset('utf8');
mb_internal_encoding("UTF-8");