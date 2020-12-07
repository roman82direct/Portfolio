<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/models/M_Basket.php');

class C_Basket extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_index(){
        $this->title .= ' Корзина';
        $basket = new M_Basket($_SESSION['user']['id']);
        $orders = $basket->getOrders();
        if (isset($_SESSION['basket'])){
            $goods = [];
            foreach($_SESSION['basket'] as $id){
                $goods[] = db::getRow('SELECT * FROM goods where id_good = :id', ['id' => $id]);
            }            
            $total = $basket->getTotal();
        } 
        $this->render('basket.html', ['title' => $this->title, 'goods' => $goods,
        'basket' => '1', 'total' => $total, 'orders' => $orders]);	
    }
    
    public function action_view(){
        $this->action_index();
    }

    public function action_clear(){
        unset($_SESSION['basket']);
        $basket = new M_Basket($_SESSION['user']['id']);
        $basket->clear();
        $this->action_index();
    }

    public function action_toOrder(){
        if ($this->IsPost()){
            $basket = new M_Basket($_SESSION['user']['id']);
            $basket->toOrder($_POST['adr']);
            $basket->clear();
            unset($_SESSION['basket']);
        }
        $this->action_index();
    }    

}