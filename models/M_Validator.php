<?php


class M_Validator
{

    public function __construct()
    {
        $this->patterns = [
            'name'=> '/^[a-zа-я]+$/iu',
            'tel'=> '/^\+?(7|8)(\(|-)?\d{3}(\)|-)?\d{3}-?\d{2}-?\d{2}$/',
            'mail'=>'/^[\w._-]+@\w+\.[a-z]{2,4}$/i'
        ];
        $this->errors =[
            'name'=> 'Имя должно содержать только буквы',
            'tel'=> 'Телефон в формате +7(000)000-0000',
            'mail'=>'E-mail в формате mymail@mail.ru'
        ];
    }

    public function regExp(){
            $name = $_POST['name'];
            $mail = $_POST['email'];
            $tel = $_POST['tel'];
            if(preg_match($this->patterns['name'], $name)){
                $mesName = "";
            } else $mesName = $this->errors['name'];

            if(preg_match($this->patterns['tel'], $tel)){
                $mesTel = "";
            } else $mesTel = $this->errors['tel'];

            if(preg_match($this->patterns['mail'], $mail)){
                $mesMail = "";
            } else $mesMail = $this->errors['mail'];

            return $mes = [$mesName, $mesTel, $mesMail];
    }

}