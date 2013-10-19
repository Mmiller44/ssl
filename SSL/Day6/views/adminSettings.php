<?php foreach($data as $par){ ?>
	<div class="registration">
		<h1>Account Info</h1>

			<form class='registerForm' action="?action=updateuser" method="post">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" id="existingUser" value="<?=$par['username']?>">
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" id="existingPassword" value="<?=$par['password']?>">
			
				<input type="submit" id="loginButton" value="Update" />
			</form>
<?php } ?>
	</div>