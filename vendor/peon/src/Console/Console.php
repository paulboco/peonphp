<?php

namespace Peon\Console;

class Console extends ConsoleColors
{
    /**
     * The Argument Count
     *
     * @var integer
     */
    protected $argc;

    /**
     * The Argument Variables
     *
     * @var array
     */
    protected $argv;

    /**
     * The Relative Path To Command Files
     *
     * @var string
     */
    protected $path;

    /**
     * Create A New Console
     */
    function __construct($argc, $argv, $path = '')
    {
        $this->argc = $argc;
        $this->argv = $argv;
        $this->path = realpath($path);
    }

    /**
     * Dispatch The Command
     *
     * @return void
     */
    public function dispatch()
    {
        if (!$this->scriptExists()) {
            $this->fatal("Command ':argv1' not found");
            return;
        }

        extract($this->shiftArgs());

        require $this->path . "/console/{$argv[0]}.php";
    }

    /**
     * Check That Script Exists
     *
     * @return boolean|void
     */
    protected function scriptExists()
    {
        $scripts = $this->getScripts();

        return in_array($this->path . "/console/{$this->argv[1]}.php", $scripts);
    }

    /**
     * Get The Available Scripts
     *
     * @return array
     */
    protected function getScripts()
    {
        return glob($this->path . '/console/*.php');
    }

    /**
     * Print Success Message
     *
     * @param  string  $message
     * @return void
     */
    protected function success($message = '')
    {
        $message = $this->replaceArgs($message) . PHP_EOL;

        echo $this->colorizeString($message, 'green');
    }

    /**
     * Print Warning Message
     *
     * @param  string  $message
     * @return void
     */
    protected function warning($message = '')
    {
        $message = $this->replaceArgs($message) . PHP_EOL;

        echo $this->colorizeString($message, 'yellow');
    }

    /**
     * Handle Fatal Error
     *
     * @param  string  $message
     * @return void
     */
    protected function fatal($message = '')
    {
        $message = $this->replaceArgs($message) . PHP_EOL;

        echo $this->colorizeString($message, 'light_red');
        return;
    }

    /**
     * Replace Arguments In A Message String
     *
     * @param  string  $message
     * @return string
     */
    protected function replaceArgs($message)
    {
        foreach ($this->argv as $key => $value) {
            $message = str_replace(":argv{$key}", $value, $message);
        }

        return $message;
    }

    /**
     * Shift Arguments
     *
     * @return void
     */
    protected function shiftArgs()
    {
        array_shift($this->argv);

        return array(
            'argc' => $this->argc -= 1,
            'argv' => $this->argv,
        );
    }
}