<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');

session_start();

if(isset($_POST['username']) && isset($_POST['password']))
{
	$test = new forum_logo; 								//creates and instance of RAM
	//$config = $test->getConfig();							//uses the instance to get the mysqli info and create a connection
	$user = $_POST['username'];								// gets the username from the server and escapes it
	$pwd = $_POST['password']; 								//gets the password from the server and escapes it
	$remember = (int)$_POST['rememberMe'];	 				// gets the remember me check box
	
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//checks if the account is locked out
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&	
	$row = forum_logo::checkCredentials($user, $pwd);	// checks to see if the username is actually in the table
	date_default_timezone_set('UTC');
	$unlocked = new DateTime(); 						// gets the current time in the proper format for the table


	if(isset($row) && $row!=FALSE) 						// checks to  make sure $row is set and is not false (meaning that a user was found)
	{ 
		$usersLogs = forum_cache::getUserLogs($row->customer_id);	//Based on the ID from the row returned from the checkCredentials(), get the logs.
		$id = $row->customer_id;									//Customer's ID returned from checkCredentials()
		if($usersLogs->locked=='locked' && ($unlocked->format('Y-m-d H:i:s') < $usersLogs->unlockTime)) //checks to see if the user is locked out and if the proper ammount of time has passed
		{
			echo "1locked";
			exit();
		}
		else if($usersLogs->locked=='locked' && ($unlocked->format('Y-m-d H:i:s') > $usersLogs->unlockTime))
		{
			//change the lock status if the lock time has passed
			$usersLogs->updateLock($user,0,'unlocked', $usersLogs->unlockTime);
			echo "test1";
			exit();
		}
	
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//checks if the account has been activated
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
		if($usersLogs->activated!='activated')
		{
			//$err[]='You need to activate your account. Please check your mailbox';
			echo "activate";
			exit();
		}
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&	
		if($usersLogs->activated=='activated' && $usersLogs->locked!='locked')
			{
				// If everything is OK login
				// Set SESSION variables
				$_SESSION['usr']		= $row->usrname;
				$_SESSION['users_id']	= $row->customer_id;
				$_SESSION['group_id'] 	= $usersLogs->group_id;
				$_SESSION['svc'] 		= $row->service;
				$_SESSION['svcType']	= $row->service_type;
				$_SESSION['pkg'] 		= $row->package;
				$_SESSION['pmt'] 		= $row->uptodate_payaments;
				$_SESSION['rememberMe'] = $remember;
				
				if(forum_cache::loginUser($id))
				{
					echo "suc"; 
					exit();
				}
				else
				{
					echo "error";					
					exit();
				}
			}
	}

//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//incorrect password.
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	elseif($row==FALSE)
	{

			 //$err[]='Wrong username and/or password!';
			 
			 $rows = forum_cache::wrongInfo($user);
			 $count = $rows->login_attempts;
			 //if the user is entering a valid username but incorrect password, then start the login attempt counters
			 if(isset($rows) && $count<4)
			 {
				 
				$count++;

			 	//sets the counter to +1 each time the user gets a false login
			 	$rows->updateLock($user, $count, 'unlocked', '0000-00-00 0:0:0');
				echo "wrong";
				exit();
			 }
			 elseif(isset($rows) && $count == 4)
			 {

				 $count++;
				 $unlocktime = date("Y-m-d H:i:s",  strtotime('+15 minutes'));	
				 $rows->updateLock($user,$count,'locked',$unlocktime);
				 echo "2locked";
				 exit();
			 }
			 elseif(isset($rows) && $count >= 5)
			 {
				 //$err[]='Account has been locked. Please try again after 15 minutes.';
				 echo "3locked";
				 exit();
			 }
			 
	}			 
}

if(isset($_POST['mode']) && $_POST['mode']=='logout')
{
	$test = forum_cache::logoutUser($_SESSION['users_id']);
	if($test)
	{		
		echo"loggedout";			
		session_destroy();
		exit();
	}
	else
	{
		echo"errored";
	}
}	

/*
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Submit button for Forgot Password was pushed    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if(isset($_POST['forgotPw']) && $_POST['forgotPw'] == 'Submit')
{
		echo 8;
	
}
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Submit button for Resend Verify email was pushed    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
if(isset($_POST['resendEm']) && $_POST['resendEm']=='Submit')
{
	$resend = new Ram();
	$config = $resend->getConfig();
	$mail = $config->real_escape_string($_POST['resendEmail']);
	$test = Ram::resendVerificationEmail($mail);
	if($test)
	{
		echo 6;
	}
	else
	{
		echo 7;
	}
	
}*/
?>