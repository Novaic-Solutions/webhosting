$(document).ready(function ()
{
	var services = 		<?php echo json_encode($services); 		?>;
	var serviceTypes = 	<?php echo json_encode($serviceType); 	?>;
	var payments = 		<?php echo json_encode($payments); 		?>;
	var packageLevels = <?php echo json_encode($packageLevels); ?>;
	//Fires when the Dedicated Hosting button is pressed
	alert( services );
	alert( serviceTypes );
	alert( payments );
	alert( packageLevels );
	$('#DHDash').click(function(e)
	{
		//maybe have the button clicks import different functions from another file that deal with that specific dashboard setup.
	});
	//Fires when the Cloud Hosting button is pressed
	$('#CHDash').click(function(e)
	{
		
	});
	//Fires when the Services Hosting button is pressed
	$('#SHDash').click(function(e)
	{
		
	});
	//Fires when the Div is ready on the screen. Goes through and sets up the inital side page menu
	$('div.dashSidebarTables').ready(function(d)
	{
		//Make an ajax call to get a list of all the Ceilometer entries and info that can be displayed for each sub section (RAM in use for servers, etc)
		//Take the info and display it properly
	});
	//Fires when the Div is ready on the screens. Goes through and sets up the default display area setup.
	$('div.mainDisplayArea').ready(function(d)
	{
		//AJAX call to get the display info for the section (Like listing each server, graphs of usages, etc).
		//Take the info from the AJAX call and display it properly in the Divs
		//$.each(myObjects, function(){
		//console.log("ID: " + this.id);
		//console.log("First Name: " + this.firstname);
		//console.log("Last Name: " + this.lastname);
		//console.log(" ");
	});
	});
	
});