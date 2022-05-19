<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Menu      -->
    <?php 
        include('partials-frontend/top-menu.php');
    ?>


    <!-- CAtegories Section Starts -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center ">Explore Different Categories</h2>

            <?php 
                $sql = "SELECT * from categories where Active = 'Yes'";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>=1)
                {
                    //Displaying the different categories
                    while($row = mysqli_fetch_assoc($res))
                    {
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

</body>

</html>