<?php
include('partials/connecting_and_selectingDB.php');

//1 get the id
$id = $_GET['id'];
//2 sql query
$sql1 ="SELECT Image_Name from items where id = $id";
$res1 = mysqli_query($conn,$sql1);
$image_name = mysqli_fetch_assoc($res1)['Image_Name'];


$sql2 = "DELETE from items where id = $id";
$res2 = mysqli_query($conn,$sql2);

//3 Delete image from folder
unlink("../images/items/".$image_name);

//4 re direct to the manage categories page
header('Location: http://localhost/DBMS-project/admin/manage-items.php');
?>