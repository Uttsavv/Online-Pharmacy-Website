

<!-- Navbar Start-->
<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="items.php">Items</a>
                    </li>
                    <li>
                        <a href="admin/login.php">Admin Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar End -->

    <?php
$conn = mysqli_connect('localhost','root','');
    $db_select = mysqli_select_db($conn,'online-pharmacy');
    ?>