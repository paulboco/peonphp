<?php

namespace Peon;

class Session
{
    /**
     * Start The Session
     *
     * @return void
     */
    public function start()
    {
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * Set A Session Variable
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get A Session Variable
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Forget A Session Variable
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Session Has A Variable
     *
     * @param  string  $key
     * @return boolean
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     *  Flash A Session Variable
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return mixed
     */
    public function flash($name, $value = null) {
        if (!empty($value) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            $_SESSION[$name] = $value;
        }
        //value exists, display it
        elseif (!empty($_SESSION[$name]) && empty($value)) {
            $value = $_SESSION[$name];
            unset($_SESSION[$name]);
            return $value;
        }
    }
}