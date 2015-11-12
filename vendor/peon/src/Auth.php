<?php

namespace Peon;

use App\Models\User;
use Peon\Session\Session;

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
     * Create A New Auth
     *
     * @param  Peon\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
            $_SESSION[session_id()] = $user;
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
        return array_key_exists(session_id(), $_SESSION);
    }

    /**
     * Get The Authenticated User
     *
     * @return stdClass
     */
    public static function user()
    {
        if (isset($_SESSION[session_id()])) {
            return (object) $_SESSION[session_id()];
        }
    }

    /**
     * Check That User Is A Given Level
     *
     * @param  integer  $level
     * @return boolean
     */
    public static function level($level)
    {
        if (isset($_SESSION[session_id()])) {
            return $_SESSION[session_id()]['level'] <= $level;
        }
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
