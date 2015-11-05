<?php

namespace Peon;

class View
{
    /**
     * Shared Data
     *
     * @var array
     */
    protected $shared = array();

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
        extract($this->shared);
        extract($data);

        $errors = isset($errors) ? $errors : array();
        require path("/views/{$template}.tpl");
    }

    /**
     * Share Data With All Views
     *
     * @param  array  $data
     * @return void
     */
    public function share($data)
    {
        $this->shared = array_merge($this->shared, $data);
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
