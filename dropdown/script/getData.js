$(document).ready(function(){  
	// code to get all records from table via select box
	$("#employee").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			type: 'post',
			dataType: "html",
			data: dataString,  
			cache: false,
			error: function(req, err){ console.log('my message' + err); },
			success: function(data) {
			   if(data) {
			   	console.log('data', data);
			   	// console.log('data name', data.client_name);
			   	parsedData = $(data);
 				console.log('Parsed Data', parsedData);
			   		$("#heading").show();		  
					$("#no_records").hide();					
					$("#emp_name").append(parsedData);
					// debugger;
					// $("#emp_age").text(data.client_email);
					// $("#emp_salary").text(data.item_order);
					$("#records").show();
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});