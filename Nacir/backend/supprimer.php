<?php
require '../frontEnd/connexion.php';
$req = $pdo->prepare("DELETE FROM user where name= ?");
 $req->execute([$_POST['search']]);
 
    header('location: reclamation.php');


?>