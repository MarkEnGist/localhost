<?php
    /**
     * Created by PhpStorm.
     * User: Матвей
     * Date: 18.08.2018
     * Time: 0:30
     */
    $m = new Memcache();
    $m -> addServer('localhost', 11211, 10);
    $m -> addServer('localhost', 11212, 10);
?>