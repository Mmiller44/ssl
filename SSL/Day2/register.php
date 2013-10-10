<?php
	
include 'models/viewModel.php';
include 'models/validationModel.php';

$viewModel = new viewModel();		
$data = array("name"=>"mike");

$viewModel->getView('views/header.php',$data);
$validationModel = new validationModel();
$validationModel->validateRegister();
?>

<div class="registration">
	<h1>Register</h1>
		<form class='registerForm' action="?action=register" method="post">
			<label>Email</label>
			<input type="email" name="email" placeholder="example@exmple.com" id="newEmail">
			<label>Username</label>
			<input type="text" name="username" placeholder="username1" id="newUser">
			<label>Password</label>
			<input type="password" name="password" placeholder="8-20 char. 1 digit" id="newPassword">
			<label>Confirm Password</label>
			<input type="password" name="confirmpassword" placeholder="Confirm Password" id="confirmPassword">
			<label>Birthday</label>
			<input type="text" name="birthday" placeholder="03/30/90" id="">
			<label>Experience</label>
			<select id="dropDown">
			    <option value="" disabled="disabled">Blog Experience</option>
			    <option value="beginner" selected="selected">Beginner</option>
			    <option value="intermediate">Intermediate</option>
			    <option value="expert">Expert</option>
			</select>
			<label>Gender</label>
			<input type="radio" name="gender" checked="checked" id="registerRadio" value="male">Male
			<input type="radio" name="gender" id="registerRadio" value="female">Female
			<label class="socialMediaLabel">Social Media Page</label>
			<input type="text" name="socialMedia" placeholder="www.facebook.com/example">
			<label>Donations</label>
			<input type="text" name="donation" placeholder="ex: $5.00">
			<input type="checkbox" name="terms" value="1" id="termsOfUse">I agree to the <a href="">Terms of Use</a>
			<label>Bio</label>
			<input type="textarea" name="bio" id="textArea">
			<button id="registerButton">Register</button>
		</form>
</div>

<?php $viewModel->getView('views/footer.php',$data); ?>
