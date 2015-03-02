<?php
    $file = fopen("data.txt", "r");
    $text = "";
    while (!feof ($file)) {
        $text .= fgets($file);
    }
    fclose ($file);

    $exp = array("/[!-@]|\s\s+|\n+|\t+/");
    $text = preg_replace($exp, "", $text);
    $text = strtolower($text);

    $words = explode(" ", $text);
    $words = array_count_values($words);
    arsort($words);

    $sortedWords = [];
    foreach ($words as $key => $value) {
        $sortedWords[$value][] = $key;
        sort($sortedWords[$value]);
    }
    foreach ($sortedWords as $quantity => $arrWords) {
        foreach ($arrWords as $key => $word) {
            echo $word." - ".$quantity."<br>";
        }
    }
?>