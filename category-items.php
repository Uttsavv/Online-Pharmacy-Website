<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Items</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Menu      -->
    <?php
    include('partials-frontend/top-menu.php');
    ?>

    <!-- Item Category Name Section Start -->

    <!-- Getting Category Id then finding name from GET  -->
    <?php
    $Category_id = $_GET['Category_id'];

    $sql = "select * from categories where id=$Category_id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_assoc($res);
        $Title = $row['Title'];
    }
    ?>
    <section class="text-center">
        <div class="container">

            <h2>Items of Category <a href="#"><?php echo $Title ?></a></h2>

        </div>
    </section>
    <!-- Item Category Name Section End -->

    <!-- Items Menu Section Starts -->
    <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Items Available</h2>
            <?php
            $sql = "SELECT * from items where Active = 'Yes' and Category_id=$Category_id";
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
                            <img src="images/items/<?php echo $Image_Name ?>" alt="<?php echo $Image_Name ?>" class="img-responsive img-curve">
                        </div>

                        <div class="item-menu-desc">
                            <h4><?php echo $Title ?></h4>
                            <p class="item-price"><?php echo $Price ?></p>
                            <p class="item-detail">
                                <?php echo $Item_Data ?>
                            </p>
                            <br>

                            <a href="order.php?id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>



            <div class="clearfix"></div>

        </div>

    </section>
    <!-- Item Menu Section Ends -->

</body>

</html>