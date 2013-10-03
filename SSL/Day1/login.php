<? include "views/header.php" ?>

<?php

?>

<div class="registration">
	<h1>Log in</h1>

		<form class='registerForm'>
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" id="newUser">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" id="newPassword">
			<label>Confirm Password</label>
			<input type="password" name="confirmpassword" placeholder="Confirm Password" id="confirmPassword">
		</form>

	<button id="registerButton">Log in</button>
</div>

<? include "views/footer.php" ?>