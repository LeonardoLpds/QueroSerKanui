<?php
    for ($i=1; $i <= 100; $i++) { 
        if ($i%5 == 0) {
            $kanois = "Ka";
        }
        if($i%7 == 0){
            $kanois .= "Nois";
        }
        echo (isset($kanois) ? $kanois : $i)."<br>";
        $kanois = null;
    }
?>