<?php

class FileLogger
{
    public static $f;
    public $name;
    public $lines = [];

    public function __construct($name, $fname)
    {
        $this->name = $name;
        self::$f = fopen($fname, "a+");
    }

    public function log($str)
    {
        $prefix = "[" . date("Y-m-d_h:i:s") . " {$this->name}]";
        $str = preg_replace('/^/m', $prefix, rtrim($str));
        $this->lines[] = $str . "\n";
    }

    public function read()
    {
        while (!feof(self::$f)) {
            $str .= fgets(self::$f, 1000);
        }
        return nl2br($str);
    }

    public function clean()
    {
        ftruncate(self::$f, 0);
    }

    public function __destruct()
    {
        fputs(self::$f, join("", $this->lines));
        fclose(self::$f);
    }
}

?>