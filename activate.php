<?php
include ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_cache.php');

error_reporting(E_ALL); ini_set('display_errors', 'On');
/*
if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
	 $_GET['email']))
{
	$email = $config->real_escape_string($_GET['email']);
}
*/
if (isset($_GET['key']))
{
	$test = new forum_cache();
 	$keys = $config->real_escape_string($_GET['key']);

	$config->close();

	 // Print a customized message:
	 if ($test->activateEmail($keys)) //if update query was successfull
	 {
?>
			
			<br />
			<br />
  			  <center><h3>Your account is now active. You may now <a href="#" id="loginLink">Log in</a></h3></center>
   			<br />
   			<br />
		
<?php	 
	 }
	 else
	 {
?>
		
			<br />
			<br />
			 <center><h3>Oops! Your account could not be activated. Please recheck the link or contact the system administrator.</h3></center>
    		<br />
    		<br />
		
<?php	 
	 }
	
?>

<?php }
include ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>