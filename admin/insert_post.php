<?php
session_start();
if( !isset($_SESSION['user_name'])) {
	header("location: login.php");
}
else{
?>
<html>
	<head>
		<title> Insert new Post </title>
	</head>
<body>
<form method="post" action="insert_post.php" enctype="multipart/form-data">

<table align= "center" border="2" width="1200" >
	<tr>
		<td align="center" colspan="5" bgcolor="yellow" > <h1> My first post </h1> </td>		
	</tr>
	
	<tr>
		<td> Post title: </td>
		<td> <input type="text" name="title"> </td> 	
	</tr>
	
	<tr>
		<td> Post author: </td>
		<td> <input type="text" name="author"> </td> 	
	</tr>
	
	<tr>
		<td> Author Image: </td>
		<td> <input type="file" name="image"> </td> 	
	</tr>
	
	<tr>
		<td> Post content: </td>
		<td> <textarea name="content" cols="10" rows="10"> </textarea> </td> 	
	</tr>
	
	<tr>
		<td align="center" colspan="5"> <input type="submit" name="submit" value="Publish Now"> </td> 	
	</tr>
</table>	
</form>

<?php
include("includes/connect.php");
if (isset($_POST['submit'])) {
	 $title = $_POST['title'];
	 $date = date('m-d-y');
	 $author = $_POST['author'];
	 $content = $_POST['content'];
	 $image_name = $_FILES['image']['name'];
	 $image_type = $_FILES['image']['type'];
	 $image_size = $_FILES['image']['size'];
	 $image_tmp = $_FILES['image']['tmp_name'];
	 
	 if( $title == '' or $author == '' or $content == ''){
		echo "<script> alert('No field can be empty') </script>" ; 
		exit();
	 }
	 
	 if( $image_type =="image/jpeg" or $image_type == "gif" or
	 $image_type == "png"){
		
		if($image_size <  5000000){
			move_uploaded_file($image_tmp , "../images/$image_name");
	    }
		else{
			echo "<script>alert('Image exceeds size of 50mb')</script>";
		}
	 }
	 
	 else{
		 echo "<script>alert('".$image_type."')</script>";
		echo "<script>alert('Invalid image type')</script>";	
	}
	
	$query = "insert into posts(post_title , post_date, post_author,post_image,
	post_content) values ('$title', '$date ', '$author', '$image_name', '$content')";
	
	if (mysql_query($query)){
		echo "<script>window.open('index.php?published=Post has been published','_self') </script>";
	}	
}	
?>
</body>
</html>
<?php } ?> 