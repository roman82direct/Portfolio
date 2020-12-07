<?php

class C_Goodedit extends C_Base
{

    public function action_index()
    {
        $this->title .= ' Редактор товаров';
        $good = db::getRow('SELECT * FROM goods where id_good = :goodId', ['goodId' => $_GET['id_good']]);

        $this->render('admGoodEdit.html', ['title' => $this->title,  'id_good' => $good['id_good'], 'name' => $good['name'],
            'price' => $good['price'], 'img' => $good['catalogImg'], 'discr' => $good['discription']]);
    }

    public function action_view()
    {
        $this->action_index();
    }

    public function action_newgood()
    {
        $this->title .= ' Новый товар';
        $this->render('admNewGood.html',['title' => $this->title]);
    }
}
