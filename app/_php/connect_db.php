<?php
    /**
     * Created by PhpStorm.
     * User: Матвей
     * Date: 15.08.2018
     * Time: 23:46
     */
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    } catch ( PDOException $e ) {
        echo "Невозможно установить соеднение с базой данных";
    }
?>