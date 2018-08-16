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
    <link rel="stylesheet" href="app/_css/libs.min.css">
</head>
<body>
<table>
    <form action="app/_php/addnews.php" method="POST">
        <tr>
            <td>Название:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Содержимое:</td>
            <td><textarea name="content" cols="40" rows="10" style="margin-top: 10px"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Добавить"></td>
        </tr>
    </form>
</table>
</body>
</html>