<?php
include_once(getcwd().'/app/classes/Parser.php');

use app\classes\Parser as Parser;

class ParserTest extends PHPUnit_Framework_TestCase {
    protected $parser;

    public function setUp(){
        $this->parser = new Parser();
    }

    public function testOpenFile()
    {
        $file = null;
        $this->assertEquals(false, $this->parser->openFile($file));

        $file = $_SERVER['DOCUMENT_ROOT'];
        $this->assertEquals(false, $this->parser->openFile($file));
    }

    public function testCloseFile(){
        $file = null;
        $this->assertEquals(false, $this->parser->openFile($file));

        $file = "";
        $this->assertEquals(false, $this->parser->openFile($file));
    }

    public function testDivideSequences(){
        $this->parser->openFile('');
        $this->assertEquals(false, $this->parser->divideSequences());

        $this->parser->openFile(null);
        $this->assertEquals(false, $this->parser->divideSequences());

        $this->parser->openFile(getcwd().'/app/classes/Parser.php');
        $this->assertEquals(true, $this->parser->divideSequences()); //Apenas divide de 4 em 4 linhas
    }

    public function testDivideNumbersInSequence()
    {
        $this->assertEquals(false, $this->parser->divideNumbersInSequence());

        $this->assertEquals(false, $this->parser->divideNumbersInSequence(2));

        $this->parser->openFile(getcwd().'/app/classes/Parser.php');
        $this->parser->divideSequences();
        $this->assertEquals(true, $this->parser->divideNumbersInSequence(0)); //Apenas faz SubStrings
    }

    public function testMountNumericSequence(){
        $this->assertEquals(false, $this->parser->mountNumericSequence());

        $this->assertEquals(false, $this->parser->mountNumericSequence(''));

        $sequence = array();
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));

        $sequence = array(1, 2, 3, 4, 5);
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));

        $sequence = array("foo", "bar", "test");
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));
    }

    public function testDoParse(){
        $this->assertEquals(false, $this->parser->doParse());

        $this->parser->openFile(getcwd().'/app/classes/Parser.php');
        $this->assertEquals(true, $this->parser->doParse()); //Erro de formato apenas

        $this->parser->openFile('');
        $this->assertEquals(false, $this->parser->doParse());

    }

}
