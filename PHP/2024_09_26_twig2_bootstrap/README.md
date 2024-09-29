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
En mi caso aparecio este texto despues de ejecutar el comando
```bash
Using version ^5.3 for twbs/bootstrap
./composer.json has been updated
Running composer update twbs/bootstrap
Loading composer repositories with package information
Updating dependencies
Lock file operations: 1 install, 0 updates, 0 removals
  - Locking twbs/bootstrap (v5.3.3)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Downloading twbs/bootstrap (v5.3.3)
  - Installing twbs/bootstrap (v5.3.3): Extracting archive
Generating autoload files
5 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
```

## Modificacion de nuestra Template
Despues de haber instalado **Bootstrap**, entramos dentro de nuestra template (en mi caso `/var/www/html/templates/index.html`) y metemos en el apartado `head`
```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
```
Solo con esto ya tenemos Bootstrap en una template, el siguiente capitulo sera mejorar la template que tenemos usando bootstrap, **pero sin liarla**.

Finalmente, las paginas que se han utilizado para esto:
https://getbootstrap.com/docs/5.0/getting-started/introduction/
https://getbootstrap.com/
https://themes.getbootstrap.com/
