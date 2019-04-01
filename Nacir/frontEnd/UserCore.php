<?php
include 'connexion.php';

	function ajouterUser($user){
			$sql="insert into user (name,address,phone_number,zip_code,email,password,passwordComf,gender) values (:name, :address,:phone_number,:zip_code,:email,:password,:passwordComf,:gender)";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
			
	        $name			=	$user->getname();
	        $address		=	$user->getaddress();
	        $phone_number	=	$user->getphone();
	        $zip_code		=	$user->getzip();
	        $email			=	$user->getemail();
	        $password 		=	$user->getpassword();
	        $passwordComf	=	$user->getpasswordComf();
	        $gender 		= 	$user->getgender();

			$req->bindValue(':name',$name);
			$req->bindValue(':address',$address);
			$req->bindValue(':phone_number',$phone_number);
			$req->bindValue(':zip_code',$zip_code);
			$req->bindValue(':email',$email);
			$req->bindValue(':password',$password);
			$req->bindValue(':passwordComf',$passwordComf);
			$req->bindValue(':gender',$gender);
	            

	        $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
			
		}


?>