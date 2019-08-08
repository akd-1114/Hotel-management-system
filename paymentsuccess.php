
<?php
session_start();
 if(isset($_SESSION['clientid']))
 {
     include_once 'conn.php';
     $sid=$_SESSION['clientid'];
           $sql="select * from payment where client_id='$sid' ORDER BY bookingid DESC LIMIT 1";
           $result=mysqli_query($conn,$sql);
           $rows=mysqli_fetch_assoc($result);
 }
 else{
     header("Location:login.php?login_first");
     exit();
 }
?>

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
      <a class="nav-link" href="customerpage.php">My Page</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-booking.php" name="submit">My Booking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-account.php" name="submit">My Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>
  </div>
  </div>
</nav>
</header>
<div class="container-fluid paymentsuccess">
 <div class="row">
   <div class="col-12 offset-lg-1">
     <h2>Hotel Booking Receipt (You have successfully booked room !!)</h2>
</div>
<div class="col-xs-6 co-sm-3 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3">
<table class="table table-dark table-hover">
  <tbody>
   <tr>
 <td >Booking Reference Id</td>
 <td><?php echo $rows['bookingid'];?></td>
</tr>
<tr>
 <td >Booking Date</td>
 <td><?php echo $rows['booking_date'];?></td>
</tr>
<tr>
 <td>Client-Id</td>
 <td><?php echo $rows['client_id'];?></td>
</tr>
<tr>
 <td>Name</td>
 <td><?php echo $rows['name'];?></td>
</tr>
<tr>
 <td>Contact Number</td>
 <td><?php echo $rows['contact'];?></td>
</tr>
<tr>
 <td>Email-id</td>
 <td><?php echo $rows['email'];?></td>
</tr>
<tr>
 <td>Room Type</td>
 <td><?php echo $rows['roomtype'];?></td>
</tr>
<tr>
 <td>Check-in</td>
 <td><?php echo $rows['check_in'];?></td>
</tr>
<tr>
 <td>Check-out</td>
 <td><?php echo $rows['check_out'];?></td>
</tr>
<tr>
 <td>Number Of Rooms</td>
 <td><?php echo $rows['no_of_rooms'];?></td>
</tr>
<tr>
 <td>Total Number Of Adults</td>
 <td><?php echo $rows['no_of_adults'];?></td>
</tr>
<tr>
 <td>Total Number Of Child</td>
 <td><?php echo $rows['no_of_child'];?></td>
</tr>
<tr>
 <td>Total Amount Paid</td>
 <td><?php echo $rows['amount_paid'];?>/-</td>
</tr>
</tbody>
</table>
</div>
<div class="col-12 text-center">
 <button class="btn btn-success" type="submit">Print</button>
</div>
</div>
</div>

<?php
  include_once 'footer.php';
?>