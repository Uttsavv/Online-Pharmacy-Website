<?php
include('partials/connecting_and_selectingDB.php');

//1 get the id
$id = $_GET['id'];
//2 sql query
$sql = "DELETE from admins where id = $id";
$res = mysqli_query($conn,$sql);
//3 re direct to the manage admin page
header('Location: http://localhost/DBMS-project/admin/manage-admins.php');
?>