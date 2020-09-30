<?php

 session_start();
 
 if(isset($_SESSION['uid'])){
	 echo"";
 }else{
	 header('location: ../login.php');
 }

?>  
<html>
<head>
<title>Admin Dashboard</title>
     
	     <style>
		        
				 #wel{ background-color:olive;
				       height:20%;
					   width:100%;
					   margin:auto;
					   padding-top: 50px;
				 }
				 #but{ float:right;
				       margin-right: 30px;	
				 }
				 #tab2{ margin-left:10px;
				        margin-top: 50px;
				 }
				 a{ text-decoration: none;
				    color: white;
					float: left;
					margin-right: 30px;
					font-size:20px;
		          }
				 
				 
				 
		 
         </style>
</head>
<body>

<div id="wel" align="center">
<h4><a href="admindash.php">Back </a>
<input type="button" value="Logout" onclick="lo()" id="but"></h4>
<h1 align="center"> Welcome To Admin Dashboard</h1>

</div>

<form action="addstu.php" method="post" enctype="multipart/form-data">
	<center><table id="tab2"border="1">
	     <tr>
		     <td class="no">Roll No.</td>
			 <td class="anc"><input type="number" name="no" placeholder="Enter Roll No" required></td>
		 </tr>
		 <tr>
		     <td class="no">Full Name</td>
			 <td class="anc"><input type="text" name="name" placeholder="Enter Your Name" required></<td>
		 </tr>
		 <tr>
		     <td class="no">City</td>
			 <td class="anc"><input type="text" name="city" placeholder="Enter City" required></</td>
		 </tr>
		 <tr>
		     <td class="no">Parents Contact No.</td>
			 <td class="anc"><input type="text" name="num" placeholder="Enter contact number" required></td>
		 </tr>
		 <tr>
		     <td class="no">Standard</td>
			 <td class="anc"><input type="number" name="std" placeholder="Enter standard" required><td>
		 </tr>
		 <tr>
		     <td class="no">Upload Image</td>
			 <td class="anc"><input type="file" name="img" required></td>
		 </tr>
		 <tr>
		     <td class="no">Password</td>
			 <td class="anc"><input type="text" name="pass" placeholder="Enter Password" required><td>
		 </tr>
		 <tr>
		     <td colspan="2"><center><input type="submit" value="submit" name="submit"></center></td>
		 </tr>
	 </table></center>
</form>

<script>

     function lo(){
		 window.open(' ../logout.php','_self');
	 }

</script>

</body>
</html>
<?php

include('../db.php');
    if(isset($_POST['submit'])){
		
		$roll=$_POST['no'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$number=$_POST['num'];
		$std=$_POST['std'];
		$pass=$_POST['pass'];
		$picname=$_FILES['img']['name'];
		$temppic=$_FILES['img']['tmp_name'];
		
		move_uploaded_file($temppic,"dataimg/$picname");
		
		$qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`, `password`) VALUES ('$roll','$name','$city','$number','$std','$picname','$pass')";
		
		$run=mysqli_query($con,$qry);
		
		if($run== true){
			?>
			   <script>
			        alert("Data Inserted Successfully.");
					window.open("addstu.php","_self");
			   </script>
			<?php
		}else{
			
			echo"Error";
		}
		
	}

?>
