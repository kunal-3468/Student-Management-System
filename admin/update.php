<?php

include('../db.php');
    if(isset($_POST['submit'])){
		
		$roll=$_POST['no'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$number=$_POST['num'];
		$std=$_POST['std'];
		$pass=$_POST['pass'];
		$sid=$_POST['sid'];
		$picname= $_FILES['img']['name'];
		$temppic= $_FILES['img']['tmp_name'];
		
		move_uploaded_file($temppic,"dataimg/$picname");
		
		$qry="UPDATE `student` SET `rollno`=$roll,`name`='$name',`city`='$city',`pcont`='$number',`standard`='$std',`image`='$picname',`password`='$pass' WHERE `Id`='$sid'";
		
		$run=mysqli_query($con,$qry);
		
		if($run== true){
			?>
			   <script>
			        alert("Data Updated Successfully.");
					window.open("updatestu.php","_self");
			   </script>
			<?php
		}else{
			
			echo"Error";
		}
	}

?>