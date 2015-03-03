<?php
include_once("app/classes/Parser.php");

$parser = new Parser();
$parser->openFile("files/data.txt");
$parser->doParse();
$parser->closeFile();