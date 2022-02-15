<?php

function checkEmpty($value) {
    return !empty($value);
}


function checkLess($value,$min) {
    return (trim(strlen($value)) > $min);
}


function validEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function sanitizeString($string)
{
    $string = trim($string);
    return filter_var($string,FILTER_SANITIZE_STRING);
}

function sanitizeEmail($email)
{
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}