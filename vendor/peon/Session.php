<?php

namespace Peon;

class Session
{
    public function start()
    {
        if (!session_id()) {
            session_start();
        }
    }

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