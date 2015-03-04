<?php
include_once("lib/autoload.php");

use app\classes\Parser as Parser;

$parser = new Parser();
$parser->openFile("files/data.txt");
$parser->doParse();
$parser->closeFile();