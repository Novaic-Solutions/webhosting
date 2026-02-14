$(document).ready(function() 
{
	$('#loginLink').click(function(e)
	{        // Button which will activate our modal
		$('#loginModal').reveal(
		{                							// The item which will be opened with reveal
			animation: 'fade',              		// fade, fadeAndPop, none
			animationspeed: 600,            		// how fast animtions are
			closeonbackgroundclick: true,   		// if you click background will modal close?
			dismissmodalclass: 'close-reveal-modal' // the class of a button or element that will close an open modal
		});
		
		$('#username').focus(); // Focus to the username field on body loads
		
		$('#loginForm').submit(function(e)
		{ 												// Create `click` event function for login
			e.preventDefault();
			var username = $('#username'); 				// Get the username field
			var password = $('#password'); 				// Get the password field
			var rememberMe = $('#rememberMe'); 			// Get the rememberMe button
			$('div.login_result').html('loading..'); 	// Set the pre-loader can be an animation
			
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&   Username Check 					&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
			
			if(username.val() === '')
			{ 												// Check the username values is empty or not
				username.focus(); 							// focus to the filed
				$('div.login_result').html('<span class="error">Enter the username</span>');
				return false;
			}
			if(username.val() > 32 || username.val() < 4)
			{
				username.focus();
				$('div.login_result').html('<span class="error">Username Not Long Enough</span>');
				return false;
			}
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&			Password Check				&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

			if(password.val() === '')
			{ 												// Check the password values is empty or not
				password.focus();
				$('div.login_result').html('<span class="error">Enter the password</span>');
				return false;
			}
			if(password.val() < 8)
			{
				username.focus();
				$('div.login_result').html('<span class="error">Password Not Long Enough</span>');
				return false;
			}
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&	AJAX call			&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
			
				$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
				type : 'POST',
				dataType: 'text',
				data : $(this).serialize(),
				url  : '/login.php',
				success: function(data){ 					// Get the result and asign to each cases
					var responseText = $.trim(data);
					
					if(responseText == '1locked'){
						$('div.login_result').html('Account locked. Please Wait 15 minutes.');
					}
					else if(responseText == 'activate'){
						$('div.login_result').html('Please activate your account.');
					}
					else if(responseText == 'suc'){
						$('div.login_result').html('Logging in. Please Wait.');
						setTimeout(function()
						{
							window.location.href = '/index.php';
						}, 5000);
					}				
					else if(responseText == 'wrong'){
						$('div.login_result').html('<span class="error">Incorrect Username or Password.</span>');
					}				
					else if(responseText == '2locked'){
						$('div.login_result').html('<span class="error">Incorrect Username or Password.</span>');
					}				
					else if(responseText == '3locked'){
						$('div.login_result').html('<span class="error">Account locked. Please wait 15 minutes..</span>');
					}				
					else if(responseText == 'error'){
						alert('There was an internal problem. Please contact an Administrator.');
					}
				}
				});		
	return false;
	});
	return false;
});
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&			Logout Link					&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
$('#logoutLink').click(function(e)
	{        // Button which will activate our modal
		$('#logoutModal').reveal(
		{                // The item which will be opened with reveal
			animation: 'fade',              // fade, fadeAndPop, none
			animationspeed: 600,            // how fast animtions are
			closeonbackgroundclick: true,   // if you click background will modal close?
			dismissmodalclass: 'close-reveal-modal'      // the class of a button or element that will close an open modal
		});
		
		$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			dataType: 'text',
			data : { mode: 'logout' },
			url  : '/login.php',
			success: function(data)
				{ // Get the result and asign to each cases
						
					var responseText = $.trim(data);
					
					if(responseText == 'loggedout'){
						$('div.logout_result').html('<span class="result"><center>Successfully Logged Out.</center></span>');
						setTimeout(function()
						{
							window.location.href = '/index.php';
						}, 5000);
					}
					else if(responseText == 'errored'){
						$('div.logout_result').html('<span class="result">There was a problem while logging out. Please contact an administrator and notify them.</span>');
					}						
				}
		});
	return false;
	});
	return false;
});