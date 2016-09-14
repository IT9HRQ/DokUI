<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$i = trim(strtolower(@$_POST['i']))."";

$f = trim(strtolower(@$_POST['f']))."";

$b = trim(strtolower(@$_POST['b']))."";

$h = md5($i.'-'.$f.'-'.$b);

if (file_get_contents(__DIR__.'/favicon.hex') != $h) {
    
    file_put_contents(__DIR__.'/favicon.hex', $h);
    
    $f = "https://paulferrett.com/fontawesome-favicon/generate.php?icon={$i}&fg=b71c1c";
    
    $ch = curl_init($f);
    $fp = fopen(__DIR__."/favicon.ico", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

echo $h;

