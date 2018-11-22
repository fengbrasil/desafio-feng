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

function formatPriceToDB($price)
{
    $price = explode(' ',$price);
    $price = str_replace(',','.',$price[1]);

    return (float)$price;
}

function formatPrice($price)
{
    return number_format($price, 2, ',', '.');
}

?>