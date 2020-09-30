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
				       height:15%;
					   width:100%;
					   margin:auto;
					   padding-top: 50px;
				 }
				 #but{ float:right;
				       margin-right: 30px;	
				 }
				 #tab2{ margin-top: 15px;
				 }
				 #ed{ text-decoration: none;
				    color: white;
					float: left;
					margin-right: 30px;
					font-size:20px;
		          }
				 
				 
				 
		 
         </style>
</head>
<body>

<div id="wel" align="center">
<h4><a id="ed" href="admindash.php">Back </a>
<input type="button" value="Logout" onclick="lo()" id="but"></h4>
<h1 align="center"> Welcome To Admin Dashboard</h1>

</div>

<form action="updatestu.php" method="post" >

   <center> <table id="tab2">
	    <tr>  
		   <th>Enter Standard</th>
		   <td><input type="number" name="std" required></td>&nbsp &nbsp &nbsp &nbsp
		   
		   <th>Enter Name</th>
		   <td><input type="text" name="name" required></td>
		   
		   <td colspan="2"><input type="submit" name="submit" value ="search"></td>
		 </tr>
	</table> </center>

</form>


<center><table border="1" align="center" width="90%">
  
       <tr>
	       <td>No.</td>
	       <td>Roll No.</td>
		   <td>Name</td>
		   <td>City</td>
		   <td>Parents Contact No.</td>
		   <td>Standard</td>
		   <td>Image</td>
		   <td>Password</td>
		   <td>Edit</td>
	   </tr>
	   
	    <?php
            include('../db.php');
            
           if(isset($_POST['submit'])){
			   
  
                $std=$_POST['std'];
	            $nm=$_POST['name'];
	 
	           $qry="SELECT * FROM `student` WHERE `standard`='$std' AND `name` LIKE '%$nm%'";
	 
	           $run=mysqli_query($con,$qry);
	 
	           $row=mysqli_num_rows($run);
	 
	         if($row<1){
		        echo"<tr><td colspan='8'>No Data Found.</tr></td>";	
	       }else{
			      $count = 0;
				 
				while($data= mysqli_fetch_assoc($run)){
					$count++; 	
				 ?>
				    <tr align="center">
	                     <td> <?php echo $count ; ?></td>
	             	     <td><?php echo $data['rollno']; ?></td>
	                     <td><?php echo $data['name']; ?></td>
		                 <td><?php echo $data['city']; ?></td>
		                 <td><?php echo $data['pcont']; ?></td>
		                 <td><?php echo $data['standard']; ?></td>
						 <td><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
						 <td><?php echo $data['password']; ?></td>
		                 <td><a href="updateform.php?sid=<?php echo $data['Id']; ?>">Edit</a></td>
	               </tr>
				 
				 <?php
			
				}
       	}
  }
?>
	    
</table></center>

<script>

     function lo(){
		 window.open(' ../logout.php','_self');
	 }

</script>

</body>
</html>












