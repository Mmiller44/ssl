<form action="?action=addaction" method="post">
	User Name:
	<input type="text" name="username"/><br />
	Password:
	<input type="text" name="password"/><br />
	Email:
	<input type="text" name="email"/><br />
	Social Media:
	<input type="text" name="media"/><br />
	Birthday:
	<input type="text" name="birthday"/><br />
	Donations:
	<input type="text" name="donations"/><br />
	Gender:
	<input type="radio" name="gender" checked="checked" value="male">Male
	<input type="radio" name="gender" value="female">Female <br />
	Experience:
	<select value="experience" name="experience" id="dropDown">
	    <option value="" disabled="disabled">Blog Experience</option>
	    <option value="beginner" selected="selected">Beginner</option>
	    <option value="intermediate">Intermediate</option>
	    <option value="expert">Expert</option>
	</select><br />
	Bio:
	<input type="text" name="bio"/><br />

	<input type="submit" value="Add" />

</form>