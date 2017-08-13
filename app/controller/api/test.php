<?php
Namespace Controller\Api;

class Test {
    function get_index($f3){
        header("Content-type: text/plain");
        echo \json_encode((new \Model\Jadwal())->find(["?", 1])->castAll(), JSON_PRETTY_PRINT);   
    }

    function get_kelas($f3){
        header("Content-type: text/plain");
        echo \json_encode((new \Model\Kelas())->find(["?", 1])->castAll(["jadwal"=>['*'=>0, "ruangan"=>0]]), JSON_PRETTY_PRINT);   
    }

    function get_ruangan($f3){
        header("Content-type: text/plain");
        echo \json_encode((new \Model\Ruangan())->find(["?", 1])->castAll(), JSON_PRETTY_PRINT);   
    }

    function get_is_free($f3){
        header("Content-type: text/plain");
        $ruangan = new \Model\Ruangan();
        $ruangan->load(['id = ?', $f3->GET['id']]);
        $hasil = [
            "hour_start"=>$f3->GET['start'],
            "hour_end"  =>$f3->GET['end'],
            "ruangan_id"=>$ruangan->cast(null, 0),
            "is_free"   =>$ruangan->is_free($f3->GET['start'],$f3->GET['end']),
            "jadwals"   =>$ruangan->get_jadwals($f3->GET['start'],$f3->GET['end'])->castAll(["*"=>1,"ruangan"=>-1]),
        ];

        echo \json_encode($hasil, JSON_PRETTY_PRINT);
    }

}