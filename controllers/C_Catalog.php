<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/models/M_Basket.php');
//require '../controllers/C_Base.php';

class C_Catalog extends C_Base
{
	// Конструктор.

	public function action_index(){
        $this->title .= ' Каталог товаров';
        
        $goods = db::getRows('SELECT * FROM goods limit 4', []);
        $this->render('Catalog.html', ['title' => $this->title,
        'catalog' => '1', 'goods' => $goods]);	
    }
    
    public function action_view(){
        $this->action_index();
    }

    public function showNext(){
//        $data = db::getRow('SELECT * FROM `goods` order by `id_good` LIMIT 1');
//        $minId = $data['id_good'];// Узнаем наименьший Id в БД
//
//        if (isset($_GET['next'])) {
//            if ($_GET['next'] > $minId) {
//                $req = "SELECT * FROM `goods` WHERE `id_good`>" . $_GET['next'] . " order by `id_good` LIMIT 4";
//                $goods = db::getRows($req, []);
//
//                foreach ($goods as $val) {
////                    echo $val['name'] . '; ';
//                    if ($_SESSION['user']) {
//                        echo
//                            "<div class='galitem'>" .
//                            "<img src=" . "catalogImg/" . $val['catalogImg'] . ">" .
//                            "<h3>" . $val['name'] . "</h3>" .
//                            "<p class='itemId'>" . $val['id_good'] . "</p>" .
//                            "<p class='itemprice'>" . $val['price'] . "$" . "</p>" .
//
//                            "<form action='index.php?act=buy&c=catalog' method='post'>" .
//                                "<input type='hidden' name='add' value='" . $val['id_good'] . "'>" .
//                                "<input type='submit' value='В корзину' class='btn btn-primary'>" .
//                            "</form>" .
//
//                            "</div>";
//                    } else {
//                        echo
//                            "<div class='galitem'>" .
//                            "<img src=" . "catalogImg/" . $val['catalogImg'] . ">" .
//                            "<h3>" . $val['name'] . "</h3>" .
//                            "<p class='itemId'>" . $val['id_good'] . "</p>" .
//                            "<p class='itemprice'>" . $val['price'] . "$" . "</p>" .
//                            "</div>";
//                    }
//
////                $this->render('render4.html', ['goods' => $goods]);
//                }
//            } return false;
//        }
    }

    public function action_buy(){
        
        if ($this->IsPost()){
            if (!isset($_SESSION['basket'])){
                $_SESSION['basket'] = [];
            } 
            $_SESSION['basket'][] = (int)$_POST['add'];
            $basket = new M_Basket($_SESSION['user']['id']);
            $basket->addGood((int)$_POST['add']);
        }
        $this->action_index();
    }
}