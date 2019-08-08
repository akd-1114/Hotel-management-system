<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
 <div class="container">
  <a class="navbar-brand" href="#">Hotel Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="main.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about-us.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bookroom.php">Book Room</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-account.php" name="submit">My Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-booking.php" name="submit">My Booking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-changepwd.php">Change password</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>
  </div>
  </div>
</nav>
</header>
<div class="container-fluid text-center padding admin-page">
    <div class="jumbotron">
  <h1>Welcome Client</h1>
</div>
</div>

<?php
 include_once 'footer.php';
?>
