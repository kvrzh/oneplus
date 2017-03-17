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
        $data['news'] = $this->model->get_news();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}