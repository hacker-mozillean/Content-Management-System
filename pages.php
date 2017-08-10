<html>
<head>
	<title>My Own news</title>
	<link rel="stylesheet", href="style.css">
</head>
<body>
<!--This is top area -->
<div id = "top"> <p> Top bar </p> </div>

<!--This is header area -->

<!--This is navigation area -->
<div> <?php include("includes/navbar.php"); ?></div>

<!--This is sidebar area -->
<div> <?php include("includes/sidebar.php"); ?></div>

<div class="post_body" >
<?php
include("includes/connect.php");

$page_id = $_GET['id'];
$query = "select * from posts where post_id ='$page_id'";
$run = mysql_query($query);

while( $row = mysql_fetch_array($run) ) {
	
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$content = $row['post_content'];
	
?>
<h2> 
<?php echo $title ; ?> </a> 
</h2>

<p>
Published on:&nbsp; &nbsp; <b> <?php echo $date; ?> </b> 
</p>

<p align = "center">
Published by:&nbsp; &nbsp; <b> <?php echo $author; ?> </b>
</p>

<img src="images/<?php echo $image; ?>"  width="300" height="300" />

<p align= "justify">
<?php echo $content; ?>
</p>
</div>
<?php } ?>
<!--This is footer area -->
<div> <?php include("includes/footer.php"); ?></div>
</body>
</html>   