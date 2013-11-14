<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> lab Part 2 </title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		
	</head>
	
<body>
<div class = "border">
<?php
$colors = array("red", "yellow", "blue", "black", "orange", "purple");
$phrases = array("Minds are like parachutes. They only function when they are open", 
				"Do the right thing. It will gratify some people and astonish the rest", 
				"I haven't failed, I've found 10,000 ways that don't work", 
				"The important thing is never to stop questioning", 
				"If you want to make enemies, try to change something");
				
$colorRand = array_rand($colors);
$phraseRand = array_rand($phrases);
echo "Color: " . $colors[$colorRand]. " <br /> Phrase: " . $phrases[$phraseRand];

?>


</div>

<div class = "border">
<?php
function token() {	
		return sha1( uniqid(mt_rand(), true) );
	}

	
	
date_default_timezone_set('EST');
echo '<table border="1">';
	for ($i = 1; $i < 101; $i++ ) {
	
		if ($i % 2 == 0){
		echo "<tr>";
			echo "<td class='tdColor'>";
			echo "<h5> $i </h5>";
			echo date(DATE_RFC2822)."<br />";
			echo token();
			echo "</td>";
		echo "</tr>";
		}else{
		echo "<tr>";
			echo "<td>";
			echo "<h5> $i </h5>";
			echo date(DATE_RFC2822)."<br />";
			echo token();
			echo "</td>";
		echo "</tr>";
		}
	}
	echo '</table>';

?>
</div>







			


</body>

</html>