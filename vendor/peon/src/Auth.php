<?php

namespace Peon;

use App\Models\User;
use Peon\App;

class Auth
{
    const SUPER = 1;
    const ADMIN = 10;
    const MANAGER = 100;

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
        if (!$user = $this->user->findByUsername($credentials['username'])) {
            return false;
        }

        if (password_verify($credentials['password'], $user['password'])) {
            $this->session->set(session_id(), $user);
            return true;
        }

        return false;
    }

    /**
     * Check If User Is Authenticated
     *
     * @return boolean
     */
    public static function check()
    {
        $session = App::getInstance()->make('session');

        return $session->has(session_id());
    }

    /**
     * Get The Authenticated User
     *
     * @return stdClass
     */
    public static function user()
    {
        $session = App::getInstance()->make('session');

        return (object) $session->get(session_id());
    }

    /**
     * Check That User Is A Given Level
     *
     * @param  integer  $level
     * @return boolean
     */
    public static function level($level)
    {
        $session = App::getInstance()->make('session');
        $user = $session->get(session_id());

        return $user['level'] <= $level;
    }

    /**
     * Logout The User
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        session_write_close();

        return true;
    }
}