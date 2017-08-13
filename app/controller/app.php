<?php
Namespace Controller;

class App {
    public function get_hello($f3){
        \View\Template::render("index.html", null);
    }

    public function get_do_setup($f3){
        header("Content-type: text/plain");

        echo "Starting to setup databases table...\n";
        $this->setup_db();
        echo "Table setup finished...\n";

        if(isset($f3->GET['condition']) && $f3->GET['condition'] == "FTIS"){
            echo "Proceeding with FTIS natural environtment...";
            $this->setup_ftis();
            echo "Done.\n";
        }
    }

    private function setup_db() {
        \Model\Kelas::setup();
        \Model\Ruangan::setup();
        \Model\Jadwal::setup();
    }

    private function setup_ftis() {
        array_map(function($data){
            $ruangan = new \Model\Ruangan();
            $ruangan->copyfrom($data);
            $ruangan->save();
        }, [
            [
                "ruangan_name"=>"91018",
                "ruangan_label"=>"Lab 1"
            ],
            [
                "ruangan_name"=>"91017",
                "ruangan_label"=>"Lab 2"
            ],
            [
                "ruangan_name"=>"91015",
                "ruangan_label"=>"Lab 3"
            ],
            [
                "ruangan_name"=>"91016",
                "ruangan_label"=>"Lab 4"
            ],
        ]);
    }
}