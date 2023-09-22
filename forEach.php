<?php

$names=['tom','kevin','cals'];

foreach($names as $name)
{
    echo $name. ",";
}

//For each loop as key and value

foreach($names as $key=>$value)
{
    echo $key . "-" . $value. ", ";
}

$name=[];

if(empty($name))
    echo"Array is Empty"; 