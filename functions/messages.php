<?php if(isset($errorMessage) && $errorMessage !=''){  ?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-danger text-center"> <?php echo $errorMessage; ?>  </h3>
    </div>
<?php

}
?>


<?php if(isset($successMessage) && $successMessage !=''){  ?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-success text-center"> <?php echo $successMessage; ?>  </h3>
    </div>
<?php

}
?>