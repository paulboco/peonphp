<?php

namespace Peon;

class View
{
    /**
     * Create a new view
     *
     * @return void
     */
    public function __construct()
    {
        $this->view = $this;
    }

    /**
     * Make A View
     *
     * @param  string  $template
     * @param  array  $data
     * @return string
     */
    public function make($template, $data = array())
    {
        extract($data);
        $errors = isset($errors) ? $errors : array();

        include path("/views/{$template}.tpl");
    }
}
