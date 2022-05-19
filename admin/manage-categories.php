<html>

<head>
    <title>Manage Categories</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Manage Categories</h2>
        <br>
        <div class="button-box">
            <!-- Button to add admin  -->
            <a href="add-category.php" class="btn-Primary">Add Category</a>
        </div>

        <div class="main-content-boxes">
            <table>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Image-Name</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                    </tr>

                <?php
                $sql = "select * from categories";
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    $count = mysqli_num_rows($res);

                    if ($count >= 1) {
                        $sn = 1;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $Title = $row['Title'];
                            $Image_Name = $row['Image_Name'];
                            $Featured = $row['Featured'];
                            $Active = $row['Active'];
                ?>            
                           <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $Title ?></td>
                                <td><?php echo $Image_Name ?></td>
                                <td><?php echo $Featured ?></td>
                                <td><?php echo $Active ?></td>
                                <td>
                                    <a href='update-category.php?id=<?php echo $id?>' class='btn-secondary'>Update</a>
                                    <a href='delete-category.php?id=<?php echo $id?>' class='btn-danger'>Delete</a>
                                </td>
                            </tr>
                <?php
                            $sn++;
                        }
                    }
                }
                ?>
            </table>
        </div>


</body>

</html>