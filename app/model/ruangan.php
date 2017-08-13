<?php
namespace Model;
class Ruangan extends \DB\Cortex {
    protected
    $fieldConf = [
        'ruangan_name'=>[
            'type' => \DB\SQL\Schema::DT_VARCHAR256
        ],
        'ruangan_label'=>[
            'type' => \DB\SQL\Schema::DT_VARCHAR256
        ],
        'jadwal'=>[
            'has-many' => ["\\Model\\Jadwal", 'ruangan']
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
    $table = 'ruangan';

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

    function is_free($hour_start, $hour_end){
        $jadwal = new \Model\Jadwal();

        // Bingung sama logikanya? Cek Wiki!
        $jadwal->load(['(NOT (time_start >= ?)) AND (NOT (time_end <= ?)) AND ruangan=?', $hour_end, $hour_start, $this->_id]);
        return $jadwal->loaded()==0;
    }
    
    function get_jadwals($hour_start, $hour_end){
        $jadwal = new \Model\Jadwal();
        return $jadwal->find(['(NOT (time_start >= ?)) AND (NOT (time_end <= ?)) AND ruangan=?', $hour_end, $hour_start, $this->_id]);
    }
}