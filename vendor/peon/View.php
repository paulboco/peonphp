<?php

namespace Peon;

class View
{
    /**
     * Make A View
     *
     * @param  string  $template
     * @param  array  $data
     * @return string
     */
    public function make($template, $data = array())
    {
        ob_start();
        $this->render($template, $data);

        return ob_get_clean();
    }

    /**
     * Render The View
     *
     * @param  string  $template
     * @param  array  $data
     * @return void
     */
    public function render($template, $data = array())
    {
        extract($data);
        $errors = isset($errors) ? $errors : array();
        include path("/views/{$template}.tpl");
    }

    /**
     * Inject A View From Within A View
     *
     * @param  string  $template
     * @param  array  $data
     * @return void
     */
    protected function inject($template, $data = array())
    {
        $this->render($template, $data);
    }
}
