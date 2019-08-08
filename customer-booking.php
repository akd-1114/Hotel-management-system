<?php
session_start();
 if(isset($_SESSION['clientid']))
 {
     include_once 'conn.php';
     $sid=$_SESSION['clientid'];
   $sql="select * from payment where client_id='$sid'";
   $result=mysqli_query($conn,$sql);
   
 }
 else{
     header("Location:login.php?signin_first");
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
      <a class="nav-link" href="bookroom.php">Book Room</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer-account.php" name="submit">My Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customerpage.php" name="submit">My Page</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>
  </div>
  </div>
</nav>
</header>

<div class="container-fluid my-booking">
   <div class="row">
    <div class="col-12 one">
        <h2 class="text-center">Booking Report</h2>
    </div>
    <div class="col-12">
   <table class="table">
       <thead>
           <tr class="text-center">
               <th>Booking Id</th>
               <th>Name</th>
               <th>Client-id</th>
               <th>Room Type</th>
               <th>Check-in</th>
               <th>Check-out</th>
               <th>Adults</th>
               <th>Child</th>
               <th>Amount paid</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
         <?php  while($rows=mysqli_fetch_assoc($result)) {?>
           <tr class="text-center">
               <td name="bid"><?php echo $rows['bookingid']; ?></td>
               <td><?php echo $rows['name']; ?></td>
               <td><?php echo $rows['client_id']; ?></td>
               <td><?php echo $rows['roomtype']; ?></td>
               <td><?php echo $rows['check_in']; ?></td>
               <td><?php echo $rows['check_out']; ?></td>
               <td><?php echo $rows['no_of_adults']; ?></td>
               <td><?php echo $rows['no_of_child']; ?></td>
               <td><?php echo $rows['amount_paid']; ?></td>
               <td><button type="button" name="submit" class="btn btn-success">View</button></td>
           </tr>
         <?php }?>
       </tbody>
</table>

<script> 
  $('.table tbody').on('click','.btn',function(){
      var curr=$(this).closest('tr');
      var col1=curr.find('td:eq(0)').text();
      window.location = 'bookingreport.php?bid=' + col1;
  })
</script>

</div>
</div>
</div>

<?php
 include_once 'footer.php';