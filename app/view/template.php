<?php
namespace View;

class Template {
    public static function render($page_location, $page_title = "Untitled Document", $site_name="lagi-kelas.ga") {
        if(!$page_title){
            $page_title = $site_name;
        } else {
            $page_title .= " | $site_name";
        }
        
        \F3::mset([
            "page.title"   => $page_title,
            "page.location" => $page_location
        ]);
        echo \Template::instance()->render("layout.html");
    }
}