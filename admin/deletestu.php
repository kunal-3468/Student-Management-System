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
				 #an{ text-decoration: none;
				    color: white;
					float: left;
					margin-right: 30px;
					font-size:20px;
		          }
				 
				 
				 
		 
         </style>
</head>
<body>

<div id="wel" align="center">
<h4><a id="an" href="admindash.php">Back </a>
<input type="button" value="Logout" onclick="lo()" id="but"></h4>
<h1 align="center"> Welcome To Admin Dashboard</h1>

</div>

<script>

     function lo(){
		 window.open(' ../logout.php','_self');
	 }

</script>

<center><table border="1" align="center" width="90%" style="margin-top:15px;">
  
       <tr>
	       <td>Roll No.</td>
		   <td>Name</td>
		   <td>City</td>
		   <td>Parents Contact No.</td>
		   <td>Standard</td>
		   <td>Image</td>
		   <td>Password</td>
		   <td>Delete</td>
	   </tr>
	         <?php

                   include('../db.php');
						
                   $qry = "SELECT * FROM `student` order by name";
   
                   $run=mysqli_query($con,$qry);
                    
				    $row=mysqli_num_rows($run);	
					
                    if($row<1){
	   
	                echo "<tr><td colspan='8'>No Data Yet !!</tr></td> ";
                     }else{
	                     
	                     while($data = mysqli_fetch_assoc($run)){
	                    ?>
						 <tr align="center">
	             	     <td><?php echo $data['rollno']; ?></td>
	                     <td><?php echo $data['name']; ?></td>
		                 <td><?php echo $data['city']; ?></td>
		                 <td><?php echo $data['pcont']; ?></td>
		                 <td><?php echo $data['standard']; ?></td>
						 <td><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
						 <td><?php echo $data['password']; ?></td>
		                 <td><a href="delete.php?sid=<?php echo $data['Id']; ?>">Delete</a></td>
	                     </tr>
						<?php
						 }
                 }
        ?>
</table></center>


</body>
</html>
