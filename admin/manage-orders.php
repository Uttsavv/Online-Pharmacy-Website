<html>

<head>
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../admin.css">
</head>

<body>

    <!-- Menu  -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start  -->
    <br>
    <div class="main-content">
        <h2>Manage Orders</h2>

        <div class="main-content-boxes">
            <table>
                <tr>
                    <th>S-No</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>TIMESTAMP</th>
                    <th>Status</th>
                    <th>C_Name</th>
                    <th>C_Address</th>
                    <th>Actions</th>
                    </tr>

                <?php
                $sql = "select * from Orders";
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    $count = mysqli_num_rows($res);

                    if ($count >= 1) {
                        $sn = 1;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $Item = $row['Item'];
                            $Price = $row['Price'];
                            $Quantity = $row['Quantity'];
                            $Total = $row['Total'];
                            $TS = $row['Order-TIMESTAMP'];
                            $Status = $row['Order_Status'];
                            $C_Name = $row['Customer_Name'];
                            $Customer_Address = $row['Customer_Address'];
                ?>            
                           <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $Item ?></td>
                                <td><?php echo $Price ?></td>
                                <td><?php echo $Quantity ?></td>
                                <td><?php echo $Total ?></td>
                                <td><?php echo $TS ?></td>
                                <td><?php echo $Status ?></td>
                                <td><?php echo $C_Name ?></td>
                                <td><?php echo $Customer_Address ?></td>
                                <td>
                                    <a href='update-status.php?id=<?php echo $id?>' class='btn-secondary'>Update</a>
                                    <a href='check-prescription.php?id=<?php echo $id?>' class='btn-danger'>Prescription</a>
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