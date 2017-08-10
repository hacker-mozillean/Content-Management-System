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

<!--This is post area -->
<div> <?php include("includes/post_body.php"); ?></div>
</div>

<!--This is footer area -->
<div> <?php include("includes/footer.php"); ?>
<div>
<p id = "clock" class="clocks"> </p>
</div>
</div>

</body>
</html>  