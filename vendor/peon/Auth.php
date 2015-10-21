<?php

namespace Peon;

use App\User;

class Auth
{
    /**
     * The User Instance
     *
     * @var Peon\User
     */
    private $user;

    /**
     * The Session Instance
     *
     * @var Peon\Session
     */
    private $session;

    /**
     * Create A New Auth
     *
     * @param  Peon\User  $user
     * @param  Peon\Session  $session
     * @return void
     */
    public function __construct(User $user, Session $session)
    {
        $this->user = $user;
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
        // get user by username
        // check password
        // write session id to user if authenticated

        // FAKE LOGIN
        if ($credentials['username'] == 'asdf' and $credentials['password'] == 'asdf') {
            $id = session_id();

// dd($id, $credentials);
            return true;
        }

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
        $this->session[''];
    }
}