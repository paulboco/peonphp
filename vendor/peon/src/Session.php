<?php

namespace Peon;

use Illuminate\Arr;
use Peon\SessionHandler;

class Session
{
    /**
     * Start The Session
     *
     * @param  string  $driver
     * @param  string  $name
     * @param  integer  $duration
     * @return void
     */
    public function start($driver = 'file', $name = 'peon_session', $duration = 1800)
    {
        $this->setHandler($driver);
        $this->setDuration($duration);

        session_name('peon_session');
        session_start();

        $this->prepareFlash();
    }

    /**
     * Flush The Entire Session
     *
     * @return void
     */
    public function flush()
    {
        $_SESSION = array();
    }

    /**
     * Forget A Session Variable
     *
     * @param  string  $keys
     * @return void
     */
    public function forget($keys)
    {
        Arr::forget($_SESSION, $keys);
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
        return Arr::get($_SESSION, $key, $default);
    }

    /**
     * Get A Previously Flashed Variable
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function getFlash($key = null, $default = null)
    {
        $key = 'flash-available' . (is_null($key) ? '' : ".{$key}");

        return $this->get($key, $default);
    }

    /**
     * Check For A Session Variable
     *
     * @param  string  $key
     * @return mixed
     */
    public function has($key)
    {
        return Arr::has($_SESSION, $key);
    }

    /**
     * Check For A Flash Variable
     *
     * @param  string  $key
     * @return mixed
     */
    public function hasFlash($key)
    {
        return Arr::has($_SESSION, 'flash-available.' . $key);
    }

    /**
     * Set A Session Variable
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function set($key, $value)
    {
        return Arr::set($_SESSION, $key, $value);
    }

    /**
     * Set A Flashed Variable
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setFlash($key, $value = null)
    {
        return $this->set('flash-pending.' . $key, $value);
    }

    /**
     * Set The Session Handler
     *
     * @param  string  $driver
     * @return void
     */
    private function setHandler($driver)
    {
        switch ($driver) {
            case 'database':
                $handler = new SessionHandler;
                break;

            case 'file':
            default:
                break;
        }
    }

    /**
     * Set Session Duration
     *
     * @param  integer  $duration
     * @return void
     */
    private function setDuration($duration)
    {
        ini_set('session.gc_maxlifetime', $duration);
        session_set_cookie_params($duration);
    }

    /**
     * Prepare Flash Variables
     *
     * @return void
     */
    private function prepareFlash()
    {
        $this->set('flash-available', $this->get('flash-pending'));
        $this->forget('flash-pending');
    }
}
