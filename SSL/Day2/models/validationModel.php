<?php

class validationModel {

	public function validateLogin(){

		if(!empty($_GET["action"]))
		{
			if($_GET["action"] == "login")
			{
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

			}else
			{
				echo('not working');
			}

		}else
		{
			echo('no Action');
		}

	}


		public function validateRegister(){

		if(!empty($_GET["action"]))
		{
			if($_GET["action"] == "register")
			{
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
					if(preg_match($emailExp, $email))
					{

					}else
					{
						echo "INVALID PASSWORD";
					}

					if(preg_match($userExp, $user))
					{

					}else
					{
						echo "NOT VALID";
					}

					if(preg_match($passExp, $pass))
					{

					}else
					{
						echo "INVALID PASSWORD";
					}

					if(preg_match($websiteExp, $social))
					{

					}else
					{
						echo "BAD SITE";
					}

					if(preg_match($donationExp, $donation))
					{

					}else
					{
						echo "BAD DONATION";
					}

					if(preg_match($birthdayExp, $birthday))
					{

					}else
					{
						echo "BAD BIRTHDAY";
					}

					if(isset($_POST['terms']) && $_POST['terms']!="")
					{

					}else
					{
						echo "TERMS NOT CHECKED";
					}

				}else
				{
					echo "Not matching and or not all fields are filled in.";
				}

			}else
			{
				echo('not working');
			}

		}else
		{
			echo('no Action');
		}





	}

};

?>