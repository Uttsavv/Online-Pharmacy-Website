<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Search</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Menu      -->
    <?php 
        include('partials-frontend/top-menu.php');
    ?>

    <!-- Item Search Name Section Starts -->
    <?php 
       $search_term = $_POST['search'];
    ?>
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Displaying Items based on your Search Term: <a><?php echo $search_term?></a></h2>

        </div>
    </section>
    <!-- Item Search Name Section Ends -->



<!-- Items Menu Section Starts -->
<section class="item-menu">
    <div class="container">
        <h2 class="text-center">Items Available</h2>

        <?php
            // Searching Items in database based on serach term using wildcard 
            $sql = "SELECT * from items where Active = 'Yes' and Title like '$search_term%'";
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

</section>
<!-- Item Menu Section Ends -->

</body>
</html>