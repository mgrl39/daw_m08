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


Podemos instalar Twig con el **composer** (un gestor de librerias), composer esta bien porque instala librerias de PHP, etntonces instalaremos composer:
```bash
sudo apt install composer -y
```

Ahora ejecutaremos el comando que te dice en la pagina.
```bash
composer require "twig/twig:^3.0"
```
Eso creara un `composer.json`, `composer.lock` y una carpeta `vendor` con mas cosas dentro (`autoload.php`, y las carpetas *composer*, *symfony* y *twig*)
