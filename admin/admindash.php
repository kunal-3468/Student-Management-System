<h2>
<?php

 session_start();
 
 if(isset($_SESSION['uid'])){
	echo"";
	 }else{
	 header('location: ../login.php');
 }

?>  
</h2>
<html>
<head>
<title>Admin Dashboard</title>
     
	     <style>
		        
				 #wel{ background-color:olive;
				       height:20%;
					   width:100%;
				 }
				 #but{ margin-left: 1280px;
				       margin-top:10px;
				 }
				 .no{ font-size: 40px;
				 }
				 table{ margin-left:10px;
				 }
				 .anc{ font-size: 25px;
				 }
		         a{ text-decoration: none;
		          }
		 
         </style>
</head>
<body>

<div id="wel">
<input type="button" value="Logout" onclick="lo()" id="but">
<h1 align="center"> Welcome To Admin Dashboard</h1>
</div>

<div>
	<table>
	     <tr>
		     <td class="no">1.</td>
			 <td class="anc"><a href="addstu.php">Insert Student Details</a></td>
		 </tr>
		 <tr>
		     <td class="no">2.</td>
			 <td class="anc"><a href="updatestu.php">Update Student Details</a></td>
		 </tr>
		 <tr>
		     <td class="no">3.</td>
			 <td class="anc"><a href="deletestu.php">Delete Student Details</a></td>
		 </tr>
	 </table>
</div>

<script>

     function lo(){
		 window.open(' ../logout.php','_self');
	 }

</script>

</body>
</html>