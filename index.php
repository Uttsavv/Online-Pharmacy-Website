<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pharmacy</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Menu      -->
    <?php
    include('partials-frontend/top-menu.php');
    ?>

    <!-- Item Search Section Start -->
    <section class="item-search text-center">
        <div class="container">

            <form action="item-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Items.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Item Search Section End -->

    <!-- CAtegories Section Starts -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Featured</h2>

            <?php
            $sql = "SELECT * from categories where Featured = 'Yes' and Active = 'Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) >=    1) {
                //Displaying the different categories
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $Title = $row['Title'];
                    $Image_Name = $row['Image_Name'];
                    $Featured = $row['Featured'];
                    $Active = $row['Active'];

            ?>
                    <a href="category-items.php?Category_id=<?php echo $id?>">
                        <div class="box-3 float-container">
                            <img src="images/categories/<?php echo $Image_Name ?>" alt="<?php echo $Title ?>" class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?php echo $Title ?></h3>
                        </div>
                    </a>
            <?php
                }
            }

            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends -->

    <!-- Items Menu Section Starts -->
    <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Items Available</h2>

            <?php
            $sql = "SELECT * from items where Featured = 'Yes' and Active = 'Yes' LIMIT 6";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) >= 1) {
                //Displaying the different categories
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $Title = $row['Title'];
                    $Item_Data = $row['Item_Data'];
                    $Price = $row['Price'];
                    $Image_Name = $row['Image_Name'];
                    $Featured = $row['Featured'];
                    $Active = $row['Active'];
                    $Prescriptive = $row['Prescriptive'];
                    $Category_id = $row['Category_id'];

            ?>
                    <div class="item-menu-box">
                        <div class="item-menu-img">
                            <img src="images/items/<?php echo $Image_Name?>" alt="<?php echo $Image_Name?>" class="img-responsive img-curve">
                        </div>

                        <div class="item-menu-desc">
                            <h4><?php echo $Title?></h4>
                            <p class="item-price"><?php echo $Price?>Rs</p>
                            <p class="item-detail">
                                <?php echo $Item_Data?>
                            </p>
                            <br>

                            <a href="order.php?id=<?php echo $id?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="items.php">See All Items</a>
        </p>
    </section>
    <!-- Item Menu Section Ends -->

    <!-- Foorter  -->
    <?php
    include('partials-frontend/footer.php');
    ?>

</body>

</html>