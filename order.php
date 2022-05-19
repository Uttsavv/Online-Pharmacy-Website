<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Menu      -->
    <?php 
        include('partials-frontend/top-menu.php');
        $id = $_GET['id'];
        $sql = "SELECT * from items where id = $id";
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
            }
        }
    ?>

    <!--Item Order Section Start-->
    <section class="order-page">
        <div class="container item-order">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form class="order" method="POST">
                <fieldset>
                    <legend>Selected Item</legend>

                    <div class="item-menu-img">
                        <img src="images/items/<?php echo $Image_Name?>" alt="<?php echo $Title?>" class="img-responsive img-curve">
                    </div>

                    <div class="item-menu-desc">
                        <h3><?php echo $Title?></h3>
                        <p class="item-price"><?php echo $Price?>Rs</p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>
                    <?php if($Prescriptive == "Yes")
                    {?> 
                        <div class="prescription-req-box">
                            <span class="prescription-req">Prescription Required:</span>
                            <input type="File" name="image" class="inlineblock" required>
    
                        </div>
                           
<?php               }?>


                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact_number" placeholder="Enter your phone number" class="input-responsive"
                        required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter Email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="House no. ,Street, City, Country"
                        class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- Item order Section Ends-->


</body>

</html>

<?php

if(isset($_POST['submit']))
{
    $item_name = $Title;
    $Quantity = $_POST['qty'];
    $Total = $Price*$Quantity;
    $Status = 'Order Placed';
    $Customer_Name = $_POST['full-name'];
    $Customer_Contact = $_POST['contact_number'];
    $Customer_Email = $_POST['email'];
    $Customer_Address = $_POST['address'];

    $sql = "INSERT INTO orders SET 
            Item= '$Title',
            Price= '$Price',
            Quantity='$Quantity',
            Total = '$Total',
            Order_Status='$Status',
            Customer_Name='$Customer_Name',
            Customer_Contact='$Customer_Contact',
            Customer_Email='$Customer_Email',
            Customer_Address='$Customer_Address'";

    $res = mysqli_query($conn, $sql);
    header('Location: http://localhost/DBMS-project/index.php');
}

?>