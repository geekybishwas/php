<?php

function showMessage()
{
    echo "Hello World";
}

showMessage();

//Funtion with parameters
function show($name)
{
    echo "Hello" .$name;
}
show("geeky");


//Funtion with optional arguments
function defaultArg($name='bob')
{
    echo "Hello" .$name;
}
defaultArg("geeky"); //Value given at function call overrides the optional arguments

//Funtion with return
function returnValue($name)
{
    return "Hello" .$name
}
$value=returnValue("geeky");
echo $value;