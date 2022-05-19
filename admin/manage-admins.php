<html>

<head>
    <title>Manage Admins</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Manage Admins</h2>
        <br>
        <div class="button-box">
            <!-- Button to add admin  -->
            <a href="add-admin.php" class="btn-Primary">Add Admin</a>
        </div>

        <div class="main-content-boxes">
            <table>
                <tr>
                    <th>S-No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "select * from admins";
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    $count = mysqli_num_rows($res);

                    if ($count >= 1) {
                        $sn = 1;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $full_name = $row['Full_Name'];
                            $username = $row['Username'];
                ?>            
                           <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $full_name ?></td>
                                <td><?php echo $username ?></td>
                                <td>
                                    <a href='change-admin-password.php?id=<?php echo $id?>' class='btn-change'>Change Password</a>
                                    <a href='update-admin.php?id=<?php echo $id?>' class='btn-secondary'>Update</a>
                                    <a href='delete-admin.php?id=<?php echo $id?>' class='btn-danger'>Delete</a>
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