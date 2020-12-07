<?php
//
// Конттроллер страницы чтения.
//
require_once($_SERVER['DOCUMENT_ROOT'] .'/models/M_User.php');

class C_User extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_auth(){
//		$this->title .= '::Чтение';
//		$text = text_get();
//		$this->content = $this->Template('v/v_index.php', array('text' => $text));
		/*$user = new M_User();
		if($user->auth($login,$pass))
		*/	
	}
	
	public function action_edit(){
//		$this->title .= '::Редактирование';
//
//		if($this->isPost())
//		{
//			text_set($_POST['text']);
//			header('location: index.php');
//			exit();
//		}
//
//		$text = text_get();
//		$this->content = $this->Template('v/v_edit.php', array('text' => $text));
//		echo $twig->render($pagename . '.html', $vars);
	}

	public function action_lk(){
		$this->title .= ' Личный кабинет';
		$history = $_SESSION['history'];
		$username = isset($_SESSION['user']) ? $_SESSION['user'] : "anonimus";
		$this->content = $this->Template('v/v_lk.php', array('username' => $username, 'lasturls' => $history));		
	}

	public function action_login(){
    	$this->title .= ' Вход';
		if($this->isPost()){
			$user = new M_User();
			if ($user->login($_POST['userlogin'], $_POST['userpassword'])){
				$_SESSION['user']['id'] = $user->getId();
				$_SESSION['user']['name'] = $user->getName();
				$_SESSION['user']['login'] = $user->getLogin();
				$_SESSION['user']['role'] = $user->getRole();
				header('location: index.php');
			}
			
		}
		$this->render('login.html', ['title' => $this->title, 'username' => '1']);
	
	}	

	public function action_logout(){
		unset($_SESSION['user']);
		header('location: index.php');
		exit();	
	}	
	
	public function action_registration(){
    	$this->title .= ' Регистрация нового пользователя';
		
		if($this->isPost()){
			$user = new M_User();
			$user->new($_POST['username'], $_POST['userlogin'], $_POST['userpassword']);
			header('location: index.php?act=login&c=user');
		}	
		$this->render('registration.html', ['title' => $this->title, 'username' => '1']);	
	
	}
}
