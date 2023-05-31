<?php
$expression = "/([А-Я])/m";

$text = file_get_contents("text");

echo $text;

echo preg_replace($expression, "<br/>", $text);

?>                        