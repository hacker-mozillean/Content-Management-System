<?php
session_start();
?>
<html>
<head>
	<title> Admin Login </title>
</head>
<body>

	<form action="login.php" method="post">
		<table width="1000" height="400" align ="center" border="10">
			<tr>
				<td colspan="5" align="center" bgcolor="gray"> <h1> Admin Login  </h1> </td>
			</tr>
			
			<tr>
				<td align="center"> User Name </td>
				<td> <input type="text" name="user_name" placeholder="Please enter your name" > </td>
			</tr>
			
			<tr>
				<td align="center"> User password </td>
				<td> <input type="password" name="user_pass" placeholder="Please enter your password" > </td>
			</tr>
			
			<tr>
				<td align="center" colspan="5"> <input type="submit" name="login" value="login" ></td>
			</tr>
		</table>
	</form>	
</body>
</html>

<?php
include("includes/connect.php");
if(isset($_POST['login'])){
	
	$user_name = mysql_real_escape_string( $_POST['user_name'] );
	$user_pass = mysql_real_escape_string( $_POST['user_pass'] );
	
	$encrypted = md5($user_pass);
	
	$login_query = "select * from admin_login where user_name='$user_name' 
					AND user_password='$user_pass' ";
	$run = mysql_query($login_query);
	
	if(mysql_num_rows($run)> 0){
		
		$_SESSION['user_name'] = $user_name;
		echo "<script> window.open('index.php', '_self') </script> ";	
	}
	
	else{
		echo "<script> alert('Username or password are incorrect'); </script>" ;	
	}
}
?>