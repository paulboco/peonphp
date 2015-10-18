<?php

namespace Peon;

class Auth
{
    /**
     * The Session Instance
     *
     * @var Peon\Session
     */
    private $session;

    /**
     * Create A New Auth
     *
     * @param  Peon\Session  $session
     * @return void
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Attempt To Authenticate
     *
     * @param  array  $credentials
     * @return boolean
     */
    public function attempt($credentials)
    {
        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        return isset('authenticated');
    }

    /**
     * Check If User Is Authenticated
     *
     * @return boolean
     */
    public function check()
    {
        return true;
    }

    /**
     * Logout The User
     *
     * @return void
     */
    public function logout()
    {
        $this->session['']
    }
}