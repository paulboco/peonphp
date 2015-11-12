<?php

namespace Peon\Http;

use Exception;
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
     * Send The Response
     *
     * @param  mixed  $response
     * @return void
     */
    public function send($response)
    {
        if (is_string($response)) {
            echo $this->injectExecutionTime($response);
        }
    }

    /**
     * Redirect To A URL
     *
     * @param  string  $uri
     * @return void
     * @codeCoverageIgnore - can't test methods that die
     */
    public function redirect($uri = null)
    {
        header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
        die();
    }

    /**
     * Send A 404 Response
     *
     * @return void
     * @codeCoverageIgnore - can't test methods that die
     */
    public function send404()
    {
        header("HTTP/1.0 404 Not Found");

        die($this->injectExecutionTime(
            $this->view->make('errors/404')
        ));
    }

    /**
     * Send A 503 Response
     *
     * @return void
     * @codeCoverageIgnore - can't test methods that die
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
