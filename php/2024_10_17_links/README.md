# Proyectos

## Enlaces de un solo uso `www.links.local`

A partir de los proyctos php-portfolio y php-routing, tenemos que crear un nuevo repositorio que implemente routing y que tenga acceso a base de datos a partir del DatabaseController.php.

### Página principal
Una página que tenga un botón que sirva para generar enlaces de un solo uso. El formulario se enviará por `POST` y cuando se reciba la llamada la página generará un token de un sólo uso y escribirá el enlace (hash de 32 carácteres) en la web: `www.links.local/abcdefabcdefabcdefabcdefabcdefab`.
Cada vez que se genere un enlace hay que comprobar en la base de datos si existe ese enlace, en caso de que exista generar uno nuevo, y en caso de que no exista guardarlo en la base de datos con 0 usos.

### Base de datos
La base de datos tendrá una sola tabla `Links` que tendrá dos atributos `token` y `usages`.

### Respuesta al acceder a la página con el token
Cuando accedemos a la página con el token que hemos generado `www.links.local/abcdefabcdefabcdefabcdefabcdefab` la página actuará de la siguiente manera:

* Primera visita (1 usage): 👍
* Segunda, tercera y cuarta visita (2,3,4 usages): 🖕
* Quinta vista y succesivas (5 or more usages): ⛔

### LinksController
El controlador de links debe tener al menos las siguientes funciones:

* `getLinks()`: Devuelve todos los links del sistema.
* `getLink($token)`: Devuelve el link que coincide con el `$token` y en caso de no existir devuelve `null`.
* `exist($token)`: Devuelve `true` si el link existe en la Base de Datos, `false` en caso contrario. 
* `generateHash($size)`: Devuelve una hash de tamaño `$size`.
* `numberOfUsages($link)`: Devuelve el número de usos del `$link` o `null` en caso de que el link no exista.
* `addUsage($link)`: Suma 1 a los usages del $link, devuelve `true` si todo ha ido bien, o `false` si se ha producido un error (o el $link no existe).
* `createLink()`: Crea un nuevo link en la base de datos y devuelve la hash creada o `null` en caso de que haya habido algún fallo.
