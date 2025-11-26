<?php

function valid_date_depart($date){
    $jour_aujourdhui = date("Y-m-d");
    if($date < $jour_aujourdhui){
        return false;
    }
    return true;
}

function valid_date_arrivee($date_depart, $date_arrivee){
    if($date_arrivee < $date_depart){
        return false;
    }
    return true;
}