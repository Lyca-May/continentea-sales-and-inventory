<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<br>
<br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><!-- start form -->
   <form action="<?=site_url('LoginAccess/Updated')?>" method="POST">
   <h1>Update your Account</h1>
    <h5>Please edit the details</h5>
    <div class="form-group">
          <input type="text" class="form-control" name="id" value="<?=$user['id']?>">
        </div>
        <div class="form-group">
          <label>Name:</label><br>
          <input type="text" class="form-control" name="name" placeholder="Please input your complete name" value="<?=$user['name']?>">
        </div>
        <div class="form-group">
        <label>Username:</label><br>
          <input type="text" class="form-control" name="username" placeholder="Please input your username" value="<?=$user['username']?>">
        </div>
        <div class="form-group">
        <label>Password:</label><br>
        <input type="password" class="form-control" name="password" placeholder="Please input your password" value="<?=$user['password']?>">
        </div>
        <input type="submit" value="Update">
        <br>
        <br>
        <a href="<?=site_url('LoginAccess/_in')?>">Back</a>
    </form>

</body>
</html>