<?php  require 'config.php';  ?>
<?php require BL.'functions/validate.php';  ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css" >

    <title>Home Page</title>
</head>
<body>



<div class="cont-main" style="background:url(<?php echo ASSETS .'images/bg-1.jpg';?>)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <?php
                    if (isset($_POST['submit'])) {
                        $serviceId = $_POST['service'];
                        $cityId = $_POST['city'];
                        if ($serviceId != 0 && $cityId != 0) {
                            $name = sanitizeString($_POST['name']);
                            $email = sanitizeEmail($_POST['email']);
                            $mobile = $_POST['mobile'];
                            $note = sanitizeString($_POST['notes']);
                            if (checkEmpty($name) && checkEmpty($mobile) && is_numeric($mobile)) {
                                if (validEmail($email) || !checkEmpty($email)) {
                                    $sql = "INSERT INTO orders SET
                                            order_name = '$name',
                                            order_mobile = '$mobile',
                                            order_email = '$email',
                                            order_notes = '$note', 
                                            order_service_id = '$serviceId',
                                            order_city_id = '$cityId';
                                    ";
                                    $successMessage = dbInsert($sql);
                                } else {
                                    $errorMessage = "Please Enter Valid Email";
                                }
                            } else {
                                $errorMessage = "Please Fill Mandatory Fields Properly";
                            }
                        } else {
                            $errorMessage = "Please Choose Service and City";
                        }
                    }
                ?>

                <form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5" >
                    <?php require BL.'functions/messages.php'; ?>
                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="service" class="font-1">Choose Service</label>
                            <select name="service" id="service" class="form-control font-1">
                                <option value="0">
                                    Select Service
                                </option>
                                <?php $data = getAllRows('services');  $x=1;
                                 if ($data == false) { ?>
                                    <option value="0">No Service found</option>
                                <?php
                                } else {
                                     foreach($data as $row){   ?>
                                    <option value="<?php echo $row['service_id']; ?>">
                                        <?php echo $row['service_name']; ?>
                                    </option>
                                    <?php } }?>


                                ?>

                            </select>

                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="city" class="font-1">Choose City</label>
                            <select name="city" id="city" class="form-control font-1">
                                <option value="0">
                                    Select City
                                </option>
                                <?php $dataCity = getAllRows('cities');
                                if ($dataCity) {
                                    foreach($dataCity as $row){   ?>
                                        <option value="<?php echo $row['city_id']; ?>">
                                            <?php echo $row['city_name']; ?>
                                        </option>
                                    <?php }
                                } else { ?>
                                    <option value="0">No City Found</option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">

                            <label for="name" class="font-1">Type Your Name *</label>
                            <input type="text" name="name"  class="form-control font-1 bg-base">

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Email </label>
                            <input type="email" name="email"  class="form-control font-1 bg-base">

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Mobile *</label>
                            <input type="number" name="mobile"  class="form-control font-1 bg-base">

                        </div>
                    </div>




                    <div class="col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Notes</label>
                            <textarea name="notes"  class="form-control font-1 bg-base"  rows="5"></textarea>

                        </div>
                    </div>




                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js" ></script>
<script src="<?php echo ASSETS; ?>/js/popper.min.js" ></script>
<script src="<?php echo ASSETS; ?>/js/bootstrap.min.js" ></script>
</body>
</html>