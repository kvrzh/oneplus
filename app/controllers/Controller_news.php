<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 23:39
 */
class Controller_news extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_News();
    }

    function action_index($id = null)
    {
        $id = (int)$id;
        if ($id == 0 || $id == null) {
            header('Location: /');
        }
        $data['commentaries'] = $this->model->get_commentaries($id);
        $data['new'] = $this->model->get_one($id);
        $this->view->generate('news_view.php', 'template_view.php', $data);
    }

    function action_commentary()
    {
        echo $this->model->new_comment($_POST['message'], $_POST['date'], $_POST['id']);
    }
}