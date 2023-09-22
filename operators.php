<?php

$price=12;
$quantity=10;

$time='3 o\'clock';

echo $price*$quantity;

var_dump($price*$quantity);

$fn="geeky";
$ln="bishwas";

echo $fn . $ln; //Concatenation of string by . operator

echo "\n";

echo $fn . "bishwas\n";
//or
echo "$fn bishwas\n";


$is_editor=true;

var_dump(! $is_editor and $is_editor);  //Result false

//If operator

$name=[];

if(empty($name))
    echo"Array is Empty"; 
