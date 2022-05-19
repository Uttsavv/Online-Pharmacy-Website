<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>
    <!-- Main Menu Start -->
    <?php include('partials/menu.php'); 
    
    $sql = "SELECT * from admins";
    $res = mysqli_query($conn, $sql);
    $count_admins=mysqli_num_rows($res);
    
    $sql = "SELECT * from categories";
    $res = mysqli_query($conn, $sql);
    $count_categories=mysqli_num_rows($res);
    
    $sql = "SELECT * from items";
    $res = mysqli_query($conn, $sql);
    $count_items=mysqli_num_rows($res);
    
    $sql = "SELECT * from orders";
    $res = mysqli_query($conn, $sql);
    $count_orders=mysqli_num_rows($res);
    
    ?>
    <!-- Main Menu End -->


    <!-- Main Content Section Start  -->
    <div class="main-content">
    <br>
        <h2>Dashboard</h2>
        <br>
        <div class="main-content-boxes">
            <div class="col-4">
                <h1><?php echo $count_admins?></h1>Admins
            </div>
            <div class="col-4">
                <h1><?php echo $count_categories?></h1>Categories
            </div>
            <div class="col-4">
                <h1><?php echo $count_items?></h1>Items
            </div>
            <div class="col-4">
                <h1><?php echo $count_orders?></h1>Orders
            </div>
        </div>

    </div>
    <!-- Main Section End -->

    <!-- Footer Section Start  -->
        <?php include('partials/footer.php'); ?>
    <!-- Footer Section End  -->
</body>

</html>