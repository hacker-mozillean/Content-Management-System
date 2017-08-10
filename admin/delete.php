<?php
include('includes/connect.php');

$delete_id =  $_GET['del'];
$delete_query = "delete from posts where post_id = '$delete_id'";
if(mysql_query($delete_query)){
	echo "<script> window.open('index.php?deleted=A post has been deleted...','_self') </script>" ;
}
?>