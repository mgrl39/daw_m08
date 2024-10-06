# Bootstrap y Twig 🌳🍂🐿️
Hoy vamos a **mejorar la template usando Bootstrap pero sin liarla.**

Para llegar a este punto hay que tener tanto Twig como Bootstrap instalados. En pasos anteriores se explica.

## No recursos externos
No queremos los recursos externos, usamos lo que descargamos, por algo hicimos el `composer require twbs/bootstrap`.

```html
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
```
## Modificaciones en el titulo
Primeramente, tenia una barra separadora que era un `hr`, este fue eliminado, lo que hice es crear un `div` y con la clase `border` "simule" la barra que tenia anteriormentente.
Usando `d-flex align-items-center justify-content-center` consegui poner el titulo en medio.
```html
<div class="d-flex align-items-center justify-content-center border">
	<h1 class="text-center">{{ name }}'s info! {{ emoji }}</h1>
</div>
```
## La letra negrita
Ya no uso la etiqueta `<strong>`, utilizo la clase  `fw-bold`. Se puede apreciar justo debajo del titulo, donde pone **Github** y en los elementos de las listas.
```html
<p class="fw-bold">{{ social_network }}: <a href="https://{{ social_link }}" target="_blank">{{ social_link }}</a></p>
```

## Colores
Para conseguir que el `h2` Education fuera de color rojo, utilice la clase `text-danger`. En cambio en el  `h2` Work Experience utilice `text-primary`, y finalmente para conseguir ese amarillo que podemos ver en Learning fue conseguido con `text-warning`.
```html
<h2 class="text-warning">Learning</h2>
```
Para centrar nuestro titulo, meti el `h1` en un `div` 
```html
<div class="d-flex align-items-center justify-content-center border">
	<h1 class="text-center">{{ name }}'s info! {{ emoji }}</h1>
</div>
```

## Las listas
Uno de los cambios que mas destacan es el cambio de las listas. Para conseguir este estilo a la etiqueta `<ul>` se le añadio la clase `list-group` y a cada elemento se le añade `list-group-item list-group-item-action`. El list-group-item es el que les cambia a este nuevo "efecto" y el `list-group-item-action` es el que permite que al pasar el mouse por encima se oscurezca el actual.

Parte del contenido dentro de la lista se encuentra dentro de una etiqueta `span`, asi poder conseguir el mismo estilo de negrita con la clase nombrada anteriormente (`fw-bold`).

La lista de **Work Experience** contiene un valor mas, es el `type=button`, aunque creo que es "raro" que este en una lista, el raton se pone en "modo clic" (cambia el emoji a la mano de arrastrar).

La lista de **Learning** sigue siendo diferente ya que es `class=list-group list-group-numbered`, es decir, es una lista ordenada.
```html
<h2 class="text-danger">Education</h2>
<ul class="list-group">
	{% for edu in education %}
	<li class="list-group-item list-group-item-action">
		<span class="fw-bold">{{ edu.degree }}</span>
		{{ edu.institution }} ({{ edu.year }})
	</li>
	{% endfor %}
</ul>
<h2 class="text-primary">Work Experience</h2>
<ul class="list-group">
	{% for work in work_experience %}
	<li class="list-group-item list-group-item-action" type="button">
		<span class="fw-bold">{{ work.role }}</span>
		({{ work.year }})
	</li>
	{% endfor %}
</ul>
<h2 class="text-warning">Learning</h2>
<ol class="list-group list-group-numbered">
	{% for learn in learning %}
	<li class="list-group-item">
		<span class="fw-bold">{{ learn.language }}</span>
	</li>
	{% endfor %}
</ol>
```
## Alert
Finalmente debajo de las listas podemos encontrar un `<div>` con la clase `Alert`
```html
<div class="alert alert-success text-center" role="alert">
	{{ emoji }} {{ emoji }} {{ emoji }} {{ emoji }} 
</div>
```
## Resultado final
![Result with twig2 and Bootstrap](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_30_twig2_bootstrap2/result.jpeg "Result with twig2 and Bootstrap")
