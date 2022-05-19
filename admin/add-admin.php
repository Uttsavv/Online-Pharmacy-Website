<html>

<head>
    <title>Add Admins</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Add Admins</h2>
        <br>
        <form action="" method="post">
            <div class="add-admin-form">
                Full Name:<input type="text" name="full-name" id="admin-full-name" placeholder="Your Full Name">
            </div>
            <div class="add-admin-form">
                Username:<input type="text" name="username" id="admin-username" placeholder="Your Username">
            </div>
            <div class="add-admin-form">
                Password:<input type="password" name="password" id="admin-password" placeholder="Your Password">
            </div>
                <button class="btn-secondary" type='submit' name="submit">Submit</button>

        </form>
    </div>


</body>

</html>

<?php
//Processing the input from the form and adding it to the database

//Checking if the button is clicked
if(isset($_POST['submit'])){
    
    $full_name = $_POST['full-name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    //Making the connection and selecting DB
    //code snippet added to menu of each page

    $sql = "INSERT INTO admins SET 
            Full_Name= '$full_name',
            Username='$username',
            Password='$password'";

$res = mysqli_query($conn, $sql);
header('Location: http://localhost/DBMS-project/admin/manage-admins.php');
}
?>



