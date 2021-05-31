<?php include_once "app/autoload.php"; ?>


<?php 
	 
	 /**
	  * Add new student form isset
	  */

	   if( isset($_POST['add'])){

		   $edit_id = $_GET['edit_id'];

		   //get value

		   $name = $_POST['name'];
		   $email = $_POST['email'];
		   $cell = $_POST['cell'];
		   $uname = $_POST['uname'];
		   $age = $_POST['age'];
           
		   if($_POST['gender']){
            $gender = $_POST['gender'];
		   }

		   $shift = $_POST['shift'];
		   $location = $_POST['location'];
		    
		   
		
		   

		   /**
			* form validaion
		    */
            if( empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) || empty($gender) ||empty($shift) || empty($location)){
            
			$mess = validationMsg('All fields are Required');

			}elseif(filter_var( $email , FILTER_VALIDATE_EMAIL) ==false ){

				$mess = validationMsg('Invalid Email Address');	

			}elseif( $age <= 5 || $age >= 12 ){

				$mess = validationMsg('Your age is not okay for our school','warning');
			}else{
				$photo_name='';
				if(empty($_FILES['new_photo']['name'])){
			    $photo_name= $_POST['old_photo'];
				}else{
					// image update

				$file_name =$_FILES['new_photo']['name'];
				$file_tmp_name =$_FILES['new_photo']['tmp_name'];
				$file_size =$_FILES['new_photo']['size'];
	 
				$photo_name= md5(time() . rand()) . $file_name;
				move_uploaded_file($file_tmp_name, 'photo/students/' . $photo_name);

				}
                 $sql = "UPDATE students SET name='$name',email='$email',cell='$cell',uname='$uname',age='$age',gender='$gender',shift='$shift',location='$location',photo='$photo_name' WHERE id=' $edit_id'";
				$connection -> query($sql);

				

               



				$mess = validationMsg('Data Updated','success');
			}
			

	   }
	 
	 
	 
	 
	 ?>
	 <?php

if(isset ($_GET['edit_id'])){

  $edit_id = $_GET['edit_id'];

  $sql = "SELECT * FROM students WHERE id ='$edit_id'";
	  $data= $connection -> query($sql);

	 $single_data= $data -> fetch_assoc();

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
</head>
<body>

    

	 
	
	

	<div class="wrap">
	<a class="btn btn-sm btn-primary" href="students.php">Back</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Update Student</h2>
				<?php 
				if( isset($mess)){
                 
					echo $mess;

				}
				
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $single_data['name']; ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $single_data['email']; ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo $single_data['cell']; ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" value="<?php echo $single_data['uname']; ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="<?php echo $single_data['age']; ?>" type="text">
					</div>

                    <div class="form-group">
						<label for="">Gender</label> <br>
						<input name="gender" <?php if($single_data['gender'] == 'Male') {echo "checked";}   ?> class="" type="radio" value="Male" id="male" > <label for="male">Male</label>
						<input name="gender" <?php if($single_data['gender'] == 'Female') {echo "checked";}   ?>  class="" type="radio" value="Female" id="female"  > <label for="female">Female</label>
					</div>

					<div class="form-group">
					<label for="">Shift</label>

					<select class="form-control" name="shift" id="">
					<option value="">-Select-</option>
					<option <?php if($single_data['shift'] == 'Day') {echo "selected";}   ?> value="Day">Day</option>
					<option <?php if($single_data['shift'] == 'Evening') {echo "selected";}   ?> value="Evening">Evening</option>
					</select>
					
					
					</div>

					

					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
						<option value="">-Select-</option>
						<option <?php if($single_data['location'] == 'Dhaka') {echo "selected";}   ?> value="Dhaka">Dhaka</option>
						<option <?php if($single_data['location'] == 'Chittagong') {echo "selected";}   ?>  value="Chittagong">Chittagong</option>
						<option <?php if($single_data['location'] == 'Rajshahi') {echo "selected";}   ?> value="Rajshahi">Rajshahi</option>
						<option <?php if($single_data['location'] == 'Khulna') {echo "selected";}   ?> value="Khulna">Khulna</option>
						<option <?php if($single_data['location'] == 'Barishal') {echo "selected";}   ?> value="Barishal">Barishal</option>
						<option <?php if($single_data['location'] == 'Sylhet') {echo "selected";}   ?> value="Sylhet">Sylhet</option>
						<option <?php if($single_data['location'] == 'Rongpur') {echo "selected";}   ?> value="Rongpur">Rongpur</option>
						<option <?php if($single_data['location'] == 'Mymensingh') {echo "selected";}   ?> value="Mymensingh">Mymensingh</option>
						
						
						</select>
						
					</div>
                      
                     <div class="form-group">
					 <img style ="width:200px;" src="photo/students/<?php echo $single_data['photo']; ?>" alt="">
					 <input name ="old_photo" value="<?php echo $single_data['photo'];?>" type="hidden">
					 </div>

					<div class="form-group">
						<label for="">Photo</label>
						<input name="new_photo" class="form-control-file" type="file">
					</div>

					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Update Now">
					</div>
				</form>
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