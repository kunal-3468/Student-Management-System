<?php

 session_start();
 
 if(isset($_SESSION['uid'])){
	 echo"";
 }else{
	 header('location: ../login.php');
 }

?>  
<?php
      
	   include('../db.php');
	   
	   $sid = $_GET['sid'];
	   
	   $qry="SELECT * FROM `student` WHERE `Id`='$sid' " ;
	   
	   $run=mysqli_query($con,$qry);
	   
	   $data=mysqli_fetch_assoc($run);
	   

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

<form action="update.php" method="post" enctype="multipart/form-data">
	<center><table id="tab2"border="1">
	     <tr>
		     <td class="no">Roll No.</td>
			 <td class="anc"><input type="number" name="no" value="<?php echo $data['rollno']; ?>" required></td>
		 </tr>
		 <tr>
		     <td class="no">Full Name</td>
			 <td class="anc"><input type="text" name="name" value="<?php echo $data['name']; ?>" required></<td>
		 </tr>
		 <tr>
		     <td class="no">City</td>
			 <td class="anc"><input type="text" name="city" value="<?php echo $data['city']; ?>" required></</td>
		 </tr>
		 <tr>
		     <td class="no">Parents Contact No.</td>
			 <td class="anc"><input type="text" name="num" value="<?php echo $data['pcont']; ?>" required></td>
		 </tr>
		 <tr>
		     <td class="no">Standard</td>
			 <td class="anc"><input type="number" name="std" value="<?php echo $data['standard']; ?>" required><td>
		 </tr>
		 <tr>
		     <td class="no">Upload Image</td>
			 <td class="anc"><input type="file" name="img" value="<?php echo $data['image']; ?>" required></td>
		 </tr>
		 <tr>
		     <td class="no">Password</td>
			 <td class="anc"><input type="text" name="pass" value="<?php echo $data['password']; ?>" required></td>
		 </tr>
		 <tr>
		     <td><input type="hidden" value="<?php echo $data['Id']; ?>" name="sid"></td>
		     <td colspan="2"><center><input type="submit" value="submit" name="Update"></center></td>
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