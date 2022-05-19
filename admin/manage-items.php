<html>

<head>
    <title>Manage Items</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Manage Items</h2>
        <br>
        <div class="button-box">
            <!-- Button to add admin  -->
            <a href="add-item.php" class="btn-Primary">Add Item</a>
        </div>

        <div class="main-content-boxes">
            <table>
                <tr>
                    <th>S-No</th>
                    <th>Title</th>
                    <th>Item_Data</th>
                    <th>Price</th>
                    <th>Image-Name</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Prescriptive</th>
                    <th>Category_id</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "select * from items";
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    $count = mysqli_num_rows($res);

                    if ($count >= 1) {
                        $sn = 1;
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
                            <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $Title ?></td>
                                <td><?php echo $Item_Data ?></td>
                                <td><?php echo $Price ?></td>
                                <td><?php echo $Image_Name ?></td>
                                <td> <?php echo $Featured ?> </td>
                                <td><?php echo $Active ?></td>
                                <td><?php echo $Prescriptive ?></td>
                                <td><?php echo $Category_id ?></td>
                                <td>
                                    <a href='update-item.php?id=<?php echo $id ?>' class='btn-secondary'>Update</a>
                                    <a href='delete-item.php?id=<?php echo $id ?>' class='btn-danger'>Delete</a>
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