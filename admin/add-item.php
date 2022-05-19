<html>

<head>
    <title>Add Item</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Add Item</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="add-form">
                Title:<input type="text" name="Title" placeholder="Title">
            </div>
            
            <div class="add-form">
                Price:<input type="decimal" name="Price" placeholder="Price">
            </div>
            <div class="add-form">
                Attach Image:<input type="File" name="image" >
            </div>
            <div class="add-form">
                Featured:<input type="Radio" name="Featured" value="Yes">Yes
                <input type="Radio" name="Featured" value="No">No
            </div>
            <div class="add-form">
                Active:<input type="Radio" name="Active" value="Yes">Yes
                <input type="Radio" name="Active" value="No">No
            </div>
            <div class="add-form">
                Prescriptive:<input type="Radio" name="Prescriptive" value="Yes">Yes
                <input type="Radio" name="Prescriptive" value="No">No
            </div>
            <div class="add-form">
                Item_Data: <textarea name="Description" cols="50" rows="5" placeholder="Info about the Item"></textarea>
            </div>
            <div class="add-form">
                Category: <select name='Category'>
                    <?php
                    $sql = "SELECT * from categories";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count>=1)
                    {
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $Category_name = $row['Title'];
                           echo $Category_id = $row['id'];
                            echo "<option value='$Category_id'>$Category_name</option>";
                        }
                    }

                    ?>
                </select>
            </div>
                <button class="btn-secondary" type='submit' name="submit">Submit</button>

        </form>
    </div>


</body>

</html>

<?php

if(isset($_POST['submit'])){
    
    $Title = $_POST['Title'];
    $Price = $_POST['Price'];
    $Item_Data = $_POST['Description'];

    //Setting the selected category
    if(isset($_POST['Category']))
    {
        $Category_id= $_POST['Category'];
    }

    if(isset($_POST['Featured']))
    {
        $Featured = $_POST['Featured'];
    }
    else
    {
        $Featured = 'No';
    }

    if(isset($_POST['Active']))
    {
        $Active = $_POST['Active'];
    }
    else
    {
        $Active = 'No';
    }
    if(isset($_POST['Prescriptive']))
    {
        $Prescriptive = $_POST['Prescriptive'];
    }
    else
    {
        $Prescriptive = 'No';
    }    

    // Checking Image Attached
    if(isset($_FILES['image']['name']))
    {
        $image_name= $_FILES['image']['name'];
        //Renaming the Image
        $seperator = '.';
        $splits = explode($seperator,$image_name);
        $count = count(explode($seperator,$image_name));
        $ext = $splits[$count-1];

        $image_name = 'Item_'.time().'.'.$ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/items/".$image_name;




        $upload = move_uploaded_file($source_path,$destination_path);
    }


    $sql = "INSERT INTO items SET 
            Title= '$Title',
            Item_Data='$Item_Data',
            Price = '$Price',
            Image_Name='$image_name',
            Featured='$Featured',
            Active='$Active',
            Prescriptive='$Prescriptive',
            Category_id='$Category_id'";

$res = mysqli_query($conn, $sql);
header('Location: http://localhost/DBMS-project/admin/manage-items.php');
}
?>



