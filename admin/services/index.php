<?php
require '../../config.php';
require BLA.'includes/header.inc.php';
?>

    <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Services</h3>
        <table class="table table-dark table-bordered">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php $data = getAllRows('services'); $x=1;
            if ($data) {
                foreach($data as $row){   ?>
                    <tr class="text-center">
                        <td scope="row"><?php echo $x; ?></td>
                        <td class="text-center"> <?php echo $row['service_name'] ?>  </td>

                        <td class="text-center">
                            <a href="<?php echo BURLA.'services/edit.php?id='.$row['service_id']; ?>" class="btn btn-info">Edit</a>
                            <a href="<?php echo BURLA.'services/delete.php?id='.$row['service_id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php $x++; }
                } else {?>
                    <tr>
                        <td>
                            No Service Found
                        </td>
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