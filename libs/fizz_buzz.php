<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function fizzBuzz($int=null) {
    if(is_null($int)){
        return '';
     }
    if(is_string($int)){
        return $int;
    }
    if($int ==0){
        return "0";
     }
    if ($int % 15 ==0) {
        return 'FizzBuzz';
    }
    if ($int % 5 == 0) {
        return 'Buzz';
    }
    if ($int % 3 == 0) {
        return 'Fizz';
    }
    return (string) $int;
}
?>
