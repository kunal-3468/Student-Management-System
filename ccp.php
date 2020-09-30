<?php

session_start();
if(isset($_SESSION['uid'])){
	 echo "";
}else{
	
	header('location:cp.php');
}
?>
<html>
<head>
<title>Change Password</title>
</head>
<body>
<center>
<h1>Change Password</h1>
<form action="ccp.php" method="post">
  
    <table>
		   <td>Enter New Password:</td>
           <td><input type="password" name="pass" id="pass" required></td>
		   <td><input type="checkbox" onclick="see()"> Show Password
        </tr>
		<tr>
		  <td colspan="2"><center><input type="submit" name="login" value="Change Password"></center></td>
		</tr>
     </table>
</form>	 
</center>
<script>
         function see(){
			 
			 var a= document.getElementById("pass");
			 
			 if(a.type==="password"){
				 
				 a.type="text";
			 }else{
				 a.type="password";
			 }
		 }

</script>

</body>
</html>
<?php
  
 if(isset($_POST['login'])){
	 
	 include('db.php');
	
	  $pass=$_POST['pass'];
	  $aid= $_SESSION['uid'];
	  
	  $qry="UPDATE `student` SET `Password`='$pass' WHERE `Id`='$aid'";
	 
	  $run=mysqli_query($con,$qry);
	  
      if($run == true){
		   ?>
		   <script>  
			     alert("Password Changed Sucessfully.");
				 window.open("index.php","_self")
		      </script>
			  <?php
			  session_destroy();
	  }else{
		  echo"Error !!";
	  }
	 
	 
 }
?>