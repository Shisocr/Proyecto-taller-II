<?php
include('core.php');

$user = $_POST['user'];
$password = $_POST['password'];


$db = new PDOconnect;
$query = $db->queryList("SELECT `ID`, `user_name`, `user_lastname`, `user_birthdate`, `user_sex`, `user_email`, `user_telephone`, `user_login`, `user_password`, `user_register` FROM `ia_users` WHERE `user_login` LIKE :user AND `user_password` LIKE :password LIMIT 1", array(':user' => $user, ':password' => sha1($password)));
$result = $query->fetch(PDO::FETCH_OBJ);
// AND `user_status` LIKE 1 

if($result != NULL){
    session_start();
    
    $_SESSION['ID'] = $result->ID;
    $_SESSION['name'] = $result->user_name;
    $_SESSION['lastname'] = $result->user_lastname;
    $_SESSION['email'] = $result->user_email;
    $_SESSION['user'] = $result->user_logim;
    $_SESSION['password'] = $password;
    
    header('Location: ../list.php');
} else {
    header('Location: ../index.html');
}
    

?>
