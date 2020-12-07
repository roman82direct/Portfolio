<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/config/DB.php';

class M_Search
{
    public function __construct($query){
        $this->query = $query;
    }

    public function search(){
        $this->query = trim($this->query);
        $this->query = htmlspecialchars($this->query);
        if (!empty($this->query)){
            if (strlen($this->query) < 3) {
                $resp = 'Слишком короткий поисковый запрос.';
            } else if (strlen($this->query) > 128) {
                $resp = 'Слишком длинный поисковый запрос.';
            } else {
                $sql = "SELECT * FROM `goods` WHERE `name` LIKE '%$this->query%' OR `discription` LIKE '%$this->query%'";
                $resp = db::getRows($sql, []);
            }
        } else {
            $resp = 'Задан пустой поисковый запрос.';
        }
        return $resp;
    }
}