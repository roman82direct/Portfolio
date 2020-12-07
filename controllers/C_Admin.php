<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/models/M_Admin.php');

class C_Admin extends C_Base {

    public function action_index(){
        $this->title .= ' Админка';
        $this->render('admin.html', ['title' => $this->title,  'admin' => $_SESSION['user']['role'], 'name' => $_SESSION['user']['name']]);
    }

    public function action_view(){
        $this->action_index();
    }

    public function action_renderGoods(){

    }

    public function action_renderOrders(){

    }

    public function action_newGood(){
        if ($this -> IsPost()){
            $admin = new M_Admin('', $_POST['title'], $_POST['price'], $_POST['discr']);
            $admin->new_good();
        }
    }

    public function action_changeImg(){
        if ($this -> IsPost()){
            $admin = new M_Admin($_POST['id_good'],'', '', '');
            $admin->load_img();
            header('Location: index.php?act=view&c=goodedit&id_good='.$_POST['id_good']);
        }
    }

    public function action_saveGood(){
        if ($this -> IsPost()){
            $admin = new M_Admin($_POST['goodId'], $_POST['title'], $_POST['price'], $_POST['discr']);
            $admin->save_good();
            header('Location: index.php?act=view&c=goodedit&id_good='.$_POST['goodId']);
        }
//        $this->action_index();
    }

    public function action_deleteGood(){
        if ($this -> IsPost()){
            $admin = new M_Admin($_POST['goodId'], $_POST['title'], $_POST['price'], $_POST['discr']);
            $admin->delete_good();
        }
        $this->action_index();
    }
}
