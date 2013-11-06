<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> lab part 1 </title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		
	</head>
	
<body>
<div class = "border">
<?php
// concat and print name, ucwords

echo "<b>concat and print name with  ucwords</b><br />";
$firstname = 'mike';
$lastname = 'savastano';

$fullname = $firstname . ' ' . $lastname;
echo ucwords($fullname) . "<br />";
?>
</div>

<div class = "border">
<?php
// 3 arrays, multi, associative, and one-dim
echo "<b>arrays</b><br />";

$arr = array("dog", "cat", "horse", "cow", "sheep");

$assocArr = array("1" => "one",  
              "2" => "two", 
              "3" => "three",
              "4" => "four",
			  "5" => "five"
              );
			  
$arrMulti = array(
				array(1,2,3),
				array(4,5,6)
				);
				
print_r("a single number for a multidim array<br />".$arrMulti[0][2]."<br />");

echo "array with keys from a foreach loop<br />";		  

$pushedArr = array();

foreach( $arr as $key => $value ){
	
    echo $key."  =>  ".$value."<br />";
}

echo "<br />associative array with keys from a foreach loop<br />";		

foreach( $assocArr as $key => $value ){
    echo $key."  =>  ".$value."<br />";
}

?>
</div>

<div class = "border">
<?php
// explode function
echo "<b>explode</b><br />";
	$explodey  = "Hello this is to use the explode function";
	$boom = explode(" ", $explodey);
	echo $boom[0]."<br />"; 
	echo $boom[1]."<br />"; 
	echo $boom[2]."<br />"; 
	echo $boom[3]."<br />"; 
	echo $boom[4]."<br />"; 
	echo $boom[5]."<br />"; 
	echo $boom[6]."<br />"; 
	echo $boom[7]."<br />"; 				

?>
</div>
<div class = "border">
<?php
// sha1 function
echo "<b>sha1 and md5</b><br />";
$pass = "password";

$password = sha1($pass);

echo $password."<br />"; 

//md5
$passMd5 = "password";

$passwordMd5 = md5($passMd5);

echo $passwordMd5."<br />";

?>
</div>

<div class = "border">
<?php
//htmlentities
echo "<b>htmlentities</b><br />";
$htemell = "HTML is <b>outputted</b> from a string with htmlentities";

echo htmlentities($htemell);

?>

</div>

<div class = "border">
<?php
//strip_tags
echo "<b>strip_tags</b><br />";
$strip = "HTML tags are <b>stripped</b> with this";
echo strip_tags($strip);
?>

</div>

<div class = "border">
<?php
//trim
echo "<b>trim</b><br />";

$trimIt = "   trim off the whitespace    ";
echo strip_tags($trimIt);
?>
</div>


<div class = "border">
<?php
//strlen
echo "<b>strlen</b><br />";
$leng = "mike savastano";
echo strlen($leng);
?>
</div>

<div class = "border">
<?php
//str_shuffle
echo "<b>str_shuffle</b><br />";
$shuffle = "1234567890";
echo str_shuffle($shuffle);
?>
</div>


<div class = "border">
<?php
//ord
echo "<b>ord</b><br />";
$ords = "S";
echo "The integer value of upper case S is " . ord($ords);
?>
</div>

<div class = "border">
<?php
//array_count_values
echo "<b>array_count_values</b><br />";

$arr1 = array("dog", "cat", "horse", "cow", "sheep", "horse", "cat");
print_r(array_count_values($arr1));
?>
</div>

<div class = "border">
<?php
//array_flip
echo "<b>array_flip</b><br />";

$arr2 = array("dog",  "horse", "cow", "sheep", "cat");
$flipper = array_flip($arr2);

print_r($flipper);
?>
</div>

<div class = "border">
<?php
//array_key_exists
echo "<b>array_key_exists</b><br />";

$arr3 = array("dog" => 1,  "horse" => 2);
echo "if dog is in array print a 1 <br />" . array_key_exists("dog", $arr3);
?>
</div>

<div class = "border">
<?php
//array_map 
echo "<b>array_map</b><br />";

$arr4 = array("dog", "horse");
function addword($word)
{
	return $word." food";
}
$mapped = array_map("addword", $arr4);
print_r($mapped);
?>
</div>

<div class = "border">
<?php
//array_rand
echo "<b>array_rand</b><br />";

$arr5 = array("dog", "horse", "cow", "sheep", "cat");
$keys = array_rand($arr5, 3);
echo $arr5[$keys[2]];
?>
</div>

<div class = "border">
<?php
//array_push
echo "<b>array_push</b><br />";

$arr6 = array("dog", "horse", "cow", "sheep", "cat");
array_push($arr6, "sheep", "chick");
print_r($arr6);
?>
</div>


<div class = "border">
<?php
//in_array
echo "<b>in_array</b><br />";

$arr7 = array("dog", "horse", "cow", "sheep", "cat");
if (in_array( "sheep", $arr7))
{
	echo "'sheep' is in array";
}

?>
</div>

<div class = "border">
<?php
//shuffle
echo "<b>shuffle</b><br />";

$arr8 = array("dog", "horse", "cow", "sheep", "cat");

foreach($arr8 as $list)
{
	echo $list." " ;
}
?>
</div>

<div class = "border">
<?php
//count
echo "<b>count</b><br />";

$arr9 = array("dog", "horse", "cow", "sheep", "cat");

echo(count($arr9));

?>
</div>

<div class = "border">
<?php
//sort
echo "<b>sort</b><br />";

$arr10 = array("dog", "horse", "cow", "sheep", "cat");

sort($arr10);
foreach($arr10 as $list2)
{
	echo $list2." " ;
}

?>
</div>




			


</body>

</html>