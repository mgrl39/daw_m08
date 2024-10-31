<!DOCTYPE html>
<!-- 
https://stackoverflow.com/questions/21594035/how-do-i-multiply-values-in-php 

https://www.w3schools.com/html/html_tables.asp 

https://www.w3schools.com/html/tryit.asp?filename=tryhtml_table3

https://stackoverflow.com/questions/21594035/how-do-i-multiply-values-in-php

https://www.php.net/manual/en/features.commandline.webserver.php

https://emojipedia.org/es/cactus

https://www.javatpoint.com/how-to-create-html-table-with-a-while-loop-in-php
--> 
<html>
<head>
	<link rel="stylesheet" href="style.css"/
</head>
<body>
<form method="post">
<p> X <input type="number" name="x"><br>
<p> Y <input type="number" name="y"><br>
<input type="submit" value="send">
</form>
</body>
<?php
if (isset($_POST['x']) && (isset($_POST['y']))) {
	$num = $_POST['x'];
	$num2 = $_POST['y'];
	echo $num * $num2;

	$i = 0;
	if ($num > 0)
		echo "<table>";
	while ($i < $num2)
	{
		$j = 0;
		echo "<tr>";
		while ($j < $num)
		{
			echo "<td> 🌵 </td>";
			$j++;
		}
		echo "</tr>";
		$i++;
		/*
		if ($i == 0)
		{
			echo "<table align=\"left\" border=\"1\">";
			echo "<tr>";
		}
		echo "<td></td>";
		if ($i < ($num2 - 1))
		{
			echo "</tr>";
		}
		$i++;
		*/
	}
	echo "</table>";
	/*	
	while ($j < $num)
	{
		echo "<tr>";
		echo "<td>a</td>";
		echo "</tr>";
		$j++;
	}
	*/
}
?>
</html>
