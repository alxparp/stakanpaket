<?php
@ob_start();
session_start();
defined('STAKANPAKET') or die('Access denied');

// подключение модели
require_once MODEL;

// подключение библиотеки функций
require_once 'functions/functions.php';

$view = empty($_GET['view']) ? 'main' : $_GET['view'];
$leftbar = 'leftbar';

// получение массива каталога
$cat = catalog();

// получение массива информеров
$informers = informer();

// получени массива страниц
$pages = pages();

// получение названия новостей
$news = get_title_news();

// регистрация
if($_POST['reg']){
    registration();
    redirect();
}

// авторизация
if($_POST['auth']){
    authorization();
    if($_SESSION['auth']['user']){
        // если пользователь авторизовался
        echo "<p class='welcome'>Добро пожаловать, {$_SESSION['auth']['user']}</p>";
        exit;
    }else{
        // если авторизация неудачна
        echo $_SESSION['auth']['error'];
        unset($_SESSION['auth']);
        exit;
    }
}

if($_POST['view_filter']) {
    $curr_parameter = $_POST['view_filter'];


    if(!empty($curr_parameter)) {
        if(!$_SESSION[$curr_parameter])
            $_SESSION[$curr_parameter] = array();

        if (($key = array_search($_POST[$curr_parameter], $_SESSION[$curr_parameter])) !== false) {
            unset($_SESSION[$curr_parameter][$key]);
        } else {
            array_push($_SESSION[$curr_parameter],$_POST[$curr_parameter]);
        }
    }
}

// выход пользователя
if($_GET['do'] == 'logout'){
    logout();
    redirect();
}

if($_GET['do'] == 'discard') {
    unset($_SESSION['diameter']);
    unset($_SESSION['width']);
    unset($_SESSION['profile_auto']);
    unset($_SESSION['seasonality']);
    unset($_SESSION['manufacturer']);
    redirect();
}

$contacts = get_contact();
$diameters = get_spec('diameter');
$width_autos = get_spec('width');
$profile_autos = get_spec('profile_auto');
$seasons = get_spec('seasonality');
$manufacturers = get_spec('manufacturer');

switch($view) {
    case('main'):
        $current_order = product_sort();
        $hits = eyestopper('hits', $current_order['order_db'], 0, 4);
        $new = eyestopper('new', $current_order['order_db'], 0, 4);
        $sale = eyestopper('sale', $current_order['order_db'], 0, 4);
        break;
    case('hits'):
        // лидеры продаж
        $current_order = product_sort();

        // параметры для навигации
        $count_rows = count_eyestoppers('hits'); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        $eyestoppers = eyestopper('hits', $current_order['order_db'], $pagination['start_pos'], $pagination['perpage']);
        break;

    case('new'):
        // новинки
        $current_order = product_sort();

        // параметры для навигации
        $count_rows = count_eyestoppers('new'); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        $eyestoppers = eyestopper('new', $current_order['order_db'], $pagination['start_pos'], $pagination['perpage']);
        break;

    case('sale'):
        // распродажа
        $current_order = product_sort();

        // параметры для навигации
        $count_rows = count_eyestoppers('sale'); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        $eyestoppers = eyestopper('sale', $current_order['order_db'], $pagination['start_pos'], $pagination['perpage']);
        break;

    case('page'):
        // отдельная страница
        $page_id = abs((int)$_GET['page_id']);
        $get_page = get_page($page_id);
        break;

    case('news'):
        // отдельная новость
        $news_id = abs((int)$_GET['news_id']);
        $news_text = get_news_text($news_id);
        break;

    case('archive'):
        // все новости (архив новостей)
        // параметры для навигации
        $count_rows = count_news(); // общее кол-во новостей
        $pagination = pagination_parameters($count_rows);

        $all_news = get_all_news($pagination['start_pos'], $pagination['perpage']);
        break;

    case('informer'):
        // текст информера
        $informer_id = abs((int)$_GET['informer_id']);
        $text_informer = get_text_informer($informer_id);
        break;

    case('cat'):
        // товары категории
        $category = abs((int)$_GET['category']);

        $current_order = product_sort();

        $page = 1;

        // параметры для навигации
        $count_rows = count_rows($category); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        $brand_name = brand_name($category); // хлебные крохи
        $products = products($category, $current_order['order_db'], $pagination['start_pos'], $pagination['perpage']); // получаем массив из модели

        $leftbar = 'sec_parameters';
        break;

    case('addtocart'):
        // добавление в корзину
        $goods_id = abs((int)$_GET['goods_id']);
        addtocart($goods_id);

        $_SESSION['total_sum'] = total_sum($_SESSION['cart']);

        // кол-во товара в корзине + защита от ввода несуществующего ID товара
        total_quantity();
        redirect();
        break;

    case('cart'):
        /* корзина */
        // пересчет товаров в корзине
        $dostavka = get_dostavka();

        if(isset($_GET['id'], $_GET['qty'])){
            $goods_id = abs((int)$_GET['id']);
            $qty = abs((int)$_GET['qty']);

            $qty = $qty - $_SESSION['cart'][$goods_id]['qty'];
            addtocart($goods_id, $qty);

            $_SESSION['total_sum'] = total_sum($_SESSION['cart']); // сумма заказа

            total_quantity(); // кол-во товара в корзине + защита от ввода несуществующего ID товара
            redirect();
        }
        // удаление товара из корзины
        if(isset($_GET['delete'])){
            $id = abs((int)$_GET['delete']);
            if($id){
                delete_from_cart($id);
            }
            redirect();
        }

        if($_POST['order']){
            add_order();
            //redirect();
        }
        break;

    case('reg'):
        // регистрация
        break;

    case('auth'):
        // регистрация
        break;

    case('search'):
        // поиск

        $current_order = product_sort();

        $result_search = search($current_order['order_db']);

        $search = clear($_GET['search']);

        // параметры для навигации
        $count_rows = count($result_search); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        $leftbar = 'sec_parameters';
        break;

    case('filter'):

        $filter_param = array();


        $all_parameters = array('diameter', 'width', 'profile_auto', 'seasonality', 'manufacturer');
        $all_data = array();

        foreach($all_parameters as $parameter) {
            if($_SESSION[$parameter]) {
                $all_data[$parameter] = array();
                foreach($_SESSION[$parameter] as $value) {
                    array_push($all_data[$parameter], "'".$value."'");
                }
            }
        }


        $current_order = product_sort();

        // выбор по параметрам
        $startprice = (int)$_GET['startprice'];
        $endprice = (int)$_GET['endprice'];
        $brand = array();

        $count_rows = count_rows($all_data, $startprice, $endprice, $all_parameters); // общее кол-во товаров
        $pagination = pagination_parameters($count_rows);

        // параметры для навигации


        $products = filter($current_order['order_db'], $startprice, $endprice, $pagination['start_pos'], $pagination['perpage'], $all_data, $all_parameters);

        $leftbar = 'sec_parameters';
        break;

    case('product'):
        // отдельный товар
        $goods_id = abs( (int)$_GET['goods_id'] );
        $goods = 0;
        if($goods_id){
            $goods = get_goods($goods_id);
            $brand_name = brand_name($goods['goods_brandid']); // хлебные крошки
        }
        $current_order = product_sort();
        $new = eyestopper('new', $current_order['order_db'], 0, 4);

        $get_specifications = get_specifications($goods_id);
        break;

    default:
        // если из адресной строки получено имя несуществующего вида
        $view = 'main';
//        $eyestoppers = eyestopper('sale');
        break;
}

// подключение вида
require_once  TEMPLATE.'index.php';