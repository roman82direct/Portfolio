<?php
//
// Базовый класс контроллера.
//
abstract class C_Controller
{
	
	
	// Функция отрабатывающая до основного метода
	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();
		$this->$action();   //$this->action_index
	}
	
	//
	// Запрос произведен методом GET?
	//
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	//
	// Запрос произведен методом POST?
	//
	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	// Если вызвали метод, которого нет - завершаем работу
	public function __call($name, $params){
		$this->title .= ' Страница не найдена';
        $loader = new \Twig\Loader\FilesystemLoader('./views/');
        $twig = new \Twig\Environment($loader);
		echo $twig->render('404.html', ['title' => $this->title]);
	}
}
