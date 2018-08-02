<?php

abstract class Page
{
    protected $title;
    protected $content;

    public function __construct($title = '', $content = '')
    {
        $this->title = $title;
        $this->content = $content;
    }

    // Получение заголовка страницы
    public function title()
    {
        return $this->title;
    }

    // Получение контента страницы
    public function content()
    {
        return $this->content;
    }

    // Формирование HTML-страницы
    public function render()
    {
        echo "<h1>" . htmlspecialchars($this->title()) . "</h1>";
        echo "<div>" . nl2br(htmlspecialchars($this->content())) . "</div>";
    }
}

?>