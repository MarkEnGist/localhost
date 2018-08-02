<?php ## Функция для вывода содержимого переменной.
// Распечатывает дамп переменной на экран.
function dumper($obj)
{
    echo
    "<div class='dumper'><pre class='in_dumper'>",
    dumperGet($obj);
    "</pre></div>\n";
}

// Возвращает строку - дамп значения переменной в древовидной форме
// (если это массив или объект). В переменной $leftSp хранится
// строка с пробелами, которая будет выводиться слева от текста.
function dumperGet(&$obj, $leftSp = "")
{
    if (is_array($obj)) {
        $type = "<span class='dumper_array_name'>Array</span><span class='dumper_square_brackets'>[</span><span class='dumper_numbers'>" . count($obj) . "</span><span class='dumper_square_brackets'>]</span>";
    } elseif (is_object($obj)) {
        $type = "Object";
    } elseif (is_bool($obj)) {
        return $obj ? "true" : "false";
    } else {
        return "<span class='dumper_quotes'>\"</span><span class='dumper_value_text'>$obj</span><span class='dumper_quotes'>\"</span>";
    }
    $buf = $type;
    $leftSp .= "    ";
    foreach ($obj as $k => $v) {
        if ($k === "GLOBALS") continue;
        $buf .= "\n$leftSp$k <span class='dumper_pockets'>=></span> " . dumperGet($v, $leftSp);
    }
    return $buf;
}

?>
