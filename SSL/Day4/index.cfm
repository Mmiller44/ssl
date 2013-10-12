<cfset views=createObject("component", "models/views")>
<cfset views.getView("../views/header.cfm")>
<cfset users=createObject("component", "models/users")>

<cfset data = users.getAll()>
<cfset views.getView("../views/body.cfm", data)>
<cfset views.getView("../views/footer.cfm")>

<cfif isdefined('url.action')>

	<cfif url.action is "delete">
		<cfset users.deleteUser(url.userID)>
		<cfset data = users.getAll()>

	<cfelseif url.action is "addform">
		<cfset views.getView("../views/addform.cfm")>

	<cfelseif url.action is "updateform">
		<cfset data = users.getUser(url.userID)>
		<cfset views.getView("../views/updateform.cfm", data)>

	<cfelseif url.action is "updateuser">
		<cfset users.updateUser(URL.id, form.password, form.username)>


	<cfelseif url.action is "addaction">
		<cfset username = form.username>
		<cfset password = form.password>
		<cfset email = form.email>
		<cfset media = form.media>
		<cfset birthday = form.birthday>
		<cfset donations = form.donations>
		<cfset gender = form.gender>
		<cfset experience = form.experience>
		<cfset bio = form.bio>

		<cfset users.addUser(password,username,email,media,birthday,donations,gender,experience,bio)>
		<cfset data = users.getAll()>

	</cfif>

</cfif>









