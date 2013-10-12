<cfloop query="data">

	<form action="?action=updateuser&id=<cfoutput>#userID#</cfoutput>" method="post">
		
		User Name:
		<input type="text" name="username" value="<cfoutput>#username#</cfoutput>"><br />

		Password:
		<input type="text" name="password" value="<cfoutput>#password#</cfoutput>"><br />

		<input type="submit" value="Update" />

	</form>

</cfloop>
