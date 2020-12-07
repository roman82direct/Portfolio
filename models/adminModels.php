<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/config/DB.php';

// Ajax рендер товаров в админку
if (isset($_GET['goods'])) {
    $req = "SELECT * FROM `goods`";
    $goods = db::getRows($req, []);

    foreach ($goods as $val) {
        echo
            "<div class='galitem'>" .
                "<img src=" . "public/catalogImg/" . $val['catalogImg'] . ">" .
                "<h3>" . $val['name'] . "</h3>" .
                "<p class='itemId'>" . $val['id_good'] . "</p>" .
                "<p class='itemprice'>" . $val['price'] . "$" . "</p>" .

                "<form class='itemForm' data-id='".$val['id_good']."' action='index.php?act=view&c=goodedit&id_good=".$val['id_good']."' method='post'>".
                "<input type='submit' value='Редактировать' class='btn btn-primary'>".
                "</form>".
            "</div>";
    }
}//else echo "ID не передан";

// Ajax рендер заказов в админку
if (isset($_GET['orders'])) {
    $req = "SELECT * FROM `orders`";
    $orders = db::getRows($req, []);

    foreach ($orders as $val) {
        $users = db::getRow('SELECT * FROM user where id_user = :userId', ['userId' => $val['id_user']]);

        echo
            "<div class='admOrder'>" .
                "<h4> Заказ №" . $val['id_order'] . "</h4>" .
                "<p class=''>Дата: " . $val['datetime_create'] . "</p>" .
                "<p class=''>Адрес доставки: " . $val['destination'] . "</p>" .
                "<p class=''>ID пользователя: " . $val['id_user'] . "</p>" .
                "<p class=''>Имя пользователя: " . $users['user_name'] . "</p>" .
                "<p class=''>Сумма заказа: " . $val['amount'] . "$</p>" .
                "<button id='".$val['id_order']."'>"."Редактировать</button>" .
            "<hr> </div>";
    }
}
