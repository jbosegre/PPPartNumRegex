<?php

$parts = array("AP-12-3507", "ap-99-X109", "SG-05-ab20", "ab-22-N250",
    "SG-xx-N250", "SG-22-250", "SG-22-250*");

// Validation without Regex
function validPart($str)
{
    $isValid = true;

    $input = trim($str);
    $input = str_replace("-", "", $input);

    $category = array("HW", "SG", "AP", "hw", "sg", "ap");
    $inputCategory = substr($input, 0, 2);
    if (!in_array($inputCategory, $category)) {
        $isValid = false;
    }

    $inputWarehouse = substr($input, 2, 2);
    if (!is_numeric($inputWarehouse)) {
        $isValid = false;
    }

    $inputPart = str_split(substr($input, 4, 4));
    if (count($inputPart) != 4) {
        $isValid = false;
    }

    $specialCharacters = str_split("~!@#$%^&*()-=+[]{};':,.<>/?\|");
    foreach ($inputPart as $char) {
        if (in_array($char, $specialCharacters)) {
            $isValid = false;
        }
    }

    return $isValid;
}

echo "<p>WITHOUT Regex</p>";
foreach ($parts as $item) {
    if (validPart($item))
        echo "$item is valid<br />";
    else
        echo "$item is not valid<br />";
}

// Validation with Regex
function validPartRx($str)
{
    $regexp = '/^[(HW)(SG)(AP)]+-\d{2}-\w{4}$/im';
    return preg_match($regexp, $str);
}

echo "<br>";

echo "<p>WITH Regex</p>";
foreach ($parts as $item) {
    if (validPartRx($item))
        echo "$item is valid<br />";
    else
        echo "$item is not valid<br />";
}