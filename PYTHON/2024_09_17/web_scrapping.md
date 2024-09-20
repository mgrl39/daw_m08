# Testing Python Selenium Soup
Esto es un poco de Web Scrapping usando bs4 y Selenium. La referencia de esto viene de la siguiente pagina: 
- https://medium.com/@udofiaetietop/webscrapping-beautifulsoup-or-selenium-3467edb3c0d9
- https://selenium-python.readthedocs.io/index.html
- https://codigofacilito.com/articulos/entornos-virtuales-python

Primero de todo, montaremos un entorno virtual. 

> [!NOTE]  
> Al instalar las dependencias a nivel sistema, tendremos acceso a estas librerías (dependencias) en cualquier parte de nuestro sistema operativo. Ya sea en documentos, descargar, imágenes etc... Esto puede sonar como una muy buena idea, pero la realidad es que no lo es. Esto ya que, en teoría, todos los proyectos son diferentes. Cada proyecto tiene su propio stack de dependencias y de versiones que debe usar para poder funcionar.

## Montar el entorno virtual en Python
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
## Instalar Vim (o cualquier otro editor de texto).
Usare vim para la escritura en archivos, podeis usar el editor de texto que mas os guste. Es UP to vosotros.
```shell
sudo apt install vim -y
```
## Instalacion de las librerias
Vamos a descargar Selenium, para eso, debemos ejecutar la siguiente linea.
```python3
pip3 install -U selenium
```

Instalamos tanto **requests** como **bs4** para hacer el web scrapping.
```shell
pip3 install requests
```

```shell
pip3 install beautifulsoup4 && pip3 install bs4
```

## Usando BeautifulSoup
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

## Web Scrapping con Selenium
Este abrira el Google Chrome, hay que tener el Chrome para que pueda Selenium abrir el navegador correctamente y hacer el scrapping. Tambien, acepta las cookies para poder acceder totalmente a la pagina, y acaba devolviendo el contenido en terminal.

Metemos el siguiente contenido en un archivo, se puede llamar por ejemplo `selen.py` (OJO: no le pongais selenium.py, ya que fallara).
```shell
vim selen.py
```
```python3
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import time

#URL of CNN's homepage
cnn_url = "https://www.cnn.com/"

#Function to scrape headlines using Selenium
def scrape_with_selenium(url):
    options = Options()
    options.headless = False  # Set to True for headless mode
    driver = webdriver.Chrome(options=options)

    #Navigate to the webpage
    driver.get(url)

    #Interact with the webpage using Selenium
    # Example: Click on a button that loads more articles

    cookies_button = driver.find_element(By.ID, 'onetrust-accept-btn-handler')
    cookies_button.click();

    ## no_of_jobs = int(wd.find_element(By.CSS_SELECTOR, 'h1>span'))
    ## load_more_button = driver.find_element_by_css_selector('.load-more-button')
    ## load_more_button = driver.find_element(By.CSS_SELECTOR, '.load-more-button')
    ## load_more_button.click()

    #Allow time for dynamic content to load (you may need to use WebDriverWait for more robust waiting)
    time.sleep(3)

    #Extract and print headlines after loading more content
    ## headlines = driver.find_elements_by_css_selector('.card h3')
    headlines = driver.find_elements(By.TAG_NAME, 'h2')
    for headline in headlines:
        print(headline.text)

    #Close the browser window
    driver.quit()

#Scrape headlines using Selenium
scrape_with_selenium(cnn_url)
```
(Este codigo fue arreglado por Ruben)

Y hasta aqui l ainformacion del Web scrapping, 
