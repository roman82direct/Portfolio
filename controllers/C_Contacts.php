<?php

class C_Contacts extends C_Base
{

	public function action_view(){

		$this->title .= ' Контакты';

        $this->render('contacts.html', ['title' => $this->title,
            'contacts' => '1', 'mesName' => $res[0], 'mesTel' => $res[1], 'mesMail' => $res[2],
            'name' => $_POST['name'], 'tel' => $_POST['tel'], 'mail' => $_POST['email'], 'messValue' => $_POST['message'], 'error' => $res[0] . $res[1] . $res[2],
            'date' => date('d-M-Y;  H-i')]);
	}
}