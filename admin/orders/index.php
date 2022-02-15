<?php
require '../../config.php';
require BLA.'includes/header.inc.php';
?>

    <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Notes</th>
                <th scope="col">Service</th>
                <th scope="col">City</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT orders.* , services.service_name, cities.city_name FROM orders
                    INNER JOIN services
                    ON services.service_id = orders.order_service_id
                    INNER JOIN cities
                    ON cities.city_id = orders.order_city_id
                    ORDER BY order_created_at DESC
                    ;";


            $data = customSelect($sql);
            $x=1;
            if ($data) {
                foreach($data as $row){   ?>
                    <tr class="text-center">
                        <td scope="row"><?php echo $x; ?></td>
                        <td class="text-center"> <?php echo $row['order_name']; ?>  </td>
                        <td class="text-center"> <?php echo $row['order_mobile']; ?>  </td>
                        <td class="text-center"> <?php echo $row['order_email']; ?>  </td>
                        <td class="text-center"> <?php echo $row['order_notes']; ?>  </td>
                        <td class="text-center"> <?php echo $row['service_name']; ?>  </td>
                        <td class="text-center"> <?php echo $row['city_name']; ?>  </td>
                        <?php
                        if ($row['order_status'] == "uncompleted") {
                            echo "<td class='text-center' style='color: darkorange'>".$row['order_status']."</td>";
                        } elseif ($row['order_status'] == "completed") {
                            echo "<td class='text-center' style='color: green'>".$row['order_status']."</td>";
                        } else {
                            echo "<td class='text-center' style='color: red'>".$row['order_status']."</td>";
                        }
                        ?>

                        <td class="text-center">
                            <a href="<?php echo BURLA.'orders/edit.php?id='.$row['order_id']; ?>" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    <?php $x++; }
            } else {  ?>
                <tr>
                    <td>No Orders Found</td>
                </tr>
            <?php
            }
                ?>

            </tbody>
        </table>
    </div>

<?php
require BLA.'includes/footer.inc.php';
?>