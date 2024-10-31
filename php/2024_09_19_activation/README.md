# Configuracion del entorno
## Configuracion Apache2
```bash
sudo apt update
```
![Imagen 001](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_001.png)
```bash
sudo apt install apache2 -y
```
![Imagen 002](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_002.png)
```bash
sudo ufw app list
```
```bash
sudo ufw enable && sudo ufw status
```
```bash
sudo ufw allow in "Apache"
```
```bash
sudo ufw allow
```
## Instalar MySQL Server
![Imagen 003](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_003.png)
```bash
sudo apt install mysql-server -y
```
![Imagen 004](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_004.png)
```bash
sudo systemctl status mysql
```
![Imagen 005](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_005.png)
```bash
sudo mysql_secure_installation
```
Las respuestas son las siguientes, `n`, `y`, `n`, `n`, `y`.

```bash
VALIDATE PASSWORD component? n
Remove anonymous users? y
Disallow root login remotely? n
Remove test database and access to it? n
Reload privilege tables now? y
```
![Imagen 006](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_006.png)
![Imagen 007](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_007.png)
![Imagen 008](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_008.png)
![Imagen 009](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_009.png)
![Imagen 010](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_010.png)
## Instalar PHP
```bash
sudo apt install php libapache2-mod-php php-mysql -y
```
![Imagen 011](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_011.png)
```bash
sudo su
```
```bash
echo "<?php echo phpinfo();" >> /var/www/html/index.php
```
```bash
cat /var/www/html/index.php
```
![Imagen 012](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_012.png)

## Resultado final
Abrimos la pagina localhost/index.php y saldra la siguiente pagina.
![Imagen 013](https://raw.githubusercontent.com/mgrl39/DAW_M08/refs/heads/main/PHP/2024_09_19_activation/img/img_013.png)
