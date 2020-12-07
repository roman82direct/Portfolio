<?php

class M_Basket{

  public function __construct($userId){
    $this->userId = $userId;
  }

  public function getTotal(){
    $sql = "SELECT SUM(price) as 'sum' FROM basket where id_user = :userId and id_order IS NULL";
    $arg = ['userId' => $this->userId];
    return db::getRow($sql, $arg)['sum'];
  }

  public function clear(){
    $sql = "DELETE FROM basket where id_order IS NULL and id_user = :userId";
    $arg = ['userId' => $this->userId];
    db::delete($sql, $arg);    
  }

  public function addGood($goodId){
    $sql = "INSERT INTO basket (id_user, id_good, price) VALUES (:userId, :goodId, (SELECT price FROM goods WHERE id_good = :goodId))";
    $arg = ['userId' => $this->userId, 'goodId' => $goodId];
    db::insert($sql, $arg);
  }

  public function toOrder($destination){
    $total = $this->getTotal();
    $sql = "INSERT INTO orders (id_user, amount, id_order_status, destination) VALUES (:userId, :total, 1, :dest)";
    $arg = ['userId' => $this->userId, 'total' => $total, 'dest' => $destination];
    $orderId = db::insert($sql, $arg);
    $sql = "UPDATE basket SET id_order = :orderId where id_user = :userId and id_order IS NULL";
    $arg = ['userId' => $this->userId, 'orderId' => $orderId];
    db::update($sql, $arg);
  }

  public function getOrders(){
    $sql = "SELECT o.datetime_create, o.amount, o.destination, os.order_status_name " . 
    "FROM orders o JOIN order_status os ON o.id_order_status = os.id_order_status WHERE id_user = :userId";
    $arg = ['userId' => $this->userId];
    return db::getRows($sql, $arg);
  }

  private $userId;
}