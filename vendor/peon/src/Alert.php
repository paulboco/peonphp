<?php

namespace Peon;

use Peon\Session\Session;

class Alert
{
    /**
     * The Session Instance
     *
     * @var Peon\Session\Session
     */
    protected $session;

    /**
     * Create a new message
     *
     * @return void
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Flash Alert To The Session
     *
     * @param  string  $level
     * @param  string  $text
     * @return void
     */
    public function flash($level, $text)
    {
        $this->session->setFlash('alerts.' . $level, $text);
    }

    /**
     * Check If Alerts Exist
     *
     * @return boolean
     */
    public function has()
    {
        return $this->session->has('alerts');
    }

    /**
     * Get All Flashed Alerts
     *
     * @return array
     */
    public function all()
    {
        return $this->session->getFlash('alerts', array());
    }
}
