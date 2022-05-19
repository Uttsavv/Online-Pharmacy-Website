<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../login.css">

</head>

<body>
    <div class="box">
        <div class="main-container">
            <h2>Admin Login</h2>
            <form action="" method="post">
                <div>
                    Username:<input type="text" name="entered-username" placeholder="Username">
                </div>
                <div>
                    Password:<input type="password" name="entered-password" placeholder="Password">
                </div>
                <div class="btn">
                    <button class="login-btn" name="login-btn" type="submit">Login</button>
                </div>
            </form>
        </div>
        <!-- Footer Section Start  -->
        <?php include('partials/footer.php'); ?>
        <!-- Footer Section End  -->
    </div>

</body>

<?php
include('partials/connecting_and_selectingDB.php');
if (isset($_POST['login-btn'])) {
    $entered_username = $_POST['entered-username'];
    $entered_password = md5($_POST['entered-password']);

    //Checking if user and pass are correct
    $sql = "SELECT * from admins WHERE Username = '$entered_username' and Password = '$entered_password'";
    //running the query
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 1) {
        header('Location: http://localhost/DBMS-project/admin/index.php');
    } else {
        echo "Wrong Username or Password Entered";
    }
}

?>

</html>