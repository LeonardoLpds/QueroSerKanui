<?php
include_once(__DIR__.'/../app/classes/Parser.php');

use app\classes\Parser;

class ParserTest extends PHPUnit_Framework_TestCase {
    protected $parser;

    public function setUp(){
        $this->parser = new Parser();
    }

    public function testOpenFileWithNullDataShouldFail(){
        $file = null;
        $this->assertEquals(false, $this->parser->openFile($file));
    }

    public function testOpenFileWithDirectoryShouldFail(){
        $file = __DIR__;
        $this->assertEquals(false, $this->parser->openFile($file));
    }

    public function OpenFileWithAnyFileShouldReturnTrue(){
        $file = __DIR__.'/ParserTest.php';
        $this->assertEquals(true, $this->parser->openFile($file));
    }

    public function testDivideSequencesWithEmptyFileShouldFail(){
        $this->parser->openFile('');
        $this->assertEquals(false, $this->parser->divideSequences());
    }

    public function testDivideSequencesWithNullFileShouldFail(){
        $this->parser->openFile(null);
        $this->assertEquals(false, $this->parser->divideSequences());
    }

    public function testDivideSequencesWithAnyFileShouldReturnTrue(){
        $file = __DIR__.'/ParserTest.php';
        $this->parser->openFile($file);
        $this->assertEquals(true, $this->parser->divideSequences()); //Apenas divide de 4 em 4 linhas
    }

    public function testDivideNumbersInSequenceWithNoParameterShouldFail(){
        $this->assertEquals(false, $this->parser->divideNumbersInSequence());
    }

    public function testDivideNumbersInSequenceWithNoValidParameterShouldFail(){
        $this->assertEquals(false, $this->parser->divideNumbersInSequence(2));
        $this->assertEquals(false, $this->parser->divideNumbersInSequence("test"));

        $this->parser->openFile(__DIR__.'/ParserTest.php');
        $this->parser->divideSequences();
        $this->assertEquals(false, $this->parser->divideNumbersInSequence("noValidParameter"));
    }


    public function testDivideNumbersInSequenceWithValidParameterShouldReturnTrue(){
        $this->parser->openFile(__DIR__.'/ParserTest.php');
        $this->parser->divideSequences();
        $this->assertEquals(true, $this->parser->divideNumbersInSequence(0)); //Apenas faz SubStrings
    }

    public function testMountNumericSequenceWithNoParameterShouldFail(){
        $this->assertEquals(false, $this->parser->mountNumericSequence());
    }

    public function testMountNumericSequenceWithInvalidParameterShouldFail(){
        $this->assertEquals(false, $this->parser->mountNumericSequence(''));
        $this->assertEquals(false, $this->parser->mountNumericSequence('test'));
    }

    public function testMountNumericSequenceWithOrdinaryArrayShouldFail(){
        $sequence = array();
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));

        $sequence = array(1, 2, 3, 4, 5);
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));

        $sequence = array("foo", "bar", "test");
        $this->assertEquals(false, $this->parser->mountNumericSequence($sequence));
    }

    public function testMountNumericSequenceWithValidArrayShouldReturnTrue(){
        $sequence = [];
        $number = [];
        $number[0] = " _ ";
        $number[1] = "| |";
        $number[2] = "|_|";
        $sequence[0] = $number;

        $this->assertEquals('0', $this->parser->mountNumericSequence($sequence));
    }

    public function testDoParseWithoutFileShouldFail(){
        $this->assertEquals(false, $this->parser->doParse());
    }

    public function testDoParseWithEmptyFileShouldFail(){
        $this->parser->openFile('');
        $this->assertEquals(false, $this->parser->doParse());
    }

    public function testDoParseWithAnyFileShouldReturnTrue(){
        $this->parser->openFile(__DIR__.'/ParserTest.php');
        $this->assertEquals(true, $this->parser->doParse()); //Erro de formato apenas
    }

}
