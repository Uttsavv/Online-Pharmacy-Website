<html>

<head>
    <title>Update Items</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>
    <!-- Main Content Section Start  -->
    <?php
    $id = $_GET['id'];
    //Getting the values form the id
    $sql = "select * from items where id=$id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_assoc($res);
        $Title = $row['Title'];
        $Item_Data = $row['Item_Data'];
        $Price = $row['Price'];
        $Image_Name = $row['Image_Name'];
        $Featured = $row['Featured'];
        $Active = $row['Active'];
        $Prescriptive = $row['Prescriptive'];
        $Category_id = $row['Category_id'];
    }
    ?>

    <br>
    <div class="main-content">
        <h2>Update Item</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="add-form">
                Title:<input type="text" name="Title" value="<?php echo $Title ?>">
            </div>
            <div class="add-form">
                Price:<input type="numbers" name="Price" value="<?php echo $Price ?>">
            </div>
            <div class="add-form">
                Featured:<input type="Radio" name="Featured" value="Yes" <?php if ($Featured == 'Yes') {echo "Checked";} ?>>Yes
                <input type="Radio" name="Featured" value="No" <?php if ($Featured == 'No') {echo "Checked";} ?>>No
            </div>
            <div class="add-form">
                Active:<input type="Radio" name="Active" value="Yes" <?php if ($Active == 'Yes') {echo "Checked";} ?>>Yes
                <input type="Radio" name="Active" value="No" <?php if ($Active == 'No') {echo "Checked";} ?>>No
            </div>
            <div class="add-form">
                Prescriptive:<input type="Radio" name="Prescriptive" value="Yes" <?php if ($Prescriptive == 'Yes') {echo "Checked";} ?>>Yes
                <input type="Radio" name="Prescriptive" value="No" <?php if ($Prescriptive == 'No') {echo "Checked";} ?>>No
            </div>
            <div class="add-form">
                Update Image:<img src="../images/items/<?php echo $Image_Name ?>" alt="Current Image" width="100px" height="100px">
                <input type="File" name="image">
            </div>
            <div class="add-form">
                Item_Data: <textarea name="Item_Data" cols="50" rows="5" ><?php echo $Item_Data ?></textarea>
            </div>
            <div class="add-form">
                Category: <select name='Category' value=''>
                    <?php
                    $sql = "SELECT * from categories";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count>=1)
                    {
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $Category_name = $row['Title'];
                            $Category_id_adder = $row['id'];

                            if($Category_id_adder==$Category_id)
                            {
                                echo "<option value='$Category_id_adder' selected>$Category_name</option>";
                            }
                            else{
                                echo "<option value='$Category_id_adder'>$Category_name</option>";
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <button class="btn-secondary" type='submit' name="update">Update</button>

        </form>
    </div>

</body>

</html>

<?php
//Processing the input from the form and adding it to the database

//Checking if the button is clicked
if (isset($_POST['update'])) {

    $Title = $_POST['Title'];
    $Item_Data = $_POST['Item_Data'];
    $Price = $_POST['Price'];

    //Setting the selected category
    if(isset($_POST['Category']))
    {
        $Category_id= $_POST['Category'];
    }
    if (isset($_POST['Featured'])) {
        $Featured = $_POST['Featured'];
    }
    if (isset($_POST['Active'])) {
        $Active = $_POST['Active'];
    }
    if (isset($_POST['Prescriptive'])) {
        $Prescriptive = $_POST['Prescriptive'];
    }

    // Checking Image Attached
    if (isset($_FILE['image'])) {
        //deleting old image
        if(isset($_POST['image']))
        unlink("../images/items/" . $Image_Name);

        //uploading new image
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/items/" . $Image_Name;

        $upload = move_uploaded_file($source_path, $destination_path);
    }
   $sql2 = "UPDATE items SET 
            Title= '$Title',
            Price='$Price',
            Item_Data='$Item_Data',
            Featured='$Featured',
            Active='$Active',
            Prescriptive='$Prescriptive',
            Category_id='$Category_id' WHERE id = $id";


    $res = mysqli_query($conn, $sql2);
    header('Location: http://localhost/DBMS-project/admin/manage-items.php');
}
?>