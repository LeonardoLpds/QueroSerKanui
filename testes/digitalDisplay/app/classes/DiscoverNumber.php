<?php
namespace app\classes;

class DiscoverNumber
{
    public function verifyNumber($number)
    {
        if(
            $number[0] == " _ " &&
            $number[1] == "| |" &&
            $number[2] == "|_|"
        ){
            return "0";
        }
        if(
            $number[0] == "   " &&
            $number[1] == "  |" &&
            $number[2] == "  |"
        ){
            return "1";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == " _|" &&
            $number[2] == "|_ "
        ){
            return "2";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == " _|" &&
            $number[2] == " _|"
        ){
            return "3";
        }
        if(
            $number[0] == "   " &&
            $number[1] == "|_|" &&
            $number[2] == "  |"
        ){
            return "4";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == "|_ " &&
            $number[2] == " _|"
        ){
            return "5";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == "|_ " &&
            $number[2] == "|_|"
        ){
            return "6";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == "  |" &&
            $number[2] == "  |"
        ){
            return "7";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == "|_|" &&
            $number[2] == "|_|"
        ){
            return "8";
        }
        if(
            $number[0] == " _ " &&
            $number[1] == "|_|" &&
            $number[2] == " _|"
        ){
            return "9";
        }
        return false;
    }
}