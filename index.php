<?php
    /**
     * Created by PhpStorm.
     * User: Матвей
     * Date: 12.08.2018
     * Time: 23:01
     */

    ini_set("error_reporting", "E_ALL");
    require_once "app/_php/autoload.php";
    require_once "app/_php/connect_db.php";

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>PHP7</title>
</head>
<body>
<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    } catch ( PDOException $e ) {
        echo "Невозможно установить соеднение с базой данных";
    }
?>
</body>
</html>