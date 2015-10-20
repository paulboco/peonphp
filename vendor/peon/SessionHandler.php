<?php

namespace Peon;

class SessionHandler extends MysqlPdo
{
    protected $table = 'sessions';

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
    }

    /**
     * Open
     */
    public function _open()
    {
        return $this->isConnected();
    }

    /**
     * Close
     */
    public function _close()
    {
        return $this->closeConnection();
    }

    /**
     * Read
     */
    public function _read($id)
    {
        return $this->findById($id);
    }

    /**
     * Write
     */
    public function _write($id, $data)
    {
        return $this->replaceValues(array(
            'id' => $id,
            'access' => time(),
            'data' => $data,
        ));
    }

    /**
     * Destroy
     */
    public function _destroy($id)
    {
        return $this->deleteById($id);
    }

    /**
     * Garbage Collection
     */
    public function _gc($max)
    {
        $expired = time() - $max;

        return $this->deleteWhere(array(
            'access', '<', $expired,
        ));
    }
}
