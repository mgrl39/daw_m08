# TWIG 🌳🍂🐿️
## Un poco de introduccion
Twig es un sistema de plantillas, unas librerías que lo que hacen es todo el tema de plantillas, con PHP se pueden hacer directamente sin necesidad de usar nada.

Por ejemplo, para que se entienda facil, tengo todas mis etiquetas de HTML aqui y asi como estamos poniendo el table aqui podriamos tener una "plantilla"
```php
<html>
<table>
   $name
</table>
</html>
```
Pues en `$name` podriamos el valor de la variable.

Cuando estoy montando el HTML, en el momento de escribrlo, puedo tener etiquetas y, a parte, el valor de las variables. PHP tiene esa posibilidad. Si yo quisiera poner por ejemplo:
```php
<?php

$saludo = “Holakease”;
$usuario = “rusben”;

<p>
<?php echo $saludo ?>
</p>
```
Yo puedo usar PHP en trocitos. Podriamos tener codigo PHP, luego HTML, luego PHP, luego HTML, de esta manera, tendriamos una plantilla, cutre, pero una plantilla. Igualmente, no lo haremos asi…

Claro, realmente los valores de las variables `$usuario` y `$saludo` las cogeriamos de un servidor, cargariamos esas variables, y luego pasaria por la plantilla.
Las cogeria de funciones como `get_username`... `get_saludo`... creadas por nosotros, no asi escritos de manera explicita.

## Instalacion de Twig
Vamos a instalar Twig. Symfony (un framework) usa Twig. https://twig.symfony.com/


Podemos instalar Twig con el **composer** (un gestor de librerias), composer esta bien porque instala librerias de PHP, entonces instalaremos composer:
```bash
sudo apt install composer -y
```

Ahora ejecutaremos el comando que te dice en la pagina. Pero esto lo haremos dependiendo de donde abrimos nuestro servidor, si es un Apache lo hacemos dentro de `/var/www/html`. Si abrimos servidor con el comando `php -S 0.0.0.0:5500 -t .` no hara falta estar cambiando permisos.
```bash
composer require "twig/twig:^3.0"
```
Eso creara un `composer.json`, `composer.lock` y una carpeta `vendor` con mas cosas dentro (`autoload.php`, y las carpetas **composer**, **symfony** y **twig**)

Si estamos usando Apache, en la carpeta de `/var/www/html` debemos ejecutar para que los archivos sean de mi usuario `usuario` y que el grupo sea `www-data` (el que usa el servidor Apache).
```bash
sudo chown -R usuario:www-data .
```
## Primer Twig Test
Bien, ahora crearemos el archivo `twig_test.php`
```bash
touch twig_test.php
```

```php
<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\ArrayLoader([
	'index' => 'Hello {{ name }}!',
]);
$twig = new \Twig\Environment($loader);

echo $twig->render('index', ['name' => 'Fabien']);
?>
```
Lo mismo de antes, si es con Apache tenemos que volver a cambiar permisos `sudo chown -R usuario:www-data .`, si esta abierto con el comando `php -S 0.0.0.0:5500 -t .` no hace falta.

Entonces, si entramos a la pagina:
- `localhost:5500/twig_test.php` con el comando `php -S 0.0.0.0:5500 -t .`
- `localhost/twig_test.php` con PHP.

(en vez de localhost podemos indicar la IP de la maquina directamente)

Entonces, veremos una pagina que literalmente pone:
```html
Hello Fabien!
```

## Segundo Twig Test
Creamos una carpeta `templates` y una carpeta `cache`. Una carpeta para las plantillas y otra para el cache. 
```bash
mkdir templates cache
```
Dentro de templates crearemos un archivo `index.html`
```bash
touch templates/index.html
```
Con el editor que querais vamos a modificar el `index.html`, yo con el propio `vim`.
```bash
vim templates/index.html
```
Meteremos el siguiente contenido
```html
<h1>Hello {{ name }}!</h1>
```

Ahora, modificaremos el `twig_test.php`
```bash
vim twig_test.php
```
```php
<?php
require_once "vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
	'cache' => 'cache',
]);

echo $twig->render('index.html', ['name' => 'Fabien']);
?>
```

Lo mismo de antes, si es con Apache tenemos que volver a cambiar permisos `sudo chown -R usuario:www-data .`, si esta abierto con el comando `php -S 0.0.0.0:5500 -t .` no hace falta.

Entonces, si entramos a la pagina:
- `localhost:5500/twig_test.php` con el comando `php -S 0.0.0.0:5500 -t .`
- `localhost/twig_test.php` con Apache2.

(Recuerdo de nuevo, en vez de localhost podemos indicar la IP de la maquina directamente)

Lo que podemos ver
```bash
Hello Fabien!
```
