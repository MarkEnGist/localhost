<?php
function my_autoload($classname)
{
    require_once(__DIR__ . "\\$classname.php");
}

spl_autoload_register('my_autoload');
?>