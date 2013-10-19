<?php

class validationModel {

	public function validateLogin(){

		$user = $_POST["username"];
		$pass = $_POST["password"];
		$confirmPass = $_POST["confirmpassword"];
		$userExp = '/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/';
		$passExp = '/^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}/';

		if($user != "" && $pass != "" && $confirmPass != "" && $pass == $confirmPass)
		{
			if(preg_match($userExp, $user))
			{
				echo "Username is a valid entry";

			}else
			{
				echo "NOT VALID";
			}

			if(preg_match($passExp, $pass))
			{
				echo "Valid Password";
			}else
			{
				echo "INVALID PASSWORD";
			}


		}else
		{
			echo "Not matching and or not all fields are filled in.";
		}

	}


		public function validateRegister(){

			$email = $_POST["email"];				
			$user = $_POST["username"];
			$pass = $_POST["password"];
			$bio = $_POST["bio"];
			$social = $_POST["socialMedia"];
			$donation = $_POST["donation"];
			$birthday = $_POST["birthday"];
			$confirmPass = $_POST["confirmpassword"];
			$userExp = '/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/';
			$passExp = '/^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}/';
			$emailExp = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
			$websiteExp = '/^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$/';
			$donationExp = '/^\$?(\d{1,3}(\,\d{3})*|(\d+))(\.\d{0,2})?$/';
			$birthdayExp = '/((0?[13578]|10|12)(-|\/)((0[0-9])|([12])([0-9]?)|(3[01]?))(-|\/)((\d{4})|(\d{2}))|(0?[2469]|11)(-|\/)((0[0-9])|([12])([0-9]?)|(3[0]?))(-|\/)((\d{4}|\d{2})))/';

			if($email != "" && $user != "" && $pass != "" && $confirmPass != "" && $pass == $confirmPass && $social != "" && $bio != "" && $birthday != "")
			{
				if(!preg_match($emailExp, $email))
				{
					return false;
					echo "bad email input";


				}else if(!preg_match($userExp, $user))
				{
					return false;
					echo "bad user input";

				}else if(!preg_match($passExp, $pass))
				{
					return false;
					echo "bad password input";

				}else if(!preg_match($websiteExp, $social))
				{
					return false;
					echo "bad website input";

				}else if($donation != "" && !preg_match($donationExp, $donation))
				{
					return false;
					echo "bad donation input";

				}else if(!preg_match($birthdayExp, $birthday))
				{
					return false;
					echo "bad birthday input";


				}else if(!isset($_POST['terms']) && $_POST['terms']=="")
				{
					return false;
					echo "terms not clicked.";
					
				}else
				{
					return true;
				}

			}else
			{
				echo "Not matching and or not all fields are filled in.";
				return false;
			}

	}

};

?>