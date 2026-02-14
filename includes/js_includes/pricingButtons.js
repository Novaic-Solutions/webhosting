$(function() {
	var linuxStandardBasePrice = 0.0125;
	var windowsStandardBasePrice = 0.0175;
	var redhatStandardBasePrice = 0.055;
	var linuxPerformanceBasePrice = 0.06;
	var windowsPerformanceBasePrice = 0.080;
	var rhelPerformanceBasePrice = 0.11;
	var linuxPerformanceTwoBase = 0.90;
	var windowsPerformanceTwoBase = 1.10;
	var rhelPerformanceTwoBase = 1.00;
	
	
	$("#Linux").click(function(e) {
		var managed = 0.000;
		var price = linuxStandardBasePrice;
		for(var i=1; i<6; i++) 
		{	
			managed += 0.005;		
			$("#s1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#s1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price = price*2;			
		}
		
	});
	
	$("#Windows").click(function(e) {
		var managed = 0.01;
		var price = windowsStandardBasePrice;
		for(var i=1; i<6; i++) 
		{
			managed += 0.01;
			$("#s1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#s1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price = price*2;	
		}
	});
		
	$("#RHEL").click(function(e) {
		var managed = 0.01;
		var price = redhatStandardBasePrice;
		for(var i=1; i<6; i++) 
		{
			managed += 0.01;
			$("#s1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#s1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price = price+0.040;	
		}
	});
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&	PERFORMANCE BUTONS			&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	$("#LinuxP1").click(function(e) {
		var managed = 0.01;
		var price = linuxPerformanceBasePrice;
		for(var i=1; i<6; i++)
		{
			$("#p1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#p1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price += price;
			managed += 0.01;	
		}
	});
	
	$("#WindowsP1").click(function(e) {
		var managed = 0.01;
		var price = windowsPerformanceBasePrice;
		for(var i=1; i<6; i++)
		{
			$("#p1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#p1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price += price;
			managed += 0.01;	
		}
	});
		
	$("#RHELP1").click(function(e) {
		var managed = 0.01;
		var price = rhelPerformanceBasePrice;
		for(var i=1; i<6; i++)
		{
			$("#p1Unm"+i).html("$" + price.toPrecision(3) + "/hr");			
			number = price + managed;
			$("#p1Man"+i).html("$" + number.toPrecision(3) + "/hr");
			price += 0.080;
			managed += 0.01;
		}
	});
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&		PERFORMANCE TWO BUTTONS			&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	$("#LinuxP2").click(function(e) {
		var managed = 0.05;
		var firstprice = linuxPerformanceTwoBase/2;
		var price = linuxPerformanceTwoBase;
		for(var i=1; i<6; i++)
		{
			if(i==1)
			{
				$("#p2Unm"+i).html("$" + firstprice.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Unm"+i).html("$" + number.toPrecision(3) + "/hr");
			}
			else
			{
				$("#p2Unm"+i).html("$" + price.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Man"+i).html("$" + number.toPrecision(3) + "/hr");
				price += linuxPerformanceTwoBase;
			}			
			managed += 0.05;
		}
	});
	
	$("#WindowsP2").click(function(e) {
		var managed = 0.05;
		var firstprice = windowsPerformanceTwoBase/2;
		var price = windowsPerformanceTwoBase;
		for(var i=1; i<6; i++)
		{
			if(i==1)
			{
				$("#p2Unm"+i).html("$" + firstprice.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Unm"+i).html("$" + number.toPrecision(3) + "/hr");
			}
			else
			{
				$("#p2Unm"+i).html("$" + price.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Man"+i).html("$" + number.toPrecision(3) + "/hr");
				price += windowsPerformanceTwoBase;
			}			
			managed += 0.05;
		}
	});
		
	$("#RHELP2").click(function(e) {
		var managed = 0.05;
		var firstprice = rhelPerformanceTwoBase/2;
		var price = rhelPerformanceTwoBase;
		for(var i=1; i<6; i++)
		{
			if(i==1)
			{
				$("#p2Unm"+i).html("$" + firstprice.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Unm"+i).html("$" + number.toPrecision(3) + "/hr");
			}
			else
			{
				$("#p2Unm"+i).html("$" + price.toPrecision(3) + "/hr");
				var number = price+managed;
				$("#p2Man"+i).html("$" + number.toPrecision(3) + "/hr");
				price += rhelPerformanceTwoBase;
			}			
			managed += 0.05;
		}
	});
		
});