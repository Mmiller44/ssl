<?php

class usersModel {
	
	public function getUsers(){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$st=$db->prepare("select * from users_tbl");

		$st->execute();

		$obj=$st->fetchAll();
		return $obj;
	}

	public function getUser($userID = 0){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$st=$db->prepare("select * from users_tbl where userID = :userID");

		$st->execute(array(":userID"=>$userID));

		$obj=$st->fetchAll();
		return $obj;
	}

	public function updateUser($userID='',$username='',$password){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "update users_tbl set username = :username,password = :password where userID = :userID";

		$st=$db->prepare($sql);
		$st->execute(array(":username"=>$username,":userID"=>$userID,":password"=>$password));

	}

	public function deleteUser($userID=''){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "delete from users_tbl where userID = :userID";

		$st=$db->prepare($sql);
		$st->execute(array(":userID"=>$userID));

	}

	public function addUser($password,$username,$email,$media,$birthday,$donations=0,$gender,$experience,$bio){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "insert into users_tbl (password,username,email,media,birthday,donations,gender,experience,bio) values (:pass,:user,:email,:media,:birthday,:donations,:gender,:exp,:bio)";

		$st=$db->prepare($sql);
		$st->execute(array(":pass"=>$password,":user"=>$username,":email"=>$email,":media"=>$media,":birthday"=>$birthday,":donations"=>$donations,":gender"=>$gender,":exp"=>$experience,":bio"=>$bio));

	}

}

?>