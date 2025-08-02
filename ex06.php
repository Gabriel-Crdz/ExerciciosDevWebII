<?php
echo "ANOS BISSEXTOS DE 1980 A 2024:<br>";

for($i = 1980; $i <= 2024; $i++){
    if(($i % 4) == 0){
        if(($i % 100) == 0){
            if(($i % 400) == 0){
                echo $i . "<br>";
            }
        } 

        else{
            echo $i ."<br>";
        }
    }
}

?>