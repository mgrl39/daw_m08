# Tablenator 2
## Enunciado
Ahora en este código PHP debemos meter una función que sea generar una palabra, cualquier palabra con diferentes letras, por ejemplo. 
Una función con el nombre generateWord() y le pasamos el numero de letras que queremos, por ejemplo,  7 letras
`generateWord(7);`
Que genere la palabra, y le metemos en este codigo donde pone DAW2.

**No son palabras con sentido, son randoms.**

## Creacion de la funcion
Metemos un parametro mas en nuestro formulario. Aqui escribiremos la cantidad de letras que queremos.
```html
<label for="letters">Letras:</label><br>
<input type="text" id="letters" name="letters"><br>
```

Creo una variable letters y le doy valor 7, si en el POST no llega un valor, sera el 7, si viene un valor diferente pues sera el otro.
```php
$letters = 7;
if (isset($_POST["letters"])) {
	$letters = $_POST["letters"];
}
```

Vamos a crear una funcion `generate_word`, que le pasaremos un argumento `$num`.
Dentro de la funcion generamos un array, asi que buscamos en Google como hacerlo, nos sale W3Schools y tenemos https://www.w3schools.com/php/php_arrays.asp  y encontramos el siguiente ejemplo `$cars = array("Volvo", "BMW", "Toyota");`

Entonces, vamos a crear una variable `$alphabet` con todo el abecedario.
```php
$alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t","u", "v", "w", "x", "y", "z");
```

De alguna manera, nos interesa sabes cuanto mide nuestro array. Para eso, buscamos en google y encontramos la respuesta en W3School  https://www.w3schools.com/pHP/func_array_sizeof.asp 

Este es el ejemplo de W3Schools:
```php
 <?php
$cars=array("Volvo","BMW","Toyota");
echo sizeof($cars);
?>
```

Por lo tanto, nosotros tendremos lo siguiente
```php
$alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t","u", "v", "w", "x", "y", "z");
$max = sizeof($alphabet) - 1;
```
Se le resta uno ya que los arrays empiezan por 0

Ahora, vamos a crear la palabra que retornaremos.
```php
$word = "";
```

Cuantas letras necesitaremos? Pues las que nos indiquen en el argumento de la funcion.
Asi que, usaremos una variable `$letter` y un bucle hasta `$num`.
Para guardar dentro de `$letter` una letra aleatoria usaremos al funcion **rand**, entre 0 y el maximo (recordemos que al max ya le hemos restando uno).

Como ultimo paso antes de acabar, concatenamos en `$word` cada `$letter` utilizando el `.=`.

Finalmente, devolvemos `$word`.
```php
$letter = "";

	for ($i = 0; $i < $num ; $i++)
	{
		// Pilla una aleatoria del rango valido
		$letter = $alphabet[rand(0, $max)];
		$word .= $letter; // El .= es para concatenar como el += en java.

	}
```
Asi que la funcion queda de esta manera:
```php
function  generate_word($num) {
	$alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t","u", "v", "w", "x", "y", "z");
	$max = sizeof($alphabet) - 1;
	$word = "";
	$letter = "";
	for ($i = 0; $i < $num ; $i++)
	{
		$letter = $alphabet[rand(0, $max)];
		$word .= $letter; // El .= es para concatenar como el += en java.
	}
	return $word;
}
```

## El resultado final
```php
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
```
