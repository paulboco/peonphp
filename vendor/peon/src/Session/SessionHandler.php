<?php

namespace Peon\Session;

use Peon\Pdo\PdoBase;

class SessionHandler extends PdoBase
{
    /**
     * The Sessions Table Name
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * Create A New SessionHandler
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        session_set_save_handler(
            array($this, "_open"),
            array($this, "_close"),
            array($this, "_read"),
            array($this, "_write"),
            array($this, "_destroy"),
            array($this, "_gc")
        );

        register_shutdown_function('session_write_close');
    }

    /**
     * Open
     *
     * @return boolean
     */
    public function _open()
    {
        return $this->isConnected();
    }

    /**
     * Close
     *
     * @return boolean
     */
    public function _close()
    {
        $this->closeConnection();

        return true;
    }

    /**
     * Read
     *
     * @return string
     */
    public function _read($id)
    {
        $row = $this->findById($id);

        return $row['data'];
    }

    /**
     * Write
     *
     * @return boolean
     */
    public function _write($id, $data)
    {
        return $this->replaceInto(array(
            'id' => $id,
            'access' => time(),
            'data' => $data,
            'deleted' => 0,
        ));
    }

    /**
     * Destroy
     *
     * @return boolean
     */
    public function _destroy($id)
    {
        return $this->delete($id);
    }

    /**
     * Garbage Collection
     *
     * @return boolean
     */
    public function _gc($max)
    {
        $expired = time() - $max;

        return $this->deleteWhere(array(
            'access', '<', $expired,
        ));
    }
}
