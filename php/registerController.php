<?php
include('core.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];


$db = new PDOconnect;
$query = $db->queryList("INSERT INTO `ia_users`(`user_name`, `user_lastname`, `user_email`, `user_login`, `user_password`) VALUES ( :nombre, :apellido, :email, :user, :password)", array(':nombre' => $nombre,':apellido' => $apellido,':email' => $email,':user' => $user, ':password' => sha1($password)));

header('Location: ../index.html');
?>
