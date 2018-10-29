<!--

Learn basic PHP by Ashraf Kamarudin.

Part 2 : Arrays

Array is a special variable that can hold a collection of data

-->

<?php 


// for example you have a collection of data of user.
// you can store all of them in one single array variable like so
$users = ['Ashraf', 'Kamarudin']; // this one users variable has 2 data in it.
                                  // first one is Ashraf
								  // second is Kamarudin

// in PHP there are 2 way to create array

// this is a new way you create an array in PHP 5.4 and above
$thisIsAnArray[] = ['Ashraf', 'Kamarudin'];

// this is an old way to create an array in PHP
$thisIsAnArrayOld[] = array('Ashraf', 'Kamarudin');

//this is how you call the data in the array
echo $users[0]; // this will echo the 1st data in the array
				// it will print out Ashraf
				// we use 0 because array starts counting at 0


// there are 2 ways to print or dump an array in PHP
// for you to see their values
           								    // as you can see, the data that is being printed out looks like this
print_r($thisIsAnArray); // 1st             // [0] => Ashraf, why is that ?
											// the [0] part in the array is actually called the array key
echo "<br>";								// array key is an index of the array used to point to the array value
											// you can use the array key to print specific data in the array
var_dump($thisIsAnArrayOld); // 2nd			// assign array key for them starting from 0


// you can manually assign the key to your array like so
$users = ['user_one' => 'Ashraf', 'user_two' => 'Kamarudin']; // the key for the 2 data now is user_one and user_two



