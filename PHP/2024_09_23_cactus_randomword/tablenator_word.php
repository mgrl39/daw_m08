<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br>
  <label for="length">Length:</label><br>
  <input type="text" id="length" name="length"><br>
  <input type="submit" value="Enviar">
</form>

<?php
function generateWord($length = 7)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);	
	$randomString = '';

	for ($i = 0 ; $i < $length ; $i++) {
		$randomString .= $characters[random_int(0, $charactersLength - 1)];
	}
	return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["rows"]) && isset($_POST["cols"])) {
                $rows = htmlspecialchars($_POST["rows"]);
                $cols = htmlspecialchars($_POST["cols"]);
		$length = htmlspecialchars($_POST["length"]);
		if ($length > 0 && is_numeric($length))
			$word = generateWord($length);
		else
			$word = generateWord();

                echo '<table border="1">';
                for ($i = 0; $i < $rows; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $cols; $j++) {
				// echo "<td>" . generateWord($length) . "</td>";
                           	echo "<td>" . $word . "</td>";
                        }
                        echo "</tr>";
                }
                echo "</table>";
        }
}
?>
<!-- https://www.php.net/manual/en/function.is-numeric.php -->
<!-- https://stackoverflow.com/questions/4356289/php-random-string-generator -->
<!-- https://eitca.org/web-development/eitc-wd-pmsf-php-and-mysql-fundamentals/php-procedures-and-functions/functions-php-procedures-and-functions/examination-review-functions-php-procedures-and-functions/how-can-we-specify-default-values-for-function-parameters-in-php/ -->
