<?php
include 'user.php';
require_once  'UserCore.php';

 if (isset($_POST['name']) and isset($_POST['address']) and isset($_POST['phone']) and isset($_POST['zipcode']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['gender']))
       {
    $user1=new User($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['zipcode'],$_POST['email'],$_POST['password'],$_POST['gender']);

            $user1C=new UserCore();
            $user1C->ajouterUser($user1);   
            $_SESSION['message'] = "Bienvenue Parmis nous";
            $name = $_POST['name'];
            $_SESSION['username'] = $name;
            header("Location: Acceuil.php"); 
        }
        else
        {
            echo "vérifier les champs";
            $_SESSION['message'] = "Sorry something went wrong";
        }
        ?>