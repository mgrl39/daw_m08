<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br>
  <!-- Metemos un parametro mas -->
  <label for="letters">Letras:</label><br>
  <input type="text" id="letters" name="letters"><br>
  <input type="submit" value="enviar">
</form>
<!-- https://www.w3schools.com/html/html_forms.asp -->


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["rows"]) && isset($_POST["cols"])) {
		$rows = htmlspecialchars($_POST["rows"]);
		$cols = htmlspecialchars($_POST["cols"]);

		$letters = 7;
		if (isset($_POST["letters"])) {
			$letters = $_POST["letters"];
		}
		echo '<table border="1">';
		for ($i = 0; $i < $rows ; $i++)
		{
			echo "<tr>";
			for ($j = 0; $j < $cols ; $j++)
			{
				// En vez de poner DAW2 ponemos la funcion
				// echo "<td>DAW2</td>";
				echo "<td>" . generate_word($letters) . "</td>";
			}
			echo "</tr>";
		}
		echo '</table>';
	}
}

function  generate_word($num) {
	// Definimos el array  https://www.w3schools.com/php/php_arrays.asp
	$alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t","u", "v", "w", "x", "y", "z");

	// Vamos a ver como se utiliza la funcion random de PHP
	// https://www.w3schools.com/pHP/func_math_rand.asp
	// Nos interesaria tambien saber si el array de php tiene una funcion size, en este caso, podemos usar sizeof. Sizeof nos dice cuanto mide el array
	// https://www.w3schools.com/pHP/func_array_sizeof.asp

	// Creamos una variable sizeof en  el alfabeto. Quitamos uno porque los arrays empiezan contando por 0
	$max = sizeof($alphabet) - 1;

	// Vamos a crear la palabra que retornaremos
	$word = "";

	// Cuantas letras necesitare? pues la que nos indiquen en el argumento de la funcion.
	// Asi que usaremos una variable $letter y un bucle for para el $num que nos indiquen
	$letter = "";

	for ($i = 0; $i < $num ; $i++)
	{
		// Pilla una aleatoria del rango valido
		$letter = $alphabet[rand(0, $max)];
		$word .= $letter; // El .= es para concatenar como el += en java.

	}

	// Al final todo vamos a retornar una palabra
	return $word;
}

?>
