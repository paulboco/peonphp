<?php

namespace Peon;

class Response
{
    /**
     * The view instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * Create a new response
     *
     * @return void
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Redirect To A URL
     *
     * @param  string  $uri
     * @return void
     */
    public function redirect($uri = null)
    {
        return function () use ($uri) {
            header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
        };
    }

    /**
     * Send The Response
     *
     * @param  mixed  $response
     * @return void
     */
    public function send($response)
    {
        if (is_callable($response)) {
            call_user_func($response);
        }

        if (is_string($response)) {
            $execution_time = round((microtime(true) - PEON_START) * 1000, 1);
            $response = str_replace('%%EXECUTION_TIME%%', $execution_time, $response);

            echo $response;
        }

        die;
    }

    /**
     * Send A 404 Response
     *
     * @return void
     */
    public function send404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->view->render('errors/404');
        die;
    }

    /**
     * Send A 503 Response
     *
     * @return void
     */
    public function send503()
    {
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header('Retry-After: 3600');
        $this->view->render('errors/503');
        die;
    }
}
