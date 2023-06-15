<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Travelmax</title>
  <meta charset="utf-8">
  <link href="/css/global-admin.css" rel="stylesheet" type="text/css">
</head>
<style>
  .admin-logo {
    max-width: 23%;
    text-align: center;
    display: inline-block;
    margin-bottom: 20px;
  }
</style>

<body>
  <div class="container login">
    <div class="col-lg-12 text-center"><img class="img-responsive admin-logo" src="/images/logo.png"></div>
    <?php if (isset($message_error) && !empty($message_error)) : ?>
      <div class="alert alert-danger" role="alert" style="width: 37%; margin: 0 auto; text-align: center;margin-bottom: 20px;">
        <?php echo $message_error; ?>
      </div>
    <?php endif; ?>
    <?php
    $attributes = array('class' => 'form-signin');
    echo form_open(base_url() . 'login/validate_credentials', $attributes);
    echo '<h2 class="form-signin-heading">Login</h2>';
    echo form_input('user_name', '', 'placeholder="Username" class="form-control"');
    echo '<br>';
    echo form_password('password', '', 'placeholder="Password" class="form-control"');
    echo "<br />";
    echo "<br />";
    echo form_submit('submit', 'Login', 'class="btn btn-large btn-primary"');
    echo form_close();
    ?>
  </div>
  <!--container-->

</body>

</html>