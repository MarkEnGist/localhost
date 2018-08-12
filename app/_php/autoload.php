<?php
/**
 * @param string $classname
 */
function my_autoload(string $classname)
{
    require_once(__DIR__ . "\\$classname.php");
}

spl_autoload_register('my_autoload');
?>