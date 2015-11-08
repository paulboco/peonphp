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
     * Create A New Console
     */
    function __construct($argc, $argv)
    {
        $this->argc = $argc;
        $this->argv = $argv;
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
        }

        extract($this->shiftArgs());

        require __DIR__ . "/../../../../console/{$argv[0]}.php";
    }

    /**
     * Check That Script Exists
     *
     * @return boolean|void
     */
    protected function scriptExists()
    {
        $scripts = $this->getScripts();

        return in_array("console/{$this->argv[1]}.php", $scripts);
    }

    /**
     * Get The Available Scripts
     *
     * @return array
     */
    protected function getScripts()
    {
        return glob('console/*.php');
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
        die;
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