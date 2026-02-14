<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/siteOps');
error_reporting(E_ALL); ini_set('display_errors', 'On');

if (isset($_POST['serviceOrder']))
{
	$_SESSION['serviceOrder'] = $_POST['serviceOrder'];
}

if (isset($_POST['regSubmit']) && $_POST['regSubmit']=='Register')
{		
		$test = new forum_logo();
		$config = $test->getConfig();
		
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	Checking to make sure POSTs are all filled in 	$$$$$$$$$$$$$$$$$$$$$$$$	
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$		
		if(isset($_POST['username']))
		{
			$user= $config->real_escape_string($_POST['username']);
		}
		else
		{
			$err[]='The Username field was left blank. Please enter a valid Username';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$		
		if(isset($_POST['email']))
		{
			$emailAdd = $config->real_escape_string($_POST['email']);
		}
		else
		{
			$err[]='The Email field was left blank. Please enter a valid Email';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			
		if(isset($_POST['pwd']))
		{
			$pwd = $config->real_escape_string($_POST['pwd']);
		}
		else
		{
			$err[]='The Password field was left blank. Please enter a valid Password';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['verifypwd']))
		{
			$verifyPwd= $config->real_escape_string($_POST['verifypwd']);
		}
		else
		{
			$err[]='The Verify Password was left blank. Please verify your Password';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['verifyemail']))
		{
			$verifyEmail= $config->real_escape_string($_POST['verifyemail']);
		}
		else
		{
			$err[]='The Verify Email field was left blank. Please verify your Email';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['zip']))
		{
			$zipCo= $config->real_escape_string($_POST['zip']);
		}
	/*	else
		{
			$err[]='The Zipcode field was left blank. Please enter a valid Zipcode';
		}*/
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['address']))
		{
			$address= $config->real_escape_string($_POST['address']);
		}
/*		else
		{
			$err[]='The Street Address field was left blank. Please enter a valid Street Address';
		}*/
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			
		if(isset($_POST['aptnum']))
		{
			$aptnum	= $config->real_escape_string($_POST['aptnum']);
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['state']) && $_POST['country']=='United States')
		{
			$state= $config->real_escape_string($_POST['state']);
		}
/*		else
		{
			$err[]='The State field was left blank. Please select a State';
		}*/
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['country']))
		{
			$country= $config->real_escape_string($_POST['country']);
		}	
/*		else
		{
			$err[]='The Country field was left blank. Please select a Country';
		}*/
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		if(isset($_POST['FirstName']))
		{
			$firstName= $config->real_escape_string($_POST['FirstName']);
		}
		else
		{
			$err[]='The First Name field was left blank. Please enter your First Name';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			
		if(isset($_POST['LastName']))
		{
			$lastName= $config->real_escape_string($_POST['LastName']);
		}
		else
		{
			$err[]='The Last Name field was left blank. Please enter your Last Name';
		}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$	
		
		$err = array();
		
		$emailTest =  $test->checkEmail($emailAdd); //checks to see if email exists, returns true or false
		$usernameTest = $test->checkUsername($user); //checks to see if the username is already in use, returns true or false
		if(isset($_POST['zip']) && strlen($zipCo)!=5 && !preg_match('/[0-9]^/'))
		{
			$err[]='Your zipcode was entered with an invalid number. Please re-enter it.';
		}
		if(strlen($user)<4 || strlen($user)>32) //make sure the username is within the limits length wise
		{
			$err[]='Your username must be between 3 and 32 characters!';
		}
		if(preg_match('/[^a-z0-9\-\_\.]+/i',$user)) //ensure there are no forbidden characters
		{
			$err[]='Your username contains invalid characters!';
		}
		//check to ensure that the email is not already being used for another user
		if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',$emailAdd))
		{
			$err[]='You did not enter a proper email address. Please go back and try again.';
		}
		if(!$emailTest) //send out to checkEmail and see if there user's email address is already in use.
		{
			$err[]='Your email is not valid and is already being used.';
		}
		if(!$usernameTest) //send out to checkUsername to ensure that the user's username is not already in use.
		{
			$err[]='That username is already in use, please select another one.';
		}
		//check to ensure the password is long enough
		if(strlen($pwd) < 8)
		{
			$err[]='Your password is not long enough. Please re-enter it.';
		}
		//check the password to ensure it is strong
		if(!preg_match('/[a-zA-Z]/', $pwd) || !preg_match('/\d/', $pwd) || !preg_match('/[^a-zA-Z\d]/', $pwd))
		{
			$err[]='Your password does not contain at least one special character, numeral, captialized, and lowercase letter. Please re-enter it.';
		}			
		if($pwd!= $verifyPwd) //check to make sure the passwords match
		{
			$err[]='The passwords you entered do not match. Please re-enter them.';
		}
		if($emailAdd != $verifyEmail) // check to make sure the email's match
		{
			$err[]='The Emails you have entered do no match. Please re-enter them.';
		}
		//
		//	GO THROUGH AND CLEAN OUT THE BUTTON FOR THE SERVICE CALL TO ENSURE IT HAS NOT BEEN TAMPERED WITH
		//

		//If no errors were found, add the user to the database, then send out an email to confirm
		if(empty($err))
		{
			
				$salt = forum_logo::genSalt();	
				$hash = hash('SHA512',$pwd.$salt);
				$pass = $salt.$hash;
				$defTime = date("Y-m-d");
				$activationString = forum_cache::generateActivationString();
				//add the info to the database
				$userAr = array
				(
					'username'			=>  $user,
					'email'				=>	$emailAdd,
					'service'			=>	"None",
					'service_type'		=>	"None",
					'package'			=>	0,
					'card'				=>	0,
					'first_name'		=>	$firstName,
					'last_name'			=>	$lastName,
					'zipcode'			=>	$zipCo,
					'street_address'	=>	$address,
					'State'				=>	$state,
					'Country'			=>	$country,
					'pass'				=>	$pass,
					'last_payment_made'	=>	$defTime,
					'next_payment_due'	=>	$defTime,
					'uptodate_payments'	=>	2
				);
				
				$newUser = new forum_logo($userAr);
				if($newUser->newCust())
				{
				$userID = $newUser->getID($user);
				
				//creates the log table for this user and sends the activation email
				if(forum_cache::createLog($userID, $activationString))
				{
					$message = " To activate your account, please click on this link:\n\n";
					$message .= 'https://www.nebula-hosting.net/activate.php?key='.$activationString;
					mail($emailAdd, 'Registration Confirmation', $message, 'From: admin@nebula-hosting.net');
					$_SESSION['msg']['reg-success']='An email has been sent to your specified email address. Please follow the link in the email to Activate your account. Thank you!';
					//execute the python script on the server to create the proper setup for the user that was just purchased.
				}
				else
				{
					$err[]='There was a problem with the registration. Please contact an Administrator, Thank You!';
				}			
		}
		if(!empty($err))
		{
			$_SESSION['msg']['reg-err'] = implode('<br />',$err);
		}	
	//reset the page with a congratulations message and tell them to check their email.
	//then execute python code to create the instance in openstack and setup the UI for them.
	//reloadReg();
}
//
//
//
//
}
?>
	<div class="regContent">
		<div class="regArea">

			<center><h2>Member Registration</h2><center>
			<center>
			<?php
				if(isset($_SESSION['msg']['reg-err']))
				{
					echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
					unset($_SESSION['msg']['reg-err']);
				 // This will output the registration errors, if any
				}
				elseif(isset($_SESSION['msg']['reg-success']))
				{
					echo '<div class="message">'.$_SESSION['msg']['reg-success'].'</div>';
				}
			?>
				<form id="registerForm" action="" method="post">
				<table cellspacing="5px">
					<tr>	
						<td><div class="register_result" id="register_result"></div></td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label class="grey" for="username"><font color="#000000" size="2">Username: </font></label></br>
							<input class="field" type="text" name="username" id="username" value="" size="35" /></br></br>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label class="grey" for="pwd"><font color="#000000" size="2">Password:</font></label></br>
							<input class="field" type="password" name="pwd" id="pwd" size="35" /></br></br>
						</td>
						<td>
							<label class="grey" for="verifypwd"><font color="#000000" size="2">Verify Password:</font></label></br>
							<input class="field" type="password" name="verifypwd" id="verifypwd" value="" size="35" /></br></br>
						</td>
					</tr>
					<tr>
						<td>
							<label class="grey" for="email"><font color="#000000" size="2">Email Address:</font></label></br>
							<input class="field" type="text" name="email" id="email" value="" size="35" /></br></br>
						</td>
						<td>
							<label class="grey" for="verifyemail"><font color="#000000" size="2">Verify Email Address:</font></label></br>
							<input class="field" type="text" name="verifyemail" id="verifyemail" value="" size="35" /></br></br>
						</td>
					</tr>
					<tr><td></br></td><td></br></td></tr>
					<tr><td></br></td><td></br></td></tr>
					<tr>
						<td>
							<label class="grey" for="FirstName"><font color="#000000" size="2">First Name:</font></label></br>
							<input class="field" type="text" name="FirstName" id="FirstName" value="" size="35" /></br></br>
						</td>
						<td>
							<label class="grey" for="LastName"><font color="#000000" size="2">Last Name:</font></label></br>
							<input class="field" type="text" name="LastName" id="LastName" value="" size="35" /></br></br>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label class="grey" for="address"><font color="#000000" size="2">Street Address:</font></label></br>
							<input class="field" type="text" name="address" id="address" value="" size="70" /></br></br>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label class="grey" for="aptnum"><font color="#000000" size="2">Apt Number:</font></label></br>
							<input class="field" type="text" name="aptnum" id="aptnum" value="" size="35" /></br></br>
						</td>
						<td>
							<label class="grey" for="zip"><font color="#000000" size="2">ZipCode:</font></label></br>
							<input class="field" type="text" name="zip" id="zip" value="" size="5" /></br></br>
						</td>
					</tr>
					<tr>
						<td>
							<label class="grey" for="state"><font color="#000000" size="2">State:</font></label></br>
							<input class="field" type="text" name="state" id="state" value="" size="35" /></br></br>
						</td>
						<td>
							<label class="grey" for="country"><font color="#000000" size="2">Country:</font></label></br>
							<input class="field" type="text" name="country" id="country" value="" size="35" /></br></br>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="regSubmit" class="bt_login" id="regSubmit" value="Register" />
						</td>
					</tr>
					</form>
				</table>
		</div>
		<div class="regAreaFine">
			Disclaimer area
		</div>
	</div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');?>