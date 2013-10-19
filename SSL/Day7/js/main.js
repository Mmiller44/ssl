(function() {

	$('#registerButton').on('click',function(e){
			validateRegister(e);
	});

	$('#loginButton').on('click',function(e){
			validateLogin(e);
	});

	var validateLogin = function(e){

		var username = $('#existingUser').val();
		var password = $('#existingPassword').val();
		var userExp = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/;
		var passExp = /^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}/;

		if($('#existingPassword').hasClass('shake'))
		{
			$('#existingPassword').css('background-Color', '#F2F2F2');
			$('#existingPassword').removeClass('animated shake');
		}

		if($('#existingUser').hasClass('shake'))
		{
			$('#existingUser').css('background-Color', '#F2F2F2');
			$('#existingUser').removeClass('animated shake');
		}

		if(username == "" || userExp.test(username) == false)
		{
			e.preventDefault();
			$('#existingUser').css('background-Color', 'rgba(209,42,42,.6)');
			$('#existingUser').addClass('animated shake');
		}

		if(password == "" || passExp.test(password) == false)
		{
			e.preventDefault();
			$('#existingPassword').css('background-Color', 'rgba(209,42,42,.6)');
			$('#existingPassword').addClass('animated shake');
		}

	};

	var validateRegister = function(e){

		var username = $('#newUser').val();
		var social = $('#newSocial').val();
		var password = $('#newPassword').val();
		var confirmPassword = $('#confirmPassword').val();
		var email = $('#newEmail').val();
		var birthday = $('#birthday').val();
		var experience = $('#dropDown').val();
		var gender = $('input:radio[name=gender]:checked').val();;
		var bio = $('#textArea').val();
		var donation = $("#donation").val();

		var	userExp = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/;
		var	passExp = /^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}/;
		var	emailExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
		var	websiteExp = /^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$/;
		var	donationExp = /^\$?(\d{1,3}(\,\d{3})*|(\d+))(\.\d{0,2})?$/;
		var	birthdayExp = /((0?[13578]|10|12)(-|\/)((0[0-9])|([12])([0-9]?)|(3[01]?))(-|\/)((\d{4})|(\d{2}))|(0?[2469]|11)(-|\/)((0[0-9])|([12])([0-9]?)|(3[0]?))(-|\/)((\d{4}|\d{2})))/;

		if($('#newPassword').hasClass('shake'))
		{
			$('#newPassword').css('background-Color', '#F2F2F2');
			$('#newPassword').removeClass('animated shake');
			$('#confirmPassword').css('background-Color', '#F2F2F2');
			$('#confirmPassword').removeClass('animated shake');
		}

		if($('#textArea').hasClass('shake'))
		{
			$('#textArea').css('background-Color', '#F2F2F2');
			$('#textArea').removeClass('animated shake');
		}

		if($('#newEmail').hasClass('shake'))
		{
			$('#newEmail').css('background-Color', '#F2F2F2');
			$('#newEmail').removeClass('animated shake');
		}

		if($('#newUser').hasClass('shake'))
		{
			$('#newUser').css('background-Color', '#F2F2F2');
			$('#newUser').removeClass('animated shake');
		}

		if($('#newSocial').hasClass('shake'))
		{
			$('#newSocial').css('background-Color', '#F2F2F2');
			$('#newSocial').removeClass('animated shake');
		}

		if($('#birthday').hasClass('shake'))
		{
			$('#birthday').css('background-Color', '#F2F2F2');
			$('#birthday').removeClass('animated shake');
		}

		if($('#donation').hasClass('shake'))
		{
			$('#donation').css('background-Color', '#F2F2F2');
			$('#donation').removeClass('animated shake');
		}

		if(password != confirmPassword)
		{
			e.preventDefault();
			$('#newPassword').css('background-Color', 'rgba(209,42,42,.6)');
			$('#newPassword').addClass('animated shake');
			$('#confirmPassword').css('background-Color', 'rgba(209,42,42,.6)');
			$('#confirmPassword').addClass('animated shake');
		}

		if(email == "" || emailExp.test(email) == false)
		{
			e.preventDefault();
			console.log('bad email');

			$('#newEmail').css('background-Color', 'rgba(209,42,42,.6)');
			$('#newEmail').addClass('animated shake');

		}else if(username == "" || userExp.test(username) == false)
		{
			console.log('bad username');
			e.preventDefault();

			$('#newUser').css('background-Color', 'rgba(209,42,42,.6)');
			$('#newUser').addClass('animated shake');

		}else if(password == "" || passExp.test(password) == false)
		{
			console.log('bad password');
			e.preventDefault();

			$('#newPassword').css('background-Color', 'rgba(209,42,42,.6)');
			$('#newPassword').addClass('animated shake');
			$('#confirmPassword').css('background-Color', 'rgba(209,42,42,.6)');
			$('#confirmPassword').addClass('animated shake');

		}else if(birthday == "" || birthdayExp.test(birthday) == false)
		{
			console.log('bad birthday');
			e.preventDefault();
			$('#birthday').css('background-Color', 'rgba(209,42,42,.6)');
			$('#birthday').addClass('animated shake');

		}else if(social == "" || websiteExp.test(social) == false)
		{
			console.log('bad website');
			e.preventDefault();

			$('#newSocial').css('background-Color', 'rgba(209,42,42,.6)');
			$('#newSocial').addClass('animated shake');

		}else if(donation != "" && donationExp.test(donation) == false)
		{
			console.log('bad donation format');
			e.preventDefault();
			$('#donation').css('background-Color', 'rgba(209,42,42,.6)');
			$('#donation').addClass('animated shake');

		}else if(bio == "")
		{
			e.preventDefault();
			$('#textArea').css('background-Color', 'rgba(209,42,42,.6)');
			$('#textArea').addClass('animated shake');			

		}else
		{
			$(".registerForm").attr("action", "?action=register");
			console.log('Should move to register action');
		}
	};

})();