<?php
include_once $_SERVER['DOCUMENT_ROOT'] .'/models/M_Search.php';


class C_Search extends C_Base
{
    public function action_index(){}

    public function action_search(){
        if ($this -> IsPost()){
            $search = new M_Search($_POST['search']);
            $response = $search->search();

            if (is_array($response)){
                $goods = $response;
                $count = count($goods);
                if (!$count){
                    $text = 'Совпадений не найдено';
                }
            } else {
                $text = $response;
            }
            $this->title .= ' Результаты поиска';
            $this->render('searchRes.html', ['title' => $this->title,  'resp' => $text, 'goods' => $goods, 'count'=>$count]);
        }
    }
}