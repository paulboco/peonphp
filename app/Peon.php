<?php

namespace App;

use Peon\BaseModel;

class Peon extends BaseModel
{
    /**
     * Get All Peons
     *
     * @return array
     */
    public function all() {
        $query = $this->fluent->from('peons')
                    ->select('id, name, rating')
                    ->where('id > ?', 3)
                    ->orderBy('name DESC')
                    ->limit(5);
        $peons = $query->fetchAll();

        // $count = $query->rowCount();
dd($query->fetchAll());
        return $query->fetchAll();
    }

    /**
     * Get Count
     *
     * @return integer
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * Find By ID
     *
     * @param  integer  $id
     * @return array
     */
    public function find($id) {
        return $this->findById('peons', $id);
    }

    /**
     * Update By ID
     *
     * @param  integer  $id
     * @param  array  $data
     * @return boolean
     */
    public function update($id, $data) {

        return $this->updateById('peons', $id, $data);
    }

    /**
     * Seed The peons Table
     *
     * @return void
     */
    public function seedDb()
    {
        $this->import('peons');
    }


}