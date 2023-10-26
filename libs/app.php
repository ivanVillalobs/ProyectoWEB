<?php
    class App
    {
        function __construct()
        {
            require_once 'controllers/error.php';

            //Obtenemos la URL que viene en el navegador o si viene vacío
            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url = rtrim($url, '/'); //Quitamos los "/" que estén más al final de la cadena url
            $url = explode('/', $url); //Dividimos la cadena $url separada por "/"

            //Cuando se ingresa sin definir un controlador
            if(empty($url[0])){
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                //Cargamos el modelo "main"
                $controller->loadModel('main');
                $controller->render();
                return false;
            }

            $archivoController = 'controllers/'.$url[0].'.php'; //El objeto principal

            if(file_exists($archivoController)){
                require_once $archivoController;
                //Inicializa el controlador
                $controller = new $url[0];
                
                //Declaramos la variable para saber el número de parametros de la url
                $nparam = sizeof($url);
                if($nparam>1)
                {
                    if($nparam>2)
                    {
                        $param = []; //Se define un arreglo de parametros
                        for($i = 2; $i<$nparam; $i++)
                            array_push($param, $url[$i]);

                        $controller->{$url[1]}($param);
                    }
                    else
                    {
                        $controller->{$url[1]}();
                    }
                }
                else
                {
                    $controller->render();
                }
            }
            else
            {
                //Cargamos un nuevo controlador para el error
                $controller=new Errores();
            }
        }
    }
?>