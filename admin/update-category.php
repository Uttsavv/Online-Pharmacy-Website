<html>

<head>
    <title>Update Categories</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>
    <!-- Main Content Section Start  -->
    <?php
    $id = $_GET['id'];
    //Getting the values form the id
    $sql = "select * from categories where id=$id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_assoc($res);
        $Title = $row['Title'];
        $Image_Name = $row['Image_Name'];
        $Featured = $row['Featured'];
        $Active = $row['Active'];
    }
    ?>

    <br>
    <div class="main-content">
        <h2>Update Category</h2>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="add-form">
                Title:<input type="text" name="Title" id="categories-title" value="<?php echo $Title ?>">
            </div>
            <div class="add-form">
                Featured:<input type="Radio" name="Featured" value="Yes" <?php if ($Featured == 'Yes') {
                                                                                echo "Checked";
                                                                            } ?>>Yes
                <input type="Radio" name="Featured" value="No" <?php if ($Featured == 'No') {
                                                                    echo "Checked";
                                                                } ?>>No
            </div>
            <div class="add-form">
                Active:<input type="Radio" name="Active" value="Yes" <?php if ($Active == 'Yes') {
                                                                            echo "Checked";
                                                                        } ?>>Yes
                <input type="Radio" name="Active" value="No" <?php if ($Active == 'No') {
                                                                    echo "Checked";
                                                                } ?>>No
            </div>
            <div class="add-form">
                Update Image:<img src="../images/categories/<?php echo $Image_Name ?>" alt="Current Image" width="100px" height="100px">
                <input type="File" name="image">
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
    if (isset($_POST['Featured'])) {
        $Featured = $_POST['Featured'];
    }
    if (isset($_POST['Active'])) {
        $Active = $_POST['Active'];
    }

    // Checking Image Attached
    if (isset($_FILES['image'])) {
        //deleting old image
        if ($_POST['image']) {

            unlink("../images/categories/" . $Image_Name);
        }

        //uploading new image
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/categories/" . $Image_Name;

        $upload = move_uploaded_file($source_path, $destination_path);
    }
    echo "1";
    $sql2 = "UPDATE categories SET 
            Title= '$Title',
            Featured='$Featured',
            Active='$Active' WHERE id = $id";

    $res = mysqli_query($conn, $sql2);

    header('Location: http://localhost/DBMS-project/admin/manage-categories.php');
}
?>