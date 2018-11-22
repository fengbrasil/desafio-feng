<?php

use \Challenger\models\User;

function getUserData() {

    $user = User::getFromSession();
    return $user;

}

function formatTimeStamp($date) {

    $date = explode(' ',$date);
    $date = explode('-',$date[0]);
    $date = $date[2].'/'.$date[1].'/'.$date[0];

    return $date;

}

?>