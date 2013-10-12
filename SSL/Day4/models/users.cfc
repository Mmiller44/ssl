<cfcomponent>

	<cffunction name="getAll" returntype="query">

	<cfquery datasource="ssl_blog" name="users">

		select userID,username,password,media,email from users_tbl;

	</cfquery>

		<cfreturn users>
	</cffunction>


	<cffunction name="deleteUser" returntype="void">
		<cfargument name="userID" required="yes">

		<cfquery datasource="ssl_blog" name="users">

			delete from users_tbl
			where userID = <cfqueryparam value="#userID#">

		</cfquery>

	</cffunction>



	<cffunction name="addUser" returntype="void">

		<cfargument required="yes" name="password">
		<cfargument required="yes" name="username">
		<cfargument required="yes" name="email">
		<cfargument required="yes" name="media">
		<cfargument required="yes" name="birthday">
		<cfargument required="yes" name="donations">
		<cfargument required="yes" name="gender">
		<cfargument required="yes" name="experience">
		<cfargument required="yes" name="bio">

		<cfquery datasource="ssl_blog" name="users">

			insert into users_tbl
			(password,username,email,media,birthday,donations,gender,experience,bio) values (<cfqueryparam value="#password#">,<cfqueryparam value="#username#">,<cfqueryparam value="#email#">,<cfqueryparam value="#media#">,<cfqueryparam value="#birthday#">,<cfqueryparam value="#donations#">,<cfqueryparam value="#gender#">,<cfqueryparam value="#experience#">,<cfqueryparam value="#bio#">);

		</cfquery>

	</cffunction>



	<cffunction name="getUser" returntype="query">
			<cfargument name="userID" required="yes">

			<cfquery datasource="ssl_blog" name="users">

				select userID, password, username from users_tbl
				where userID = <cfqueryparam value="#userID#">;

			</cfquery>
		<cfreturn users>
	</cffunction>


	<cffunction name="updateUser" returntype="void">
		<cfargument required="yes" name="userID">
		<cfargument required="yes" name="password">
		<cfargument required="yes" name="username">

		<cfquery datasource="ssl_blog" name="users">

			update users_tbl set
					password = <cfqueryparam value="#password#">,
					username = <cfqueryparam value="#username#">
					where userID = <cfqueryparam value="#userID#">;

		</cfquery>

	</cffunction>

</cfcomponent>