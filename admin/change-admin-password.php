<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>
    <?php

    $id = $_GET['id'];
    //Getting the values form the id
    $sql = "select * from admins where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $username = $row['Username'];
        $old_password = $row['Password'];
    }
    ?>
    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Change Password</h2>
        <br>

        <form action="" method="post">
            <div class="add-admin-form">
                Username: <?php echo $username ?>
            </div>
            <div class="add-admin-form">
                Old Password:<input type="password" name="old-password-entered" id="admin-password" placeholder="Old Password">
            </div>
            <div class="add-admin-form">
                New Password:<input type="password" name="new-password" id="admin-password" placeholder="New Password">
            </div>
            <button class="btn-secondary" type='submit' name="change-password">Change Password</button>

        </form>
    </div>

</body>

</html>

<?php
//Processing the input from the form and adding it to the database

//Checking if the button is clicked
if (isset($_POST['change-password'])) {
    $old_password_entered = md5($_POST['old-password-entered']);
    $new_password = md5($_POST['new-password']);

    //Making the connection and selecting DB
    //code snippet added to menu of each page
    if($old_password==$old_password_entered)
    {
    $sql = "UPDATE admins SET 
            Password='$new_password' where id=$id";

      $res = mysqli_query($conn, $sql);
      header('Location: http://localhost/DBMS-project/admin/manage-admins.php');
    }
    else{
        echo "<br>"."<h2 class='fail-message main-content'>Old Password Doesn't Match</h2>";

    }
}
?>
