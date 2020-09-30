<?php

session_start();

?>
<html>
<head>
      <title>Student Management System </title>
	  
	  <style>
	         
			  *{ margin: 0;
			     padding: 0;
			  }
			  #wel{ height: 20%;
			        width: 100%;
					background-color: black;
					color: white;
			  }
			 #an{ margin-left:1250px;
			      margin-top:80px;				  
			  }
			 #h{ margin-top:50px;
			     font-size: 50px;
			 }
			 a{ color: white;
			 }
		     #fom{ margin-top:50px;
			 }
			#tab{ border:1px solid black;
			      height: 300px;
				  width: 500px;
				  padding:20px;
			 }		
			#sub{ margin-left:100px;
			}
			#st{ margin:50px;
			}
				 
				   
       			 
				  
				 
			 
	  </style>
	  
</head>
<body>
<div id="wel">
<a id="an" href="login.php">Admin Login</a>

<center><h1 id="h">Welcome To Student Management System</h1></center>
</div>

<div id="fom">
<form action="show.php" method="post">
	  <center><table id="tab" >
	       <tr>
		      <td colspan="2"><center><h2>Student Information :</center></h2></td>
		   </tr>
            <tr>
                 <td>Enter Roll No. :</td>
                 <td><input type="number" name="roll" required="required"></td>
            </tr>			
			<tr>
                 <td>Enter Password :</td>
                 <td><input type="password" name="pass" required="required"></td>
				 <td><input type="checkbox" onclick="see()"> Show Password
            </tr>
			<tr> 
			     <td colspan="2" id="sub"><center><input type="submit" name="submit" onclick="show()" value="Login"></center></td>
			</tr>
		</table></center>	
		
 </form>
</div>
<script>
     function show(){
		 
		 open("show.php","_self");
	 }
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