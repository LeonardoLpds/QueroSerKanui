<?php
include_once(__DIR__.'/../app/classes/DiscoverNumber.php');

use app\classes\DiscoverNumber;

class DiscoverNumberTest extends PHPUnit_Framework_TestCase {
    protected $dNumber;

    public function setUp(){
        $this->dNumber = new DiscoverNumber();
    }

    public function testVerifyNumberWithNullDataSholdFail(){
        $number = null;
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));
    }

    public function testVerifyNumberWithEmptyArraySholdFail(){
        $number = array();
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));
    }

    public function testVerifyNumberWithOrdinaryArraySholdFail(){
        $number = array(1, 2, 3);
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));
    }

    public function testVerifyNumberSholdReturnTheNumberInArray(){
        $number = [];
        $number[0] = " _ ";
        $number[1] = "| |";
        $number[2] = "|_|";

        $this->assertEquals("0", $this->dNumber->verifyNumber($number));
    }
}
