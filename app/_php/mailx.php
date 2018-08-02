<?php
/*
	* Функция отправляет письмо, заданное в параметре $mail
*/
function mailx($mail)
{
    list($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);

    //	выделяем заголовок To:
    $to = "";
    if (preg_match('/^To:\s*([^\r\n]*)[\r\n]*/m', $head, $p)) {
        $to = @$p[1];
        $head = str_replace($p[0], "", $head);
    }

    //	Выделяем заголовок Subject:
    $subject = "";
    if (preg_match('/^Subject:\s*([^\r\n]*)[\r\n]*/m', $head, $p)) {
        $subject = @$p[1];
        $head = str_replace($p[0], "", $head);
    }

    mail($to, $subject, $body, trim($head));
}

?>