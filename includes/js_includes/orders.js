$(document).ready(function() 
{
	('div.mcOrderButton').click(function(f)
	{
		f.preventDefault();
		var id = $(this).attr('id');
		
		//$.post("/register.php" , { serviceOrder : $(this).attr('id').serialize()} );

	
		$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
		type : 'POST',
		dataType: 'text',
		data : $(this).serialize(),
		url  : '/register.php'
		});	
		
		window.location.href = '/register.php';
	return false;
	});
	return false;
});