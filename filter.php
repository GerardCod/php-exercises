<?php

function arrayFilter(array $elements, callable $callback) {
    $newArray = [];

    foreach ($elements as $element) {
        if (callback($element)) {
            array_push($newArray, $element);
        }
    }

    return $newArray;
}

const filterFunction = function(int $element) {
    return $element % 2 == 0;
}

const $elements = array(22, 10, 8, 3, 5, 12, 76, 82, 1);
const $elementsFiltered = arrayFilter($elements, filterFunction);

var_dump($elements);
var_dump($elementsFiltered);