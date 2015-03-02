<?php
include_once("Parser.php");

$parser = new Parser();
$parser->openFile("data.txt");
$parser->doParse();
$parser->closeFile();
?>