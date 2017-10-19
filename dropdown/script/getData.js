$(document).ready(function(){  
	// code to get all records from table via select box
	$("#employee").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			type: 'post',
			dataType: "json",
			data: dataString,  
			cache: false,
			error: function(req, err){ console.log('my message' + err); },
			success: function(rows) {
			   if(rows) {
			   		for (var i in rows){
			   			var row = rows[i];
						var client_name = row[0];
						var client_email = row[1];		   		
						var item_order = row[2];
			   			console.log('the row object is', row);			
			   	// console.log('data', data);
			   	// console.log('data name', data.client_name);
			   		$("#heading").show();		  
					$("#no_records").hide();					
					$("#emp_name").append("<p>"+client_name+"</p>");
					// debugger;
					// $("#emp_age").text(data.client_email);
					// $("#emp_salary").text(data.item_order);
					$("#records").show();
				}

				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});
