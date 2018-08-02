<?php

namespace PHP7\classes {
    // Класс страницы
    class Page
    {
        protected $title;
        protected $content;

        public function __construct($title = '', $content = '')
        {
            $this->title = $title;
            $this->content = $content;
        }

        public function debug()
        {
            echo "<pre>";
            print_r($this);
            echo "</pre>";
        }
    }
}
?>