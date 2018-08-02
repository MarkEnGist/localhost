<?php
require_once "Page.php";

abstract class Cached extends Page
{
    protected $expires;
    protected $store;

    public function __construct($title = '', $content = '', $expires = 0)
    {
        parent::__construct($title, $content);

        $this->expires = $expires;

        // $this->store = new Memcached();
        // $this->store->addserver('localhost', 11211);

        $this->set($this->id('title'), $title);
        $this->set($this->id('content'), $content);

    }

    protected function isCached($key)
    {
        // return (bool) $this->store->get($key);
    }

    protected function set($key, $value, $force = false)
    {
        // if ($force) {
        // 	$this->store->set($key, $value, $this->expires);
        // } else {
        // 	if ($this->isCached($key)) {
        // 		$this->store->set($key, $value, $this->expires);
        // 	}
        // }
    }


    protected function get($key)
    {
        // return $this->store->get->get($key);
    }

    public function id($name)
    {
        die("Не определен метод id");
    }

    public function title()
    {
        // if ($this->isCached($this->id('title'))) {
        // 	return $this->get($this->id('title'));
        // } else {
        return parent::title();
        // }
    }

    public function content()
    {
        // if ($this->isCached($this->id('content'))) {
        // 	return $this->get($this->id('content'));
        // } else {
        return parent::content();
        // }
    }
}

?>