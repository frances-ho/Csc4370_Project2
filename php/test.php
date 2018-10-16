<?php

function clean_text($string){
    $string = trim($string); //Remove white space from left and right of string
    $string = stripslashes($string); //Remove back slashes from string
    $string = htmlspecialchars($string); //Convert special chars into HTML entities
    return $string;
}

$file = file('credentials.csv');

$csv[] = '';
foreach($file as $k){
    $csv[] = explode(',',$k);
}
$count = count($file);

$name = 'testuser';
$password = 'Testpassword1';
for($i = 1; $i <= $count;$i++){
    for($j = 1; $j <= 1;$j++){
        $y = clean_text($csv[$i][$j]);
        $x = clean_text($csv[$i][$j+1]);
        if ($y == $name && $x == $password){
            echo "true";
        }
        break;
    }
}
