<?php

session_start();
if(isset($_SESSION['uid'])){
   header('location:ccp.php');	
}else{
	
}
?>
<html>
<head>
<title>Change Password</title>
</head>
<body>
<center>
<h1>Change Password</h1>
<form action="cp.php" method="post">
     
    <table>
        <tr>
		   <td>Enter Current Password:</td>
           <td><input type="password" name="pass" id="pass"></td>
		   <td><input type="checkbox" onclick="see()"> Show Password
        </tr>
		<tr>
		  <td colspan="2"><center><input type="submit" name="login" value="Change"></center></td>
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

include('db.php');

if(isset($_POST['login'])){
	
     $pass=$_POST['pass'];

     $query="SELECT * FROM `student` WHERE`password`='$pass'";

     $run=mysqli_query($con,$query);
	 
	 $row=mysqli_num_rows($run);
	 
	 if($row<1){
		 
		 ?>   
		 <script>
		     alert("Incorrect Password !!");
			 window.open("show.php","_self");
		 </script>
		 <?php
	 }else{
		   
		   $data=mysqli_fetch_assoc($run);
		   
		   $id=$data['Id'];
		   
		   $_SESSION['uid']=$id;
		   
		   header('location:ccp.php');	   
	 } 	
}
?>