<?php
namespace Model;
class Kelas extends \DB\Cortex {
    protected
    $fieldConf = [
        'nama_kelas'=>[
            'type' => \DB\SQL\Schema::DT_VARCHAR256
        ],
        'jadwal'=>[
            'has-many' => ["\\Model\\Jadwal", 'kelas']
        ],
        'created_on'=>[
             'type' => \DB\SQL\Schema::DT_DATETIME
        ],
        'updated_on'=>[
             'type' => \DB\SQL\Schema::DT_DATETIME
        ],
        'deleted_on'=>[
             'type' => \DB\SQL\Schema::DT_DATETIME
        ]
    ],
    $db = 'DB',
    $table = 'kelas';

    function set_created_on($time){
        return date('Y-m-d H:i:s', $time);
    }

    function set_updated_on($time){
        return date('Y-m-d H:i:s', $time);
    }

    function set_deleted_on($time){
        return date('Y-m-d H:i:s', $time);
    }

    function save() {
        if(!$this->created_on)
            $this->created_on = time();
        $this->updated_on = time();
        parent::save();
    }
}