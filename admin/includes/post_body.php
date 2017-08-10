<div class="post_body">  
<?php
include("includes/connect.php");

//$query = "select * from posts order by 1 DESC";
$query = "select * from posts order by rand() LIMIT 0,4";
$run = mysql_query($query); 

while( $row = mysql_fetch_array($run) ) {
	$post_id = $row['post_id'];
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$content = substr($row['post_content'] , 0 , 200);
?>
<h2> 
<a href= "pages.php?id=<?php echo $post_id;?>" <?php echo $title ; ?> </a> 
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

<p align= "right">
<a href= "pages.php?id= <?php echo $post_id ; ?>" > Read more </a>
</p>

<?php } ?>
</div>