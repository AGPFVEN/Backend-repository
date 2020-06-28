<?php

session_start();              #Así se inicia una sesion que sirve para guardar datos atraves de scripts, updates, etc

$conection = mysqli_connect(  #Conectando a base de datos
    'localhost',              #URL, dominio, pero en este caso es local
    'root',                   #Usuario, este es el que crea xampp by default 
    '',                       #Contraseña, xampp te crea un usuario sin contraseña
    'php_mysql_crud_database' #Nombre de la base de datos
);

?>