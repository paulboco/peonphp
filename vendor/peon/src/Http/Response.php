<?php

namespace Peon\Http;

use Peon\View;

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
     * @codeCoverageIgnore
     */
    public function redirect($uri = null)
    {
        return function () use($uri) {
            header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
        };
    }

    /**
     * Redirect To A URL And Send
     *
     * @param  string  $uri
     * @return void
     * @codeCoverageIgnore
     */
    public function redirectAndSend($uri = null)
    {
        $this->send($this->redirect($uri));
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
            echo $this->injectExecutionTime($response);
        }
    }

    /**
     * Send A 404 Response
     *
     * @return void
     */
    public function send404()
    {
        header("HTTP/1.0 404 Not Found");

        $this->send($this->injectExecutionTime(
            $this->view->make('errors/404')
        ));
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

        die($this->injectExecutionTime(
            $this->view->make('errors/503')
        ));
    }

    /**
     * Inject Execution Time
     *
     * @param  string  $html
     * @return string
     */
    private function injectExecutionTime($html)
    {
        return str_replace(
            '%%EXECUTION_TIME%%',
            round((microtime(true) - PEON_START) * 1000, 1),
            $html
        );
    }
}
