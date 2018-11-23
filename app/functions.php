<?php

use \Challenger\models\User;
use \Challenger\models\Request;

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

function getRqtTotal($idrequest)
{
    $request = Request::get((int)$idrequest);

    $subtotal = [];

    foreach ($request as $key => $value) {
        array_push($subtotal,($value['vlprice'] * $value['nrqtd']));
    }

    $total = array_sum($subtotal);

    return formatPrice($total);
}

function formatRequestId($id)
{
    return '#'.str_pad($id, 3, '0', STR_PAD_LEFT);
}

?>