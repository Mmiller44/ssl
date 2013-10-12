<cfcomponent>

	<cffunction name="deleteUser" returntype="void">
	<cfargument name="userID" required="yes">

	<cfquery datasource="ssl_blog" name="users">

		delete from users_tbl
		where userID = <cfqueryparam value="#userID#">

	</cfquery>

	</cffunction>
</cfcomponent>