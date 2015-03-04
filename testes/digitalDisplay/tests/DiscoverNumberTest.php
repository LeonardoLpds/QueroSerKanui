<?php
include_once(__DIR__.'/../app/classes/DiscoverNumber.php');

use app\classes\DiscoverNumber;

class DiscoverNumberTest extends PHPUnit_Framework_TestCase {
    protected $dNumber;

    public function setUp(){
        $this->dNumber = new DiscoverNumber();
    }

    public function testVerifyNumber(){
        $number = null;
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));

        $number = array();
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));

        $number = array(1, 2, 3);
        $this->assertEquals(false, $this->dNumber->verifyNumber($number));
    }
}
