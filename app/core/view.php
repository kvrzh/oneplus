<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 21:04
 */
class View
{
    public $template_view;

    function generate($content_view, $template_view, $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }
        include 'app/views/template/'.$template_view;
    }
}