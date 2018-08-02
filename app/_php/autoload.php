<?php
function __autoload($classname)
{
    require_once(__DIR__ . "\\$classname.php");
}

?>