
<?php
include("config/config.php");
$sql=mysqli_query($conn,"select * from con");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="action.php" method="post">
    <div class="form-group">
      <label for="email">name:</label>
      <input type="text" class="form-control" name="cname" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">contact:</label>
      <input type="text" class="form-control" name="contact" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" name="email" id="pwd"  name="pwd">
    </div>
    <button type="submit" name="submi" class="btn btn-default">Submit</button>
  </form>
</div>




<div class="" style="margin-top:60px">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">contact</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    while($row=mysqli_fetch_array($sql)){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['contact']; ?></td>
    </tr>
   <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>
