<?php
require_once "Cached.php";

class StaticPage extends Cached
{
    public function __construct($id)
    {
        if ($this->isCached($this->id($id))) {
            parent::__construct($this->title(), $this->content());
        } else {
            // $query = "SELECT * FROM static_pages WHERE id = :id LIMIT 1";
            // $sth = $dbh->prepare($query);
            // $sth = $dbh->execute($query, [$id]);
            // $page = $sth->fetch(PDO::FETCH_ASSOC);
            // parent::__construct($page['title'], $page['title']);
            parent::__construct("Контакты", "Содержимое страницы Контакты");
        }
    }

    public function id($id)
    {
        return "static_page_{$id}";
    }
}

?>