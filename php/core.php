<?php
//Creamos un archivo core.php para tener variables globales en toda la aplicacion asi pueda ser escalable en un futuro. Creamos en primer lugar unas variables por asi decirlo con la funcion por defecto de php define(a'b) que espera recibir dos parametros el a = a como quieres llamarla y el b = al valor de la misma.
//Hacemos un include del archivo db_connect.php para tenerla entodos lados y cuando necesitemos de hacer sentencias hacemos el include en el resto de php asi tenemos en un solo archivo lo mas importante por eso CORE que seria el corazon de nuestra aplicacion.

//CONECTION DATA
define('CON_HOST','localhost');
define('CON_PORT', '');
define('CON_DB','iAdopt');
define('CON_USERNAME','root');
define('CON_PASSWORD','');
define('CON_UTF','UTF8');

include('DataBase/db_connect.php');
ini_set('display_errors', 0);
//ini_set('display_errors', 0);

?>
