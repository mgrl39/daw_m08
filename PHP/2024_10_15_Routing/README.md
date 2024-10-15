# Routing
### Instalacion del Entorno
Si no tenemos configurado el entorno, podemos instalarlo asi. 
```bash
sudo apt update && sudo apt install apache2 -y && sudo ufw app list && sudo ufw enable && sudo ufw status && sudo ufw allow in "Apache" && sudo apt install mysql-server -y && sudo apt install php libapache2-mod-php php-mysql -y && sudo echo "<?php echo phpinfo();" >> /var/www/html/index.php
```
Haria falta configurar MySQL si quisieramos usar base de datos. En `activation` podemos ver como se hizo. Pero para routing no es necesario.
## Configuracion del `/var/www/routing.local`
### Creamos la carpeta `routing.local`
```bash
sudo su
```
```bash
cd /var/www
```
```bash
mkdir routing.local
```
### Creamos la carpeta `public`
```bash
cd routing.local
```
```bash
mkdir public
```
### Creamos el archivo `.htaccess`
```bash
touch .htaccess
```
Metemos el siguiente contenido dentro de `.htaccess`
```bash
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php
```
### Creamos el `index.php`
```bash
touch index.php
```
Metemos el siguiente contenido dentro de `index.php`
```php
<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;
	case '/users':
		require __DIR__ . $viewDir . 'users.php';
		break;
    case '/views/users':
        require __DIR__ . $viewDir . 'users.php';
        break;

    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
```
### Creamos la carpeta `views`
```bash
mkdir views && cd views
```
### Creamos 4 archivos dentro de `views`
```bash
echo -e "<h1>404</h1>\n<p>You've reached the end of Internet.</p>" > 404.php
echo -e "<h1>Contact us</h1>\n<p>Getting in touch is easy. Just email us</p>" > contact.php
echo -e "<h1>Home</h1>\n<p>Welcome in my app.</p>" > home.php
echo -e "<h1>Users</h1>\n<p>List of our users.</p>" > users.php
```
### Revisamos los permisos de `/var/www/routing.local`
```bash
cd /var/www/routing.local
```
```bash
sudo chown -R usuario:www-data .
```

## Configuracion en `sites-available`
```bash
cd /etc/apache2/sites-available
```
```bash
echo -e '<VirtualHost *:80>\n    ServerAdmin admin@routing.local\n    ServerName www.routing.local\n    ServerAlias routing.local\n    DocumentRoot /var/www/routing.local/public\n    ErrorLog ${APACHE_LOG_DIR}/error.log\n    CustomLog ${APACHE_LOG_DIR}/access.log combined\n    <Directory /var/www/routing.local/public>\n        AllowOverride All\n    </Directory>\n</VirtualHost>' > routing.local.conf
```
```bash
sudo a2ensite routing.local.conf && sudo systemctl reload apache2
```
## Configuracion en `/etc/hosts`
```bash
echo -e "127.0.0.1\twww.routing.local" | sudo tee -a /etc/hosts
```
## Permitir el modulo `rewrite`
```bash
sudo a2enmod rewrite && sudo systemctl reload apache2
```
