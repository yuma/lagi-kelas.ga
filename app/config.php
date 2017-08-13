<?php

    // Config Loader
    \F3::instance()->config("app/config/config.ini");

    //database loader
    \F3::set('DB', new \DB\SQL(F3::get('database.dsn'),
        F3::get('database.username'),
        F3::get('database.password'),
        array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))
    );