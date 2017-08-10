<html>
<head>
	<title>My Own news</title>
	<link rel="stylesheet", href="style.css">
	<script>
		function myclock(){
			time = new Date();
			hours = time.getHours();
			mins = time.getMinutes();
			sec = time.getSeconds();
			
			if( sec < 10){
				sec = "0" + sec ;
			}
			
			if( mins < 10){
				mins =  sec ;
			}
			
			document.getElementById("clock").innerHTML = hours + ":" + mins + ":" + sec ; 
			
			timer = setTimeout( function() { myclock()} , 500 );	
		} 
	</script> 
</head>
<body onload = "myclock()" >
<!--This is top area -->
<div id = "top"> 
<p> Todays date is: &nbsp;&nbsp; <?php echo date("l jS ,F Y"); ?> </p>

</div>

<!--This is header area -->

<!--This is navigation area -->
<div> <?php include("includes/navbar.php"); ?></div>

<!--This is sidebar area -->
<div class="cont"> <?php include("includes/sidebar.php"); ?></div>

<div class="post_body">
	<form action="contact.php" method="post">
		<table width="400" align="center" >
			<tr> 
				 <td> <h2> Contact Us </h2> </td> 
			</tr>
			
			<tr>
				<td align="right"> <strong> Your email <strong></td>
				<td> <input type="email" name="email"></td>
			</tr>
			
			
			<tr>
				<td align="right"> <strong> Subject </strong></td>
				<td> <input type="text" name="subject"> </td>
			</tr>
			
			<tr>
				<td align="right"> <strong> Enter your message </strong></td>
				<td> <textarea cols="30" rows="10" name="message">
				</textarea>
				</td>
			</tr>
			
			
			<tr>
				<td> <input align="center" colspan="5" type="submit" name="send_email" value="Send Email"> </td>
			</tr>
		</table>
	</form>
</div>

<?php
if( isset( $_POST['send_email'] )){
	$sender_email = $_POST['email'];
	$subject = $_POST['subject'];
	$mes = $_POST['message'];
	$to = "shekhargpt5@gmail.com";
	
	$message = "You have got an Email From: ".$mes;
	
	if($sender_email=='' or $subject =='' or $mes =='' ){
		echo "<script> alert('No fields can be empty'); </script> ";
		exit();
	}
	mail( $to , $subject , $message , $sender_email );
	
	$to_sender = $_POST['email'];
	$subj = "Testing free emails";
	$mess = "Your query has been recieved. We will get back in touch with you soon!";
	$from = "shekhargpt5@gmail.com";
	
	mail($to_sender, $subj, $mess, $from);
	
	echo "<center> <h2> Email sent. We will get back to you soon. A confirmation mail
						will be sent to you </h2> </center>";
}
?>
<!--This is footer area -->
<div> <?php include("includes/footer.php"); ?>
<div>
<p id = "clock" class="clocks"> </p>
</div>
</div>

</body>
</html>  