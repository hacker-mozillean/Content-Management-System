<html>
<head>
	<title>Serach Results</title>
	<link rel="stylesheet", href="style.css">
</head>
<body>
<!--This is top area -->
<div id = "top"> <p> Top bar </p> </div>

<!--This is header area -->

<!--This is navigation area -->
<div> <?php include("includes/navbar.php"); ?></div>

<!--This is sidebar area -->
<div class="cont"> <?php include("includes/sidebar.php"); ?></div>

<!--This is post area -->
<div class = "post_body">
<?php 
include("includes/connect.php");
if(isset($_GET['submit'])){
	$search_id = $_GET['search'];
	$query = "select  * from posts where post_title like '%$search_id %'";
	$run = mysql_query($query);
	
	while($row = mysql_fetch_assoc($run)){
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
	}
?>

<h2> 
<a href= "pages.php?id=<?php echo $post_id;?>" <?php echo $post_title ; ?>  </a> 
</h2>


<img src="images/<?php echo $post_image; ?>"  width="300" height="300" />

<p align= "justify">
<?php echo $post_content ; ?>
</p>

<p align= "right">
<a href= "pages.php?id= <?php echo $post_id ; ?>" > Read more </a>
</p>

<?php } ?>
</div>

<!--This is footer area -->
<div> <?php include("includes/footer.php"); ?></div>

</body>
</html>  