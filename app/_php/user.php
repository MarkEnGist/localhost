<?php

class user
{
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
        $this->referrer = $_SERVER['PHP_SELF'];
        $this->time = time();
    }

    public function __sleep()
    {
        return ['name', 'referrer', 'time'];
    }

    public function __wakeup()
    {
        $this->time = date("Зарегестрирован d-m-Y в h:i", $this->time);
    }

    private $name;
    private $password;
    private $referrer;
    private $time;
}

?>