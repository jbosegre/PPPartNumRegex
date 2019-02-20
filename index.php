<?php
/**
 * Created by PhpStorm.
 * User: humme_000
 * Date: 2/20/2019
 * Time: 11:22 AM
 */

function validPart($str)
{
    $input = trim($str);
    $input = explode("-", $input);
    $category = array("HW", "SG", "AP", "hw", "sg", "ap");
    $houseCategory = substr($str, 0,2);
    if(!in_array($houseCategory, $category)){
        echo "False";
    }
}

$parts = array("AP-12-3507", "ap-99-X109", "SG-05-ab20", "ab-22-N250",
    "SG-xx-N250", "SG-22-250", "SG-22-250*");
foreach($parts as $item)
{
    if (validPart($item))
        echo "$item is valid<br />";
    else
        echo "$item is not valid<br />";
}

/*
function validPartRx($str)
{
    $regexp = '/^[(HW)(SG)(AP)]+-\d{2}-\w{4}$/im';
    return preg_match($regexp, $str);
}

foreach($parts as $item)
{
    if (validPartRx($item))
        echo "$item is valid<br />";
    else
        echo "$item is not valid<br />";
}
