<?php

class usersModel {
	
	public function getUsers(){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$st=$db->prepare("select * from users_tbl");

		$st->execute();

		$obj=$st->fetchAll();
		return $obj;
	}

	public function getUser($userID){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$st=$db->prepare("select * from users_tbl where userID = :userID");

		$st->execute(array(":userID"=>$userID));

		$obj=$st->fetchAll();
		return $obj;
	}

	public function updateUser($userID,$username,$email,$birthday,$bio)
	{

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "update users_tbl set email = :email, username = :username, birthday = :birthday, bio = :bio where userID = :userID";

		$st=$db->prepare($sql);
		$newEmail = strtolower($email);

		$st->execute(array(":userID"=>$userID,":email"=>$newEmail,":username"=>$username,":birthday"=>$birthday,":bio"=>$bio,));

	}

	public function deleteUser($userID=''){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "delete from users_tbl where userID = :userID";

		$st=$db->prepare($sql);
		$st->execute(array(":userID"=>$userID));

	}

	public function addUser($password,$username,$email,$media,$birthday,$donations=0,$gender,$experience,$bio){

		$db=new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");
		$sql = "select email from users_tbl where email = :email or username = :username";

		$st=$db->prepare($sql);
		$newEmail = strtolower($email);
		$st->execute(array(":email"=>$newEmail,":username"=>$username));
		
		if($st->rowCount() > 0)
		{

       		 return false;

    	}else
    	{
    		$gravatarEmail = (md5($email));
    		$protectedPass = (md5($password));
			$sql = "insert into users_tbl (password,username,email,media,birthday,donations,gender,experience,bio,md5Email) values (:pass,:user,:email,:media,:birthday,:donations,:gender,:exp,:bio,:gravatarEmail)"; 
			$st=$db->prepare($sql); 		
			$st->execute(array(":pass"=>$protectedPass,":user"=>$username,":email"=>$newEmail,":media"=>$media,":birthday"=>$birthday,":donations"=>$donations,":gender"=>$gender,":exp"=>$experience,":bio"=>$bio, "gravatarEmail"=>$gravatarEmail));
			return true;
   	 	}
	}


	public function checkUser ($data)
	{
		$db = new PDO("mysql:hostname=localhost; dbname=ssl_blog","root","root");

		$sq = "select userID, username, password from users_tbl where username = :un and password = :pass";

		$st = $db->prepare($sq);

		$st->execute(array(":un"=>$data['un'], ":pass"=>md5($data["pass"])));

		$userInfo = $st->fetchAll();
		$user = $userInfo[0]["userID"];

		$isgood = $st->rowCount();

		if($isgood > 0)
		{
			$_SESSION["userID"] = $user;
			$_SESSION["loggedin"] = 1;
			return 1;

		}else
		{
			$_SESSION["loggedin"] = 0;
			return 0;
		}
	}

}

?>