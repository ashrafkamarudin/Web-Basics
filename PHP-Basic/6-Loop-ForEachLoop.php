<!--

Learn basic PHP by Ashraf Kamarudin.

Part 6 : Foreach

-->

<?php

// first make an array
$foods = ["cupcake", "pie", "waffle"];

// this is how you do a foreach loop in PHP
// foreach is usually used to loop an array
// foreach loop will loop as many times as there is item in an array
// each data of array in $foods will be passed to $food
foreach ($foods as $food) {
	echo $food; // this will print the item in the array
}