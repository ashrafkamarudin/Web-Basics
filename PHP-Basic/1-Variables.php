<!--

Learn basic PHP by Ashraf Kamarudin.

Part 1 : Variables

Variables is a storage location which contains a value

-->

<?php


// this is how you declare a variable in PHP. 
// this also means you assign the string to the variable
$variable = "This is a variable"; // string
$number = 5; // numbers

// you use echo to print out variable value
echo $variable . " " . $number; // this is a way to echo 2 or more variables and add some string

// this will return an undefined error because you haven't declare this variable
echo $thisVariableIsNotDefine;

// you can also declare a variable using a name set by different variables
// this is how you set a variable name with a variable

$variableName = "cup";  // first assign a data to a variable that will later be a variable name
$$variableName = "cake"; // cake will be assigned to a variable name $cup

echo $cup; // this will print cake;
// echo $"cup"; => this will return an unexpected error