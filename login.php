<?php

session_start();

if(isset($_SESSION['uid'])){
   header('location:admin/admindash.php');	
}else{
	
}
?>
<html>
<head>
<a style="float: left;" href="index.php">Back</a>
<title>Admin Login</title>

</head>
<body>
<center>
<h1>Admin Login</h1>
<form action="login.php" method="post">
  
    <table>
        <tr>
		   <td>Username:</td>
           <td><input type="text" name="un"></td>
        </tr>
        <tr>
		   <td>Password:</td>
           <td><input type="password" name="pass" id="password"></td>
		   <td><input type="checkbox" onclick="see()"> Show Password
        </tr>
		<tr>
		  <td colspan="2"><center><input type="submit" name="login" value="Login"></center></td>
		</tr>
     </table>
	 <br><br>
	 <a href="admin/change.php">Change Password</a>
</form>	 
</center>

<script>
      
	   function see(){
		   
		   var a= document.getElementById("password");
		   
		   if(a.type === "password"){
			   a.type= "text";
		   }else{
			   a.type= "password";
		   }
		   
		   
	   }

</script>

</body>
</html>
<?php

include('db.php');

if(isset($_POST['login'])){
	
     $name=$_POST['un'];
     $pass=$_POST['pass'];

     $query="SELECT * FROM `admin` WHERE `Username`='$name' AND `Password`='$pass'";

     $run=mysqli_query($con,$query);
	 
	 $row=mysqli_num_rows($run);
	 
	 if($row<1){
		 
		 ?>   
		 <script>
		     alert("Incorrect Username & Password !!");
			 window.open('login.php','_self');
		 </script>
		 <?php
	 }else{
		   
		   $data=mysqli_fetch_assoc($run);
		   
		   $id=$data['Id'];
		   
		   $_SESSION['uid']=$id;
		   
		   header('location:admin/admindash.php');
	 }
	 	
}	

?>