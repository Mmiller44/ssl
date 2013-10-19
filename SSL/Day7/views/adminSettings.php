<?php foreach($data as $par){ ?>
<div class="registration">
<h1>Account Info</h1>
<img src="http://www.gravatar.com/avatar/<?=$par['md5Email']?>s=200" title="Your Gravatar" alt="Gravatar for specific user">
<form class="registerForm" action="?action=updateAccount" method="post">
<label>Email</label>
<input type="email" name="email" placeholder="example@exmple.com" id="newEmail" value="<?=$par['email']?>"/>
<label>Username</label>
<input type="text" name="username" placeholder="Username" id="existingUser" value="<?=$par['username']?>"/>
<label>Birthday</label>
<input type="text" name="birthday" placeholder="03/30/90" id="birthday" value="<?=$par['birthday']?>"/>
<label>Bio</label>
<input type="textarea" name="bio" id="textArea" value="<?=$par['bio']?>"/>
<input type="submit" id="updateButton" value="Update" />
</form>
<?php } ?>
</div>