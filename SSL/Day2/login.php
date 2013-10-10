<?php
	
include 'models/viewModel.php';
include 'models/validationModel.php';

$viewModel = new viewModel();		
$data = array("name"=>"mike");

$viewModel->getView('views/header.php',$data);

$validationModel = new validationModel();
$validationModel->validateLogin();
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

<?php $viewModel->getView('views/footer.php',$data); ?>
