# tablenator_word.php
Esta es la version hecha el 23/09/2024.

El maestro Ruben solicito que hicieramos un UPDATE a este [archivo](../2024_09_20_tablenator/tablenator.php).

Ahora en este código PHP debemos meter una función que sea generar una palabra, cualquier palabra con diferentes letras, por ejemplo. 
Una función con el nombre generateWord() y le pasamos el numero de letras que queremos, por ejemplo,  7 letras
`generateWord(7);`
Que genere la palabra, y le metemos en este codigo donde pone DAW2.

**No son palabras con sentido, son randoms.**

---
Recordemos que el archivo [file.php](../2024_09_19_cactus/file.php) fue mi implementacion, y al dia siguiente Ruben hizo su propia implementacion [tablenator.php](../2024_09_20_tablenator/tablenator.php). Entonces, le he realizado una mejora con lo que el Maestro solicito.

## Funcion generateWord
Esta es la funcion que utilizo para poder generar palabras aleatorias. Estas "palabras" son caracteres aleatorios que se van concatenando en un String.

En la variable `$characters` tenemos todos los caracteres, numeros, letras (minusculas y mayusculas).

Creo otra variable `$charactersLength` para guardar la longitud del String `$characters`, para saber la longitud siempre (imaginate que quiero meter el caracter `ñ` o algo asi) puees si fuera un numero deberia estar contando caracter a caracter. Pero usando `strlen` guarda la cuenta.

Finalmente, creo un `randomString` con `''`.

Finalmente, hago un bucle con un for y usando `.=` concateno cada caracter, pero cada caracter aleatorio usando **random_int** de 0 a `$charactersLength - 1`.

Finalmente, devuelvo el `randomString`.
```php
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
```
En el for en vez de tener la palabra "DAW" vamos a meter nuestra funcion. 

Metemos en el form lo siguiente:
```html
<label for="length">Length:</label><br>
<input type="text" id="length" name="length"><br>
```

Y en la parte de PHP lo siguiente:
```php
$length = htmlspecialchars($_POST["length"]);
if ($length > 0 && is_numeric($length))
	$word = generateWord($length);
else
	$word = generateWord();
```

Finalmente, en la parte dentro del for tendremos esto en vez de "DAW"
```html
echo "<td>" . $word . "</td>";
```
Si no le paso argumentos a la funcion, el parametro por defecto sera `7`, es por eso el `$length = 7`.

---
Las 3 paginas que necesite para la mejora de este proyecto fueron:
- https://www.php.net/manual/en/function.is-numeric.php
- https://stackoverflow.com/questions/4356289/php-random-string-generator
- https://eitca.org/web-development/eitc-wd-pmsf-php-and-mysql-fundamentals/php-procedures-and-functions/functions-php-procedures-and-functions/examination-review-functions-php-procedures-and-functions/how-can-we-specify-default-values-for-function-parameters-in-php/
