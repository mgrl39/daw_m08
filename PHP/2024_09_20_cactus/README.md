# Cactus, pero con la clase.
En este capitulo escribire lo que nos explicaron el dia 20/09/2024

## Un poco de PHP
### Variables y impresion
Si hacemos lo siguiente:
```php
$a = "a";
$a = 1;
```
Como podemos ver, no estamos definiendo el tipo, era String, luego int, no salta errores. Porque si le has puesto un uno es que has querido ponerlo, no?
Cuando estemos programando usaremos **print_r($a);** para tener info de lo que estamos haciendo.
Si quisieramos ponerle valor objeto a `$a` podiamos haberlo hecho tambien.

### Reportar errores
Para reportar errores, lo que vamos a usar sera: `error_reporting(E_ALL)`, pero esto en el entorno de desarrollo, **NUNCA EN PRODUCCION**.

## La creacion del ejercicio
De alguna manera, hay que realizar la actividad que yo ya hice el dia anterior. Pero estos apuntes son directamente como la realizo el profesor.

### 1. Programar es como siempre.
Los fors son fors, el while es un while, el if es un if...
Entonces, la logica del ejercicio no deberia ser muy complicada.
### 2. Isset, GET y POST
`isset` es una funcion muy UTIL.
Si vamos a Google, y buscamos, aparece por ejemplo `?q=php` `&otravariable...`.
Es decir, una busqueda por internet se envia por GET.
En cambio, si enviamos por POST **no se modifica la URL**.

Entonces, en una rray podemos almacenar lo que se envia por POST y por GET `isset($_POST['x'])` por ejemplo, y lo mismo con `$_GET`.

### 3. Configuracion minima del entorno 
Para ejecutar PHP necesitamos tener un servidor (server abierto con el comando `php` o server Apache, por ejemplo).
Para abrir un servidor en php en el puerto 5500 y que pueda acceder cualquiera en la red local podemos hacer: `php -S 0.0.0.0:5500 -t .` indicando que `-t .` es el directorio actual. Es decir, si tenemos un archivo `file.php` podemos entrar a la pagina desde `IP_DE_LA_MAQUINA:5500/file.php` o si estamos desde la propia maquina `localhost:5500/file.php`.

Si tenemos el server Apache vamos a `/var/www/html`. El usuario que ejecuta Apache es el usuario `www-data`, y el usuario que escribe en el documento somos nosotros (mi usuario se llama `usuario`). Por lo tanto, para no tener problemas editanndo archivos ahi modifique el propietario de la carpeta, de manera que, el propietario es `usuario` (mi user) y el grupo es `www-data`:
```shell
/var/www/html$ sudo chown -R usuario:www-data .
```

## Empezando a programar
### 1. Formulario
Empezamos a crear el archivo, yo le he puesto `tablenator.php` (ya que es el nombre que le puso Ruben), este archivo, como he dicho anteriormente, podeis tener server abierto en cualquier carpeta con el comando `php -S 0.0.0.0:5500 -t .` o en `/var/www/html`, yo lo tengo en el Apache (es decir, el `/var/www/html`).

Vamos a meter un formulario, buscamos en googel como hacer un formaulario y encuentro esta pagina: https://www.w3schools.com/html/html_forms.asp
Adaptamos el ejemplo a nuestras necesidades:
```html
<form>
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br><br>
  <input type="submit" value="enviar">
</form>
<!-- https://www.w3schools.com/html/html_forms.asp -->
```
Tenemos dos inputs de tipo texto, una para las filas y otra para las columnas.
Y un input tipo submit, que es el boton de enviar. Pero no quiero que se mande la info por GET (no queremos que cambie el enlace), entonces, al form le indicamos que debe ser via `POST` --> `<form method="post">`
```html
<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br><br>
  <input type="submit" value="enviar">
</form>
<!-- https://www.w3schools.com/html/html_forms.asp -->
```

### 2. PHP GET POST
Vale, ahora vamos a meter codigo PHP, buscamos en google **PHP GET POST** y entramos a la pagina de w3Schools de nuevo :)
https://www.w3schools.com/php/php_superglobals_post.asp
Y encontramos este contenido:
```php
<html>
<body>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['fname']);
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>

</body>
</html>
```

Nos llevamos la parte interesante a nuestro codigo, entonces, tenemos **esto** por ahora:
```php
<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br><br>
  <input type="submit" value="enviar">
</form>
<!-- https://www.w3schools.com/html/html_forms.asp -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['fname']);
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>
```
Vamos a borrar cosas que no nos interesan, por ejemplo el if (lo borramos entero). En vez de tener una varibale setteada $name, tendremos dos valores, que para las rows y otra para cols, entonces, tendremos 2 setteadas.
```php
<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br><br>
  <input type="submit" value="enviar">
</form>
<!-- https://www.w3schools.com/html/html_forms.asp -->
```


## Resultado final
```php
<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br>
  <input type="submit" value="Enviar">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["rows"]) && isset($_POST["cols"])) {
                $rows = htmlspecialchars($_POST["rows"]);
                $cols = htmlspecialchars($_POST["cols"]);


                echo '<table border="1">';
                for ($i = 0; $i < $rows; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $cols; $j++) {
                                echo "<td>DAW2</td>";
                        }
                        echo "</tr>";
                }
                echo "</table>";

        }
}
```
