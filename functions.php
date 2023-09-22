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