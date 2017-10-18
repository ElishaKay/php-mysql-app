$(document).ready(function(){  
	// code to get all records from table via select box
	$("#employee").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'client_id='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
			   if(employeeData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#emp_name").text(employeeData.client_name);
					$("#emp_age").text(employeeData.client_email);
					$("#emp_salary").text(employeeData.item_order);
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
