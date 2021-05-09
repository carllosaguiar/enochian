<?php



$allArcanesTarot = [
    [
        'name' => 'O Mago',
        'image' => 'imagem do mago'
    ],
    [
        'name' => 'A Sacerdotisa',
        'image' => 'imagem da sacerdotisa'
    ]
];



$firstSynthesis = 1;
$secondSynthesis = 2;

$index = [
    'firstSynthesis' => $firstSynthesis,
    'secondSynthesis' => $secondSynthesis
];



$result = $allArcanesTarot[$index['firstSynthesis']-1]['name'];

if(in_array($firstSynthesis, array_keys($allArcanesTarot)))
{
    echo print_r($allArcanesTarot[1]);
} else
{
    echo "não está!";
}

