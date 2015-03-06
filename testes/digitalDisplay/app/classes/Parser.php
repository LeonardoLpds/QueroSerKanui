<?php
namespace app\classes;
include_once(__DIR__.'/DiscoverNumber.php');

class Parser extends DiscoverNumber
{
    private $file;
    private $sequence;

    public function openFile($fileName)
    {
        if (!file_exists($fileName) || !is_file($fileName) || empty($fileName)) {
            return false;
        }
        if (isset($this->file)) {
            $this->closeFile();
        }
        $this->file = fopen($fileName, "r");
        return true;
    }

    public function closeFile()
    {
        if(!isset($this->file)){
            return false;
        }
        fclose($this->file);
        $this->file = null;
        return true;
    }

    public function divideSequences()
    {
        if (!isset($this->file)) {
            return false;
        }
        $countSequence = 0;
        while (!feof($this->file)){
            for ($i=0; $i < 4; $i++) { 
                $this->sequence[$countSequence][$i] = fgets($this->file);
            }
            $countSequence++;
        }
        return true;
    }

    public function divideNumbersInSequence($numOfSequence = null)
    {
        if (!isset($this->sequence[$numOfSequence])) {
            return false;
        }
        $startSubStr = 0;
        for ($i=0; $i < 9; $i++) { 
            for ($j=0; $j < 4; $j++) { 
                $digito[$i][$j] = substr($this->sequence[$numOfSequence][$j], $startSubStr, 3);
            }
            $startSubStr += 3;
        }
        $this->sequence[$numOfSequence] = $digito;
        return true;
    }

    public function mountNumericSequence($sequence = null)
    {
        if (!is_array($sequence)) {
            return false;
        }
        $numericSequence = "";
        foreach ($sequence as $key => $number) {
            if ($this->verifyNumber($number) === false) {
                return false;
            }
            $numericSequence .= $this->verifyNumber($number);
        }
        return $numericSequence;
    }

    public function doParse()
    {
        if(!isset($this->file)){
            return false;
        }
        $this->divideSequences();
        for ($i=0; $i < count($this->sequence) ; $i++) { 
            $this->divideNumbersInSequence($i);
            $numericSequence = $this->mountNumericSequence($this->sequence[$i]);
            echo ($numericSequence ? $numericSequence : "/!\\erro de formato/!\\")."<br>";
        }
        return true;
    }
}