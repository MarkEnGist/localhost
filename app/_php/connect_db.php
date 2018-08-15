<?php
    /**
     * Created by PhpStorm.
     * User: Матвей
     * Date: 15.08.2018
     * Time: 23:46
     */
    $pdo_connection_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', $pdo_connection_options);
    } catch ( PDOException $e ) {
        echo "Невозможно установить соеднение с базой данных";
    }
?>