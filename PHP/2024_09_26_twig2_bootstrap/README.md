# Implementar Bootstrap en Twig

La tarea que había era hacer una plantilla y realizar cualquier tipo de pagina usando variables, por ejemplo hacer un curriculum con info nuestra. Un html de una pagina que nos represente.e
Esto se pueede ver hecho en [Twig 2](2024_09_26_twig2/README.md).
A partir de aqui, vamos a meterle Bootstrap al Twig.

## Que es Bootstrap

Bootstrap es un framework multiplataforma o conjunto de herramientas de código abierto para diseño de sitios y aplicaciones web. 
(Wikipedia).

## Ficheros de error de Apache
En `/etc/apache2` tenemos los ficheros de Apache, los ficheros de error de apache estan en `/var/log/apache2/error.log`. En nuestro caso como como no hemos cambiado nada de la configuracion default, podemos visualizar este archivo para ver los errores (cuando la pantalla se queda en blanco tocando codigo PHP). Es decir, se puede abrir una nueva terminal y usar la siguiente instruccion para ver fallos.
```shell
tail -f /var/log/apache2/error.log
```

## Instalacion de Bootstrap
No es muy complicado instalar bootstrap, vamos a la raiz de nuestro proyecto (en mi caso `/var/www/html`) y ejecutar la siguiente instruccion:
```bash
composer require twbs/bootstrap
```
