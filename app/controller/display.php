<?php
namespace Controller;
class Display {
    public function get_tv($f3){
        \View\Template::render("page-pengumuman-tv.html", "Pengumuman TV");
    }
}