<?php
include_once(getcwd().'/app/classes/DiscoverNumber.php');

use app\classes\DiscoverNumber as DiscoverNumber;

class DiscoverNumberTest extends PHPUnit_Framework_TestCase {
    protected $dNumber;

    public function setUp(){
        $this->dNumber = new DiscoverNumber();
    }
}
