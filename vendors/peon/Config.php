<?php
namespace Peon;

class Config
{
    /**
     * The Config File
     *
     * @var string
     */
    protected $file;

    /**
     * The Parts
     *
     * @var array
     */
    protected $parts;

    /**
     * The Configuration Value
     *
     * @var $config
     */
    protected $config;

    /**
     * Get Configuration Data
     *
     * @param  string  $path
     * @param  mixed   $default
     * @return mixed
     */
    public function get($path, $default = null)
    {
        $this->parsePath($path);

        if (!$this->loadConfigFile()) {
            return $default;
        }

        return $this->getValue() ?: $default;
    }

    /**
     * Parse The Config Path
     *
     * @param  string  $path
     * @return void
     */
    private function parsePath($path)
    {
        $this->parts = explode('.', $path);

        $this->file = array_shift($this->parts);
    }

    /**
     * Load Config File
     *
     * @return boolean
     */
    private function loadConfigFile()
    {
        $file = path("/config/{$this->file}.php");

        if (file_exists($file)) {
            $this->config = include $file;
            return true;
        }
    }

    /**
     * Get Configuration Value
     *
     * @return mixed
     */
    private function getValue()
    {
        foreach ($this->parts as $part) {
            if (!is_array($this->config)) {
                return;
            }

            if (!array_key_exists($part, $this->config)) {
                return;
            }

            $this->config = $this->config[$part];
        }

        return $this->config;
    }

}
