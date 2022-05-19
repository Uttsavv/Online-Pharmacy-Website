<html>

<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Add Category</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="add-form">
                Title:<input type="text" name="Title" id="categories-title" placeholder="Title">
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
                <button class="btn-secondary" type='submit' name="submit">Submit</button>

        </form>
    </div>


</body>

</html>

<?php

if(isset($_POST['submit'])){
    
    $Title = $_POST['Title'];
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


    // Checking Image Attached
    if(isset($_FILES['image']['name']))
    {
        $image_name= $_FILES['image']['name'];
        //Renaming the Image
        $seperator = '.';
        $splits = explode($seperator,$image_name);
        $count = count(explode($seperator,$image_name));
        $ext = $splits[$count-1];

        $image_name = 'Category_'.time().'.'.$ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/categories/".$image_name;




        $upload = move_uploaded_file($source_path,$destination_path);
    }


    $sql = "INSERT INTO categories SET 
            Title= '$Title',
            Image_Name='$image_name',
            Featured='$Featured',
            Active='$Active'";

$res = mysqli_query($conn, $sql);
header('Location: http://localhost/DBMS-project/admin/manage-categories.php');
}
?>



