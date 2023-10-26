<?php
    //Carga las configuraciones principales
    require_once 'config.php';

    //Establecemos librerias para cargar los controladores, las vistas y la app
    //Hasta este momenti no hay ningun modelo
    require_once("libs/controller.php");
    require_once("libs/view.php");
    require_once("libs/app.php");

    //Creamos el objeto con el nombre de la url...
    $app = new App();
?>