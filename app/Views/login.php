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
    <form action="/login/validate_credentials" class="form-signin" method="POST" accept-charset="utf-8">
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" name="user_name" value="" placeholder="Username" class="form-control">
      <br>
      <input type="password" name="password" value="" placeholder="Password" class="form-control">
      <br><br>
      <input type="submit" name="submit" value="Login" class="btn btn-large btn-primary">
    </form>
  </div>
  <!--container-->

</body>

</html>