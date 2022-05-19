
<html>

<head>
    <title>Update Admins</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>
    <!-- Main Content Section Start  -->
    <?php
    $id= $_GET['id'];
    //Getting the values form the id
    $sql = "select * from admins where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $full_name = $row['Full_Name'];
        $username = $row['Username'];
    }
?>

    <br>
    <div class="main-content">
        <h2>Update Admin</h2>
        <br>
        <form action="" method="post">
            <div class="add-admin-form">
                Full Name:<input type="text" name="full-name" id="admin-full-name" value='<?php echo $full_name ?>'>
            </div>
            <div class="add-admin-form">
                Username:<input type="text" name="username" id="admin-username" value="<?php echo $username ?>" >
            </div>
                <button class="btn-secondary" type='submit' name="update">Update Admin</button>

        </form>
    </div>

</body>

</html>

<?php
//Processing the input from the form and adding it to the database

//Checking if the button is clicked
if(isset($_POST['update'])){
    
    $full_name = $_POST['full-name'];
    $username = $_POST['username'];
    

    $sql = "UPDATE admins SET 
            Full_Name= '$full_name',
            Username='$username' WHERE id = $id";

$res = mysqli_query($conn, $sql);
header('Location: http://localhost/DBMS-project/admin/manage-admins.php');
}
?>



