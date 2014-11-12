<!DOCTYPE html>
<html lang="en">
<body>

<div class="container-fluid">
<div class="col-lg-4"></div>
<div class="row-fluid center center-block centering">
  <div class="col-lg-4">
    <h2 class="logo-center"><span class="glyphicon glyphicon-send"></span> TripShop</h2>
    <div class="validation_error">
  <?php echo validation_errors('<span class="label label-danger alert-center">','</span>'); ?>
  </div>
     <?php
     $attributes = array('class' => 'form-inline', 'role' => 'form');
     $inputs = 'class="form-control"';
     $labels = array('class' => 'col-sm-2 control-label' );
     $submitbtn = 'class = "btn btn-default btn_novo"';
     echo form_open('admin/verifylogin', $attributes);
     ?><div class="form-group"><?
     echo form_label("Email: ", 'email', $labels);
     ?><div class="col-sm-10"><?
     echo form_email('email', '', $inputs);
     ?></div></div><div class="form-group"><?
     echo form_label("Password: ", 'password', $labels);
     ?><div class="col-sm-10"><?
     echo form_password('password', '', $inputs);
     ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
     echo "<br>";
     echo form_submit("","Login", $submitbtn);
     ?></div><?
     echo form_close();
   ?>
  </div>
  <div class="col-lg-4"></div>
</div>
</div>

</div>

</body>
</html>
