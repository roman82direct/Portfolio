<?php

class C_Index extends C_Base
{

	public function action_index(){

		$this->title .= ' Главная';

        $goods = db::getRows('SELECT * FROM goods limit 4', []);
		$this->render('index.html', ['title' => $this->title, 'main' => '1', 'goods' => $goods]);
	}
}