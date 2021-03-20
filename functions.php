<?php 

function getNumMatches($word = '', $words = array()) {
    $length = 0;
    foreach($words as $_word) {
        if($_word == $word) {
            $length += 1; 
        }
    }
    return $length;
}

// echo getNumMatches('ahmad', ['ahmad', 'bashir', 'ahmad']);

function getPriceWithDiscount($price) {

    if($price < 1000) {
        $dis = $price * 10 / 100;
        return $price - $dis;
    }

    if($price >= 1000) { 
        $dis = $price * 5 / 100;
        return $price - $dis;
    }
}

// echo getPriceWithDiscount('500');
// echo getPriceWithDiscount('2000');
