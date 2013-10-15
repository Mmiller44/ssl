<?php
session_start();

include 'models/viewModel.php';
include 'models/validationModel.php';
include 'models/usersModel.php';
include 'models/protector.php';

$userModel = new usersModel();
$validationModel = new validationModel();

$viewModel = new viewModel();
$data = array("name"=>"mike");

	if(!empty($_GET["action"]))
	{
		if($_GET["action"] == "register")
		{
			$validationModel->validateRegister();
			$password = $_POST["password"];
			$username = $_POST["username"];
			$email = $_POST["email"];
			$media = $_POST["socialMedia"];
			$donations = $_POST["donation"];
			$birthday = $_POST["birthday"];
			$gender = $_POST["gender"];
			$experience = $_POST['experience'];
			$bio = $_POST["bio"];
			$originalDate = $birthday;
			$newDate = date("Y-m-d", strtotime($originalDate));

			if($validationModel->validateRegister() == true)
			{
				if($userModel->addUser($password,$username,$email,$media,$newDate,$donations,$gender,$experience,$bio))
				{
					$data = $userModel->getUsers();
					$viewModel->getView('views/header.php',$data);
					$viewModel->getView("views/body.php",$data);

				}else
				{
					//echo "Not running get Users because email or username exists";
				}

			}

		}else if($_GET["action"] == "adminHome")
		{
			$viewModel->getView('views/adminheader.php');
			$viewModel->getView("views/adminbody.php");

		}else if($_GET["action"] == "users")
		{
			$data = $userModel->getUsers();

		}else if($_GET["action"] == "accountSettings")
		{	
			$data = $userModel->getUser($_GET['userID']);
			$viewModel->getView('views/adminheader.php',$data);
			$viewModel->getView("views/adminSettings.php", $data);

		}else if($_GET["action"] == "login")
		{
			$validationModel->validateLogin();

		}else if($_GET["action"] == "loginView")
		{
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/login.php", $data);

		}else if($_GET["action"] == "registerView")
		{
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/register.php", $data);

		}else if($_GET["action"] == "users")
		{
			$data = $userModel->getUsers();
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/body.php", $data);

		}else if($_GET["action"] == "updateform")
		{
			$data = $userModel->getUser($_GET['userID']);
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView('views/updateform.html', $data);

		}else if($_GET["action"] == "updateuser")
		{
			$userModel->updateUser($_POST["userID"],$_POST["username"],$_POST["password"]);
			$data = $userModel->getUsers();
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/body.php",$data);

		}else if($_GET["action"] == "delete")
		{
			$userModel->deleteUser($_GET["userID"]);
			$data = $userModel->getUsers();
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/body.php",$data);

		}else if($_GET["action"] == "addform")
		{
			$data = array('name' => "Mike");
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView('views/addform.html',$data);

		}else if($_GET["action"] == "checklogin")
		{
			$data = array("un"=>$_POST["username"],"pass"=>$_POST["password"]);
			$test = $userModel->checkUser($data);
			$msg = "invalid login";

			if($test == 1)
			{
				$viewModel->getView('views/adminheader.php',$data);
				$viewModel->getView("views/adminbody.php");

			}else
			{
				$viewModel->getView('views/header.php',$data);
				$viewModel->getView("views/login.php", $data);
			}

		}else if($_GET["action"] == "logout")
		{
			$_SESSION["loggedin"] = 0;
			$data = "<a href='?action=userlogin'>LOGIN</a>";
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/body.php", $data);
			session_destroy();

		}else if($_GET["action"] == "adduser")
		{
			$password = $_POST["password"];
			$username = $_POST["username"];
			$email = $_POST["email"];
			$media = $_POST["media"];
			$donations = $_POST["donations"];
			$birthday = $_POST["birthday"];
			$gender = $_POST["gender"];
			$experience = $_POST["experience"];
			$bio = $_POST["bio"];

			$userModel->addUser($password,$username,$email,$media,$birthday,$donations,$gender,$experience,$bio);
			$data = $userModel->getUsers();
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/body.php",$data);

		}else
		{
			$data = "";
			$viewModel->getView('views/header.php',$data);
			$viewModel->getView("views/login.php", $data);
		}

	}else
	{
		$data = "";
		$viewModel->getView('views/header.php',$data);
		$viewModel->getView("views/body.php", $data);
	}

$viewModel->getView('views/footer.php',$data);

?>