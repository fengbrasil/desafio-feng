<?php

function toReal($value) {
    return 'R$' . str_replace('.', ',', $value);
}

function substringWholeWords($string, $max = 50, $delimiter = ' ') {
    if(strlen($string) > $max) {
        $sub = substr($string, 0, $max);

        return substr($sub, 0, strrpos($sub, $delimiter)) . ' ...';
    } else {
        return $string;
    }
}