<?php

  session_start();
  
  if(isset($_SESSION['uid'])){
	  
	  echo " ";
  }else{
	  header('location: ../login.php');
  }
  
?>
<?php

   include('../db.php');
   
   $id=$_REQUEST['sid'];
   
   $qry="DELETE FROM `student` WHERE `Id`='$id'";
   
   $run=mysqli_query($con,$qry);
   
   if($run== true){
	   
	   ?>
	    <script>
	        alert("Data Deleted Sucessfully. ");
			window.open("deletestu.php","_self");
	    </script>
	   <?php   
   }else{
	   echo"Error !!";
   }



?>