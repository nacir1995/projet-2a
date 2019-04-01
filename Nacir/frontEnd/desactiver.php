<?php
session_start();
require 'connexion.php';
 $req = $pdo->prepare("INSERT INTO archive_compte SET name = ?, address = ?, phone = ? , email= ?, password = ?");
           
            $req->execute([$_SESSION['name'], $_SESSION['address'], $_SESSION['phone'], $_SESSION['email'], $_SESSION['password']]);
          // mail($_POST['email'], 'Confirmation de votre compte', "salut");
            $req = $pdo->prepare("DELETE FROM user where name= ?");
 $req->execute([$_SESSION['name']]);
session_destroy();
            header('Location: acceuil.php');


?>