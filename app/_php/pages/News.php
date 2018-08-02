<?php
require_once "Cached.php";

class News extends Cached
{
    public function __construct($id)
    {
        if ($this->isCached($this->id())) {
            parent::__construct($this->title(), $this->content());
            // $query = "SELECT * FROM news WHERE id = :id LIMIT 1";
            // $sth = $dbh->prepare($query);
            // $sth = $dbh->execute($query, [$id]);
            // $page = $sth->fetch(PDO::FETCH_ASSOC);
            // parent::__construct($page['title'], $page['title']);
            parent::__construct("Новости", "Содержимое страницы новости");
        }
    }

    public function id($id)
    {
        return "news_{$id}";
    }
}

?>