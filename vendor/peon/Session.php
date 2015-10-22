<?php

namespace Peon;

use Illuminate\Arr;
use Peon\App;

class Session
{
    protected $duration = 1800;

    /**
     * Start The Session
     *
     * @return void
     */
    public function start($app)
    {
        $app->make('sessionhandler');

        if (!session_id()) {
            ini_set('session.gc_maxlifetime', $this->duration);
            ini_set('session.gc_probability', 100);
            ini_set('session.gc_divisor', 100);

            session_name('peon_session');
            session_start();
        }

        $this->checkLastActivity();
        $this->checkWhenCreated();
        $this->prepareFlash();
    }

    protected function checkLastActivity()
    {
        if ($this->has('session.last_active') && (time() - $this->get('session.last_active') > $this->duration)) {
            session_unset();
            session_destroy();
        }

        $this->set('session.last_active', time());
    }

    protected function checkWhenCreated()
    {
        if (!$this->has('session.created')) {
            $this->set('session.created', time());
        } else if (time() - $this->get('session.created') > $this->duration) {
            session_regenerate_id(true);
            $this->set('session.created', time());
        }
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
    public function getFlash($key, $default = null)
    {
        return $this->get('flash-available.' . $key, $default);
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
