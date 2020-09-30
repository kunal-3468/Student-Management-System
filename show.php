<?php

session_start();


?>
<html>
<head>
<title>Student Details</title>
     
	     <style>
		        
				 #wel{ background-color: black;
				       height:20%;
					   width:100%;
					   margin:auto;
					   padding-top: 50px;
					   color: white;
				 }
				 #but{ float:right;
				       margin-right: 30px;	
				 }
				 #tab2{ margin-left:10px;
				        margin-top: 50px;
				 }
				 
         </style>
</head>
<body>

<div id="wel" align="center">
<input type="button" value="Logout" onclick="lo()" id="but"></h4>
<h1 align="center"> Welcome Student </h1>

</div>

<script>

     function lo(){
		 window.open('logout1.php','_self');
	 }

</script>

</body>
</html>


<?php
   		
		if(isset($_POST['submit'])){
		
		include('db.php');
		
		$roll=$_POST['roll'];
		$pass=$_POST['pass'];
		
		$qry="SELECT * FROM `student` WHERE `rollno`='$roll' AND `password`='$pass' ";
		
		$run=mysqli_query($con,$qry);
		
		$row=mysqli_num_rows($run);
		
		if($row<1){
	             ?>
				     <script>
					       alert("No Data Found");
						   open("index.php","_self");
					      
	                 </script>
			      <?php
                   }else{
	                        while($data = mysqli_fetch_assoc($run)){
	                    ?>
						 <table align="center" border="1" align="center" width="95%" style="margin-top:15px;">
						 <tr>
	                     <td>Roll No.</td>
		                 <td>Name</td>
		                 <td>City</td>
		                 <td>Parents Contact No.</td>
		                 <td>Standard</td>
		                 <td>Image</td>
	                     </tr>
						 <tr >
	             	         <td><?php echo $data['rollno']; ?></td>
	                         <td><?php echo $data['name']; ?></td>
		                     <td><?php echo $data['city']; ?></td>
		                     <td><?php echo $data['pcont']; ?></td>
		                      <td><?php echo $data['standard']; ?></td>
						     <td><img src="admin/dataimg/<?php echo $data['image']; ?>" style="max-width: 100px; max-height:100px;"></td>
						  </tr>
						 </table>
						 <a href="cp.php">Change Password</a>
						<?php
					 }
				 }
		}
    ?>