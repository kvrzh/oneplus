<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 21:28
 */
class Controller_Main extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Main();
    }

    function action_index()
    {
        $id = null;
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $data['news'] = $this->model->get_news($id);
        if (isset($data['news'][3])) {
            unset($data['news'][3]);
            $data['moreNews'] = true;
        } else {
            $data['moreNews'] = false;
        }
        if (isset($_POST['id']) && $_POST['id'] != 0) {
            $this->view->load('more_news_view.php', $data);
        } else {
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }

    }

    function action_morenews()
    {
        $data['news'] = $this->model->get_news($_POST['id']);
        if (isset($data['news'][3])) {
            unset($data['news'][3]);
            $data['moreNews'] = true;
        } else {
            $data['moreNews'] = false;
        }
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}