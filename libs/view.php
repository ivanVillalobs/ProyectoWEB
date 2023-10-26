<?php
    class view
    {
        function __construct()
        {
            echo '<p>Vista Base.</p>';
        }

        //Función para determinar cuál vista cargar...
        function render($nombre)
        {
            require 'views/'.$nombre.'.php';
        }
    }
?>