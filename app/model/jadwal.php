<?php
namespace Model;
class Jadwal extends \DB\Cortex {
    protected
    $fieldConf = [
        'kelas'=>[
            'belongs-to-one'=>'\\Model\\Kelas'
        ],
        'ruangan'=>[
            'belongs-to-one'=>'\\Model\\Ruangan'
        ],
        'time_start'=>[
             'type' => \DB\SQL\Schema::DT_INT
        ],
        'time_end'=>[
             'type' => \DB\SQL\Schema::DT_INT
        ],
        'time_day'=>[
            'type' => \DB\SQL\Schema::DT_INT
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
    $table = 'jadwal';

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