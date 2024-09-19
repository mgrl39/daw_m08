# Testing Python Selenium Soup
Esto es un poco de Web Scrapping usando bs4 y Selenium. La referencia de esto viene de la siguiente pagina: 
- https://medium.com/@udofiaetietop/webscrapping-beautifulsoup-or-selenium-3467edb3c0d9
- https://selenium-python.readthedocs.io/index.html

```shell
sudo apt install python3-venv -y
```
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
Instalare **requests**, que es lo que necesito. 
```shell
pip3 install requests
```
```shell
pip3 install beautifulsoup4 && pip3 install bs4
```
Creamos el siguiente archivo: `soup.py` con el siguiente contenido:
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
