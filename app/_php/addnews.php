<?php
    /**
     * Created by PhpStorm.
     * User: Матвей
     * Date: 16.08.2018
     * Time: 1:35
     */
    require_once "connect_db.php";

    try {
        if (empty($_POST[ 'name' ])) exit("Не заплонено поле \"Название\"");
        if (empty($_POST[ 'content' ])) exit("Не заплонено поле \"Содержимое\"");

        $query = "INSERT INTO news VALUES(NULL, :name, NOW())";
        $news = $pdo -> prepare($query);
        $news -> execute([ 'name' => $_POST[ 'name' ] ]);

        $news_id = $pdo -> lastInsertId();

        $query = "INSERT INTO news_contents values (null, :content, :news_id)";
        $news = $pdo -> prepare($query);
        $news -> execute(
            [
                'content' => $_POST[ 'content' ],
                'news_id' => $news_id
            ]
        );

        header("Location: ../../index.php");
    } catch ( PDOException $e ) {
        echo "Ошибка выполнения запроса: " . $e -> getMessage();
    }
?>