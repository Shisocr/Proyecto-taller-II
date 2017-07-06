<?php
include('core.php');
//Recibimos desde el formulario los parametros por el metodo post y las guardamos en variables.
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];

//Instanciamos nuestra clase y le mandamos los parametros de insert a nuestra table en la base de datos. OJO que codificamos con sha1() una funcion por defecto de php que encripta en mas de 40 caracteres.
$db = new PDOconnect;
$query = $db->queryList("INSERT INTO `ia_users`(`user_name`, `user_lastname`, `user_email`, `user_login`, `user_password`) VALUES ( :nombre, :apellido, :email, :user, :password)", array(':nombre' => $nombre,':apellido' => $apellido,':email' => $email,':user' => $user, ':password' => sha1($password)));

header('Location: ../index.html');
?>
