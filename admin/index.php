<?php
session_start();
if( !isset($_SESSION['user_name'])) {
	header("location: login.php");
}
else{
?>

<html> 
	<head>
		<title> Admin Panel </title>
		<link rel ="stylesheet" href="admin_style.css" >
	</head>
<body>
	<header>
		<a href="index.php"> <h1> Welcome to the Shekhar world of blogging </h1>
		</a>
	</header>
	

	<aside> 
		Welcome Back<font color="red" size="20">
		<h3> <?php echo $_SESSION['user_name']; ?> </h3>
 		</font>
		<h2> Contents to be managed: </h2>
		<h3><a href= "logout.php"> Admin Logout</a> </h3>
		<h3><a href= "index.php?view=view"> View Posts</a> </h3>
		<h3><a href= "index.php?insert=insert"> Insert Posts</a> </h3>
	</aside>
	
	<center> 
	<h2> This is your admin panel </h2>
	<p> You can manage any post from here </p>
	<h1> <?php echo @$_GET['deleted'] ?> </h1>
	</center>
<?php
	if(isset($_GET['insert'])){
			include("insert_post.php");		
	}
?>
<?php if(isset($_GET['view'])) { ?>	
<table width="800" align="center" border="3">
	<tr>
		<td align= "center" colspan="9" bgcolor="orange" > <h2> View All Posts </h2></td>
	</tr>
	
	<tr>
		<th> Post no </th>
		<th> Post title </th>
		<th> Post date </th>
		<th> Post author </th>
		<th> Post image </th>
		<th> Post content </th>
		<th> Edit </th>
		<th> Delete </th>
	</tr>
<?php
include("includes/connect.php");
if(isset($_GET['view'])){
	$i = 1;
	$query = "select * from posts order by 1 DESC";
	$run = mysql_query($query);
	
	while($row = mysql_fetch_assoc($run)){
		$id = $row['post_id'];
		$title = $row['post_title'];
		$date = $row['post_date'];
		$author = $row['post_author'];
		$image = $row['post_image'];
		$content = substr( $row['post_content'], 0, 50);	
?>	
	<tr>
		<td> <?php echo $i++; ?></td>
		<td> <?php echo $title; ?></td>
		<td> <?php echo $date; ?></td>
		<td> <?php echo $author; ?></td>
		<td> <img src="../images/<?php echo $image?>" width="50" height="50" ></td>
		<td> <?php echo $content; ?></td>
		<td> <a href= "edit.php?edit=<?php echo $id?>"> Edit </a> </td>
		<td> <a href= "delete.php?del=<?php echo $id?>"> Delete </a> </td>
	</tr>
<?php }} }?>
	
</table>
</body>
</html>
<?php } ?> 