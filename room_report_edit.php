<?php
 if(isset($_POST['submit']))
 {
     include_once 'conn.php';
     $roomid=mysqli_real_escape_string($conn,$_POST['roomid']);
     $roomname=mysqli_real_escape_string($conn,$_POST['roomname']);
    $noofroom=mysqli_real_escape_string($conn,$_POST['noofroom']);
    $rate=mysqli_real_escape_string($conn,$_POST['rate']);
    if(empty($roomid) || empty($roomname) || empty($noofroom) || empty($rate))
    {
        header("Location: room_report_edit.php?submit=empty");
        exit(); 
    }
    else
    {
               $sql="update roomtype set typename='$roomname', `no of room`='$noofroom', `rate/day`='$rate' where typeid='$roomid'";
               $result=mysqli_query($conn,$sql);
               if(!$result)
               {
                 header("Location: room_report_edit.php?submit=somethingwrong");
                exit();
              }
               else
               {
               header("Location: room_report.php?submit=success");
               exit();
               }
    }
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
      <a class="nav-link" href="about-us.php">Book Room</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Administration
      </a>
      <div class="dropdown-menu sm-menu">
        <a class="dropdown-item" href="addminregistration.php">Add new system user</a>
        <a class="dropdown-item" href="#">Change cost of room</a>
        <a class="dropdown-item" href="#">Change room availability</a>
        <a class="dropdown-item" href="#">Add new facility</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Report
      </a>
      <div class="dropdown-menu sm-menu">
        <a class="dropdown-item" href="#">System User Reports</a>
        <a class="dropdown-item" href="#">Customer Reports</a>
        <a class="dropdown-item" href="#">Room Reports</a>
        <a class="dropdown-item" href="#">Facility Reports</a>
        <a class="dropdown-item" href="#">Booking Reports</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="adminpage.php">My page</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin-changepwd.php">Change password</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>
  </div>
  </div>
</nav>
</header>
<?php
session_start();
  if(isset($_SESSION['ownerid']))
  {
      include_once 'conn.php';
      $id=$_GET['bid'];
      $sql="select * from roomtype where typeid='$id'";
      $result=mysqli_query($conn,$sql);
      $rows=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: customerpage.php');
    }
?>
<div class="container-fluid text-center roomedit">
   <div class="row">
       <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card login-wrap2">
               <div class="card-header">
                 <h1 style="color:white">Change Room Details</h1>
               </div>
               <div class="card-body signup-form">
    <form action="" method="post" >
      <input type="text" name="roomid" placeholder="Room Id" value="<?php echo $rows['typeid'];?>" readonly>
      <input type="text" name="roomname" placeholder="Room Type" value="<?php echo $rows['typename'];?>">
      <input type="text" name="noofroom" placeholder="No. Of Room" value="<?php echo $rows['no of room'];?>">
      <input type="text" name="rate" placeholder="Rate/day" value="<?php echo $rows['rate/day'];?>">
      <div class="card-footer">
      <button type="submit" class="btn btn-dark" name="submit">Update</button>
       </div>
    </form>
    </div>
  </div>
    </div>
  </div>
</div>

<?php
include_once 'footer.php';
?>