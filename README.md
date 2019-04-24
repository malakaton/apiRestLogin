apiRestLogin
============
<h4>Breve introducción:</h4>

Es una simple api la cual verifica a partir de una lista de usuarios persistida en memoria, si 
dichos usuarios tienen los credenciales correctos, esto quiere decir, que dicha lista de usuarios
debe de tener un atributo username y otro atributo password. Si uno de estos dos atributos no esta
rellenado la api devolvera un error para ese usuario, en caso de que estos dos atributos se encuentren
rellenados y el password sea el correcto para ese usuario, la api devolvera un codigo 200 para ese usuario
y su jwt token correspondiente para dicho usuario


<h4>Instalación:</h4>

Necesario tener un servidor con apache, mysql, redis y php

<ul> 
<li> Descargamos el proyecto de git: git clone https://github.com/malakaton/apiRestLogin.git</li>
<li> Añadimos virtual host para el proyecto:
     cd etc/apache2/sites-available
     
     cp 000-default.conf “api.conf”
     
     Añadir esto al nuevo fichero:
     
     ServerAdmin webmaster@api.com
     
     ServerName apirest.login
     
     ServerAlias www.apirest.login
     
     DocumentRoot /var/www/apiRestLogin
</li>
<li> Aplicamos el nuevo virtualhost:
    sudo a2ensite nombreProyecto.conf
    
    sudo service apache2 restart
</li>
<li> Añadir nuevo virtual host al fichero hosts:
    sudo vim /etc/hosts
    
    127.0.0.1 nombrehost del fichero conf
</li>
<li> Creamos symbolic link en var/www a la ruta donde se encuentre el proyecto apiRestLogin

    sudo ln -s ~/phpProjects/apiRestLogin/web apiRestLogin
</li>
<li> Limpiamos la cache y logs del proyecto de symfony dentro de la carpeta del proyecto
    
    sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
    
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
</li>
<li> Generamos la base de datos (schema) y tablas, hay que estar ubicado en la carpeta del proyecto de symfony

    php app/console doctrine:database:create (si no esta creada la bbdd)
    
    php app/console doctrine:generate:entity
</li>
<li> Aplicamos la generación de la base de datos y tablas

    php app/console doctrine:schema:update –force
</li>  
</ul>

<h4>Como funciona?</h4>
Se puede utilizar el software de Postman para ver el resultado de la llamada de la API o directamente desde
el mismo navegador. Para ello solo hay que acceder a esta url: http://apirest.login/app_dev.php/login_check y ver 
el resultado que nos devuelve la api. 

<h4>Observaciones:</h4>
La api siempre devolvera el mismo resultado, ya que lo que hace es consultar un listado de usuarios que 
hay almacenados en la cache de Redis, dicha lista de usuarios esta harcoded y es la propia llamada de la api (login_check)
que se encarga de purgar la lista de usuarios de redis cache, de eliminar todos los registros de la tabla users de la base de datos
y volver a darlos de alta tanto en la base de datos como en la cache de Redis

<h4>Documentación de la api:</h4>
Se puede acceder a la documentación de la api mediante la siguiente url: http://apirest.login/app_dev.php/api
Es una documentación generada por el bundle de symofny "NelmioApiDoc"
Se puede Observar las respuestas que devolvera la api y sus codigos de respuesta/error.
<h5>Status Codes:</h5>
<ul>
<li>200 - Returned when successful, will return an array with iduser and his jwt token</li>
<li>401 - User is empty</li>
<li>402 - Password is empty</li>
<li>403 - User name doesnt exist</li>
<li>404 - User credentials not found</li>
</ul>

<h4>Test Unitarios:</h4>
Para lanzar los tests unitarios, basta con situarse en la carpeta reaíz del proyecto, tener instalado phpunit 
y lanzar el siguiente comando: phpunit -c app/ 
Si se desea tener un informe del code coverage basta con lanzar el siguiente comando: sudo phpunit -c app/ --coverage-html=cov/

Nos generará un informe de nuestro code coverage en la carpeta cov que se encuentra en la raíz del proyecto
