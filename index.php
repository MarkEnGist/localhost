<?php
/**
 * Created by PhpStorm.
 * User: Матвей
 * Date: 12.08.2018
 * Time: 23:01
 */

require "app/_php/autoload.php";
ini_set("error_reporting", "E_ALL");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>PHP7</title>
</head>
<body>
<?php

$it = new DirectoryIterator('.');
echo "<pre>";
print_r($it);
echo "</pre>";
$filter = new PHP7\classes\ExtensionFilter($it, 'php');
echo "<pre>";
print_r($filter);
echo "</pre>";
foreach ($filter as $file) {
    echo $file . "<br />";
}

?>
</body>
</html>
