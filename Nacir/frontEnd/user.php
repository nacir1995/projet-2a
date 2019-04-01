<?php
/**
 * 
 */

class User
{
	private $name;
	private $address;
	private $phone_number;
	private $email;
	private $password;
	private $passwordComf;
	private $gender;

	function __construct($name,$address,$phone,$email,$password,$gender)
	{
		$this->name=$name;
		$this->address=$address;
		$this->phone_number=$phone_number;
		//$this->zip_code=$zip_code;
		$this->email=$email;
		$this->password=$password;
		$this->gender=$gender;
	}

	function getname(){
		return $this->name;
	}
	function setname($name){
		$this->name=$name;
	}

	function getaddress(){
		return $this->address;
	}
	function setaddress($address){
		$this->address=$address;
	}

	function getphone(){
		return $this->phone;
	}
	function setphone($phone){
		$this->phone=$phone;
	}

	

	function getemail(){
		return $this->email;
	}
	function setemail($email){
		$this->email=$email;
	}

	function getpassword(){
		return $this->password;
	}
	function setpassword($password){
		$this->password=$password;
	}

	function getpasswordComf(){
		return $this->passwordComf;
	}
	function setpasswordComf($passwordComf){
		$this->passwordComf=$passwordComf;
	}

	function getgender(){
		return $this->gender;
	}
	function setgender($gender){
		$this->gender=$gender;
	}


}



?>