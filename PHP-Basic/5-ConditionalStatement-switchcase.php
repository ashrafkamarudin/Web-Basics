<!--

Learn basic PHP by Ashraf Kamarudin.

Part 5 : Switch Case

-->

<?php


$test = "success";

// this is how you do switch case in PHP
// the switch case will check if the case have same value with the variable in the switch() bracket.
// the case with same value will be executed
// if no case have same value then defaul block will be executed
switch ($test) {
	case 1: // case with Interger
		echo 1;
		break;

	case "success": // case with string
		echo "success";
		break;
	
	default: // default case will run when no case is true
		echo "fail";
		break;
}