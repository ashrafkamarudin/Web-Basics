<?php 

// this is a new way you create an array in PHP
$thisIsAnArray[] = ['Ashraf', 'Anzari'];

// this is an old way to create an array in PHP
$thisIsAnArrayOld[] = array('Ashraf', 'Anzari');

// there are 2 ways to print or dump an array in PHP
// for you to see their values

print_r($thisIsAnArray); // 1st

echo "<br>";

var_dump($thisIsAnArrayOld); // 2nd