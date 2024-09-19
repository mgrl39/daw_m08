# Testing Python Selenium Soup
Esto es un poco de Web Scrapping usando bs4 y Selenium. La referencia de esto viene de la siguiente pagina: 
- https://medium.com/@udofiaetietop/webscrapping-beautifulsoup-or-selenium-3467edb3c0d9
- https://selenium-python.readthedocs.io/index.html
- https://codigofacilito.com/articulos/entornos-virtuales-python

Primero de todo, montaremos un entorno virtual. Pero... porque?

---
**NOTE**

Al instalar las dependencias a nivel sistema, tendremos acceso a estas librerías (dependencias) en cualquier parte de nuestro sistema operativo. Ya sea en documentos, descargar, imágenes etc…

Esto puede sonar como una muy buena idea, pero la realidad es que no lo es. Esto ya que, en teoría, todos los proyectos son diferentes. Cada proyecto tiene su propio stack de dependencias y de versiones que debe usar para poder funcionar.

---


Descargamos lo necesario para el entorno. 
```shell
sudo apt install python3-venv -y
```
Creamos el entorno, la carpeta se llamara **ws**. 
```shell
python3 -m venv ws
```
```shell
cd ws
```
Si escribimos `ls` es posible que salgan: 
`bin` `include` `lib` `lib64` `pyvenv.cfg`

```shell
source bin/activate
```
```python3
pip3 install -U selenium
```
Usare vim para la escritura en archivos, podeis usar el editor de texto que mas os guste. Es UP to vosotros.
```shell
sudo apt install vim -y
```
Instalamos tanto **requests** como **bs4** para hacer el web scrapping.
```shell
pip3 install requests
```
```shell
pip3 install beautifulsoup4 && pip3 install bs4
```
Creamos el siguiente archivo: `soup.py` con el siguiente contenido:
En mi caso con `vim soup.py`, aunque se puede usar otro editor como nano, Emacs, vscode...
```shell
vim soup.py
```
```python3
import requests
from bs4 import BeautifulSoup


cnn_url = "https://www.cnn.com/"

def scrape_with_beautiful_soup(url):
    response = requests.get(url)
    soup = BeautifulSoup(response.text, 'html.parser')

    #Extract and print headlines
    headlines = soup.select('span')
    for headline in headlines:
        print(headline.text)

#Scrape headlines using Beautiful Soup

scrape_with_beautiful_soup(cnn_url)
```
Guardamos el archivo y ejecutamos el siguiente comando:
```shell
python3 soup.py
```
Al ejecutar, aparece todos los textos dentro de los spans. Lo que hemos hecho es importar requests para hacer un get del enlace que queremos, en este caso de `www.cnn.com` y con soup hemos selecccionado los `spans`. Usando un bucle se imprime por pantalla.

BeautifulSoup es mas rapido que selenium. Lo malo de Beautiful Soup es que lo que le llega del HTML lo toma y ya, pues pa' alante, es decir, no ejecuta JavaSript. Se utiliza BeautifulSoup ya que es mas rapido que Selenium, y la curva de aprendizaje de Selenium es mucho mas grande que la curva de aprendizaje de BeautifulSoup.
