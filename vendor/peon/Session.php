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
     * Get A Session Variable
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        return $_SESSION[$key];
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