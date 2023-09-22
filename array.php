<?php

$articles =['First Post',
    'Second Post',
    'Third Post'
];
//or
// $articles=array();

var_dump($articles);

//Assign manual array indexes

$name=[1=>'bishwas',
        2=>'ram',
        4=>'shiva','tom'
    ];

var_dump($name);

//Assiciative array

$arrays=["first"=>"shiva",
    "second"=>"gita",
    "third"=>"tom"
];

var_dump($arrays["first"]);


//Array of different type
$pirce=3;

$values=[
        "message"=>"Hello World",
        "count"=>150,
        "pi"=>3.14,
        "status"=>true,
        "result"=>null,
        $pirce
    ];

var_dump($values);


//MultiDimensional Array

$people=[
    [
        "name"=>"Bishwas",
        "email"=>"bishwas@gmail.com"
        ],
    [
        "name"=>"geeta",
        "email"=>"geeta@gmail.com"                
        ],
];

echo $people[0]["name"];  //Accees array of index 0 of key name
echo $people[1]["name"];  //Accees array of index 1 of key name