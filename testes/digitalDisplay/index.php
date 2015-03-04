<?php
include_once("lib/autoload.php");

use app\classes\Parser as Parser;

$parser = new Parser();
$parser->openFile("files/data2.txt");
$parser->doParse();
$parser->closeFile();