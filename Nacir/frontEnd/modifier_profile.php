
<?php 
require 'connexion.php';
$req = $pdo->prepare("UPDATE  user SET name = ?, address = ?, phone = ? , password = ? where email = ?");
 $req->execute([$_POST['name'], $_POST['address'], $_POST['phone'],  $_POST['password'], $_POST['email']]);
  session_start();
       // $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['address']=$_POST['address'];
    header('location: account.php');
 ?>