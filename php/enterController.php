<?php
//Hacemos un include de core el corazon de nuestra aplicacion que dentro tiene la coneccion hacia la base de datos. 
include('core.php');

//Los parametros que recibimos a traves del form lo guardamos en dos variables por el metodo POST desde el formulario.
$user = $_POST['user'];
$password = $_POST['password'];

//Creamos una instancia de nuestra clase PDOconnect y le mandamos los parametros de la public function queryList(a,b) que recordamos espera recibir dos parametros. En el parametro a le pasamos nuestra sentencia y noten que pusimos :user y :password. En el segundo parametro que espera un array() aqui le mandamos los parametros que le pusimos :user y :password y le asignamos clave valor con => donde :user => $user quiere decir que cada vez que se haga un llamado en ese array la calve es :user y su valor es $user, ejemplo ':a' => 'Pepito es una persona inteligente' cada vez que queramos hacer el llamado a esa parte de nuestro array usamos :a y nos aparecera 'Pepito es una persona inteligente' como su contenido. Explicamos que hacemos el bindparam para mantener la base de datos lo mas seguro posible.
$db = new PDOconnect;
$query = $db->queryList("SELECT `ID`, `user_name`, `user_lastname`, `user_birthdate`, `user_sex`, `user_email`, `user_telephone`, `user_login`, `user_password`, `user_register` FROM `ia_users` WHERE `user_login` LIKE :user AND `user_password` LIKE :password LIMIT 1", array(':user' => $user, ':password' => sha1($password)));

//Guardamos en una variable result lo que pedimos a la bbdd hacemos un fetch en este caso y le pedimos que este en modo objeto.
$result = $query->fetch(PDO::FETCH_OBJ);
// AND `user_status` LIKE 1 

//En este caso es medio especial porque al pedir la sentencia a la base de datos al estar correcta nos lanzara un true pero si tuviera un error nos lanzara un false, sin embargo nosotros podemos hacer una sentencia que este bien y que no exista en este caso el user en la bbdd nos lanzara null porque los campos que enviaran son vacios. Entonces si result es diferente de vacio entramos e iniciamos sesion y creamos variables de sesion asignandole lo que pedimos en la bbdd.
if($result != NULL){
    session_start();
    
    $_SESSION['ID'] = $result->ID;
    $_SESSION['name'] = $result->user_name;
    $_SESSION['lastname'] = $result->user_lastname;
    $_SESSION['email'] = $result->user_email;
    $_SESSION['user'] = $result->user_login;
      //Notese que aqui pusimos la variable Password y no lo que nos arroja la bbdd proque recordamos que en la bbdd tenemos la contraseña encriptada.

    $_SESSION['password'] = $password;
        //Lo redireccionamos a list.php.
    header('Location: ../list.php');
} else {
        //En el caso que recivamos los campos vacios desde la bbdd lo enviamos al inicio.
    header('Location: ../index.html');
}
    

?>
