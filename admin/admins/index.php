<?php
require '../../config.php';
require BLA.'includes/header.inc.php';
?>

    <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Cities</h3>
        <table class="table table-dark table-bordered">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <?php if ($_SESSION['admin_type'] == "super_admin"){?>
                <th scope="col">Action</th>
                <?php } ?>


            </tr>
            </thead>
            <tbody>
            <?php $data = getAllRows('admins'); $x=1;  ?>
            <?php foreach($data as $row){   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"> <?php echo $row['admin_name'] ?>  </td>
                    <td class="text-center"> <?php echo $row['admin_email'] ?>  </td>
                    <?php if ($_SESSION['admin_type'] == "super_admin"){?>
                        <td class="text-center">
                            <a href="<?php echo BURLA.'admins/edit.php?id='.$row['admin_id']; ?>" class="btn btn-info">Edit</a>
                            <?php if (!($_SESSION['admin_id'] == $row['admin_id'])) { ?>
                            <a href="<?php echo BURLA.'admins/delete.php?id='.$row['admin_id'] ?>" class="btn btn-danger delete">Delete</a>
                            <?php }?>

                        </td>
                    <?php } ?>

                </tr>
                <?php $x++; } ?>

            </tbody>
        </table>
    </div>

<?php
require BLA.'includes/footer.inc.php';
?>