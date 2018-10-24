<?php

$i = 0; // you need to initialize $i variable first with a value

// this is how you do a while loop in PHP
// do while and while loop is almost the same
// the only difference is do while run the code first and then check for the condition before looping
// but for while loop, it checks the condition first then starts to run the instruction and finally it loop
while ($i <= 10) {
	echo $i++; // this will print the value of $i and increment value of $i by 1
}