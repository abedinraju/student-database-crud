<?php include_once "app/autoload.php"; ?>


<?php 

if(isset($_GET['student_id'] )){
 
 $student_id = $_GET['student_id'];

 $sql = "SELECT * FROM students WHERE id = '$student_id'";

$data = $connection -> query($sql);

$single_student = $data ->fetch_assoc();

}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

<style>

.profile {

	font-family: "ubuntu condensed";
}

.profile img{

	width: 200px;
    height: 200px;
	border: 10px solid #FFF;
	border-radius: 50%;
	display:block;
	margin:auto;
}
.profile h2 {
	text-align:center;
	font-family:"sigmar one";
}
.profile h3 {
	text-align:center;
	font-family:"ubuntu condensed";
}


</style>


</head>
<body>

    

	 
	
	
	

	<div class="wrap">
	<a class="btn btn-sm btn-primary" href="students.php">Back</a>
		<div class="card shadow">
			<div class="card-body profile">
				
				<img class="shadow" src="photo/students/<?php echo $single_student['photo']; ?>" alt="">	
				<h2>ABEDIN KADER</h2>	
				<h3>Raju</h3>

				<table class="table table-striped">
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				<tr>
				<td>Name</td>
				<td>Name</td>
				</tr>
				</table>
	</div>
	      </div>
	            </div>
	

     <br>
     <br>
     <br>
     <br>
     <br>
     <br>





	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>