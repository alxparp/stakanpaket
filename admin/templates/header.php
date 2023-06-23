<?php
defined('STAKANPAKET') or die('Access denied');
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="<?=ADMIN_TEMPLATE;?>images/stakanpaket_favicon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Оптовый интернет магазин</title>
    <link rel="stylesheet" type="text/css" href="<?=ADMIN_TEMPLATE?>styles/style.css" />
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/workscripts.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE;?>js/ajaxupload.js"></script>
</head>

<body>
<div class="karkas">
	<div class="head">
		<a href="<?=PATH?>admin/"><img src="<?=ADMIN_TEMPLATE?>images/logoAdm.jpg" /></a>
        <p><a href="<?=PATH?>" target="_blank">На сайт</a> | <a href="?view=edit_user&amp;user_id=<?=$_SESSION['auth']['user_id']?>"><?=$_SESSION['auth']['admin']?></a> | <a href="?do=logout"><strong>Выйти</strong></a></p>
	</div> <!-- .head -->