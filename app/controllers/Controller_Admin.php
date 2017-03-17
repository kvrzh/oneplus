<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.03.2017
 * Time: 15:08
 */
class Controller_Admin extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Admin();
    }
    function action_index()
    {
        $data['news'] = $this->model->get_news();
        if(isset($_POST['email']) && isset($_POST['password'])){
            if($this->model->check_admin($_POST['email'], encode_pass($_POST['password']))){
                $_SESSION['admin'] = true;
            }
        }
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
            $this->view->generate('admin/main_view.php', 'template_view.php',$data);
        }else{
            header('Location: /admin/login');
        }

    }
    function action_login(){
        $this->view->generate('admin/login_view.php', 'template_view.php');
    }
    function action_add(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $data['role'] = $routes[2];
        if(isset($_POST) && isset($_POST['text'])){
            $this->model->add_news($_POST['text'], $_POST['more'], $_POST['date'], $_POST['image']);
        }
        $this->view->generate('admin/add_view.php', 'template_view.php',$data);
    }
    function action_delete($id){
        $this->model->delete_news($id);
    }
    function action_edit($id){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $data['role'] = $routes[2];
        if(isset($_POST['update'])){
            unset($_POST['update']);
            $this->model->update_news($id, $_POST);
        }
        if(isset($id)){
            $data['news'] = $this->model->get_news_by_id($id);
        }else{
            header('Location: /admin');
        }

        $this->view->generate('admin/add_view.php', 'template_view.php', $data);
    }
    function action_commentaries($id){
        if(isset($id)){
            $data['commentaries'] = $this->model->get_commentaries($id);
            $this->view->generate('admin/commentaries_view.php', 'template_view.php', $data);
        }else{
            header('Location: /admin');
        }
    }
    function action_deletecomment($id){
        $this->model->deletecomment($id);
        header('Location: /admin/commentaries/'.$id);
    }
}