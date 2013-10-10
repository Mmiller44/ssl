<?php
	
include 'models/viewModel.php';
include 'models/validationModel.php';
include 'models/usersModel.php';

$userModel = new usersModel();

$viewModel = new viewModel();		

$viewModel->getView('views/header.php');

$validationModel = new validationModel();

		if(!empty($_GET["action"]))
		{
			if($_GET["action"] == "login")
			{
				$validationModel->validateLogin();

			}else if($_GET["action"] == "users")
			{
				$data = $userModel->getUsers();
				$viewModel->getView("views/body.php",$data);

			}else if($_GET["action"] == "updateform")
			{
				$data = $userModel->getUser($_GET['userID']);
				$viewModel->getView('views/updateform.html', $data);

			}else if($_GET["action"] == "updateuser")
			{
				$userModel->updateUser($_POST["userID"],$_POST["username"],$_POST["password"]);
				$data = $userModel->getUsers();
				$viewModel->getView("views/body.php",$data);

			}else if($_GET["action"] == "delete")
			{
				$userModel->deleteUser($_GET["userID"]);
				$data = $userModel->getUsers();
				$viewModel->getView("views/body.php",$data);

			}else if($_GET["action"] == "addform")
			{
				$data = array('name' => "Mike");
				$viewModel->getView('views/addform.html',$data);

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
				$viewModel->getView("views/body.php",$data);
			}else
			{

			}

		}else
		{
			
		}
?>

<div class="registration">
	<h1>Log in</h1>

		<form class='registerForm' action="?action=login" method="post">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" id="newUser">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" id="newPassword">
			<label>Confirm Password</label>
			<input type="password" name="confirmpassword" placeholder="Confirm Password" id="confirmPassword">
			
			<input type="submit" id="registerButton" value="Log in" />
		</form>

</div>

<?php $viewModel->getView('views/footer.php'); ?>
