<?php
require_once '../../config.php';
require_once BLA.'includes/header.inc.php';
require_once BL.'functions/validate.php';
?>

<?php

    if (isset($_POST['submit'])) {
        // Get the data sent by the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check for any empty fields
        if (checkEmpty($name) && checkEmpty($email) && checkEmpty($password)) {
            if (validEmail($email)) {

                if (!getRow("admins", "admin_email", $email)) {

                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_password`)
                            VALUES ('$name','$email','$password') ";

                    $successMessage = dbInsert($sql);
                    header("refresh:2;url=".BURLA.'admins');

                } else {
                    $errorMessage = "Email already exists";
                }



            } else {
                $errorMessage = "Please Enter Correct Email";
            }
        } else {
            $errorMessage = "Please Fill All Fields";
        }
        require BL.'functions/messages.php';

    }

?>


<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label >Name </label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <label >Email </label>
            <input type="email" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label >Password </label>
            <input type="password" name="password" class="form-control" >
        </div>


        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php require_once BLA.'includes/footer.inc.php'; ?>
