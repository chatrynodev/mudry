<?php

function est_similaire($str1, $str2) {
    if (empty($str1) || empty($str2)) {
        return false;
    }
    if ($str1 === $str2) {
        return true;
    }
    return false;
}