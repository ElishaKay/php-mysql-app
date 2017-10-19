<?php 

include('header.php');
include_once("db_connect.php");

?>

<title>phpzag.com : Demo Ajax Registration Script with PHP, MySQL and jQuery</title>


<?php include('container.php');?>

<div class="container">
	<h2>Example: Ajax Drop Down Selection Data Load with PHP & MySQL</h2>		
	



	<!-- Div for allowing user to choose from dropdown -->

	<div class="page-header">

        <h3>
        
        <select id="employee">
        
        <option value="" selected="selected">Select Client Name</option>
	

		<?php
		
		$sql = "SELECT * FROM client order by client_creation_date desc LIMIT 10";
		
		$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		

		while( $rows = mysqli_fetch_assoc($resultset) ) { 
		
		?>
	
		<option value="<?php echo $rows["client_id"]; ?>"><?php echo $rows["client_name"]; ?></option>
		
		<?php }	?>
	

		</select>
        </h3>	
     </div>		
	

	<!-- Div for displaying results	 -->

		<div id="display">

			<div class="row" id="heading" style="display:none;"><h3><div class="col-sm-4"><strong>Employee Name</strong></div>

			<div class="col-sm-4"><strong>Age</strong></div><div class="col-sm-4"><strong>Salary</strong></div></h3></div><br>


			<div class="row" id="records"><div class="col-sm-4" id="emp_name"></div><div class="col-sm-4" id="emp_age"></div>

			<div class="col-sm-4" id="emp_salary"></div></div>			
			
			<div class="row" id="no_records"><div class="col-sm-4">Plese select employee name to view details</div></div>

        </div>	

	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/ajax-drop-down-selection-data-load-with-php-mysql" title="">Back to Tutorial</a>			
	</div>		

</div>

<?php include('footer.php');?>