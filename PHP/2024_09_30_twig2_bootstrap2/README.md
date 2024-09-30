# Bootstrap y Twig 🌳🍂🐿️
Hoy vamos a **mejorar la template usando Bootstrap pero sin liarla.**

Para llegar a este punto hay que tener tanto Twig como Bootstrap instalado. En pasos anteriores se explica.

## Modificaciones en el titulo
Primeramente, tenia una barra separadora que era un `hr`, este fue eliminado, lo que hice es crear un `div` y con la clase `border` "simule" la barra que tenia anteriormentente.
Usando `d-flex align-items-center justify-content-center` consegui poner el titulo en medio.

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
## Resultado final
![Result with twig2 and Bootstrap](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_30_twig2_bootstrap2/result.jpeg "Result with twig2 and Bootstrap")
