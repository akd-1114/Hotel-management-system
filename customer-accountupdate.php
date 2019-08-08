<?php
session_start();
 if(isset($_POST['submit']))
 {
     include_once 'conn.php';
     $ownerid=mysqli_real_escape_string($conn,$_POST['clientid']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    if(empty($ownerid) || empty($name) || empty($email) || empty($contact) || empty($address))
    {
        header("Location: customer-accountupdate.php?signup=empty");
        exit(); 
    }
    else
    {
       if(!preg_match("/^[a-zA-Z]*$/",$name))
       {
        header("Location: customer-accountupdate.php?signup=invalid");
        exit(); 
       }
       else
       {
          if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          {
            header("Location: customer-accountupdate.php?signup=email");
            exit();
          }
          else
          {

            $sid=mysqli_real_escape_string($conn,$_SESSION['clientid']);
               $sql="update clientmaster SET clientid='$ownerid', name='$name', emailid='$email', contact='$contact', address='$address' where clientid='$sid'";
               $result=mysqli_query($conn,$sql);
               if(!$result)
               {
                header("Location: customer-accountupdate.php?login=usertaken_or_Somethingwrong");
                exit();
               }
               else
               {
                $sql="select * from clientmaster  where clientid='$ownerid'";
                $result=mysqli_query($conn,$sql);
                if($rows=mysqli_fetch_assoc($result))
                 {
                $_SESSION['ownerid']=$rows['ownerid'];
                $_SESSION['emailid']=$rows['emailid'];
                $_SESSION['password']=$rows['password'];
                header("Location: customerpage.php?signup=success");
                exit();
                 }
               }
            
          }
          }
       }
  }
 
?>


<?php
session_start();
  if(isset($_SESSION['clientid']))
  {
      include_once 'conn.php';
      $id=$_SESSION['clientid'];
      $sql="select * from clientmaster where clientid='$id'";
      $result=mysqli_query($conn,$sql);
      $rows=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: customerpage.php');
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
<div class="container-fluid text-center admin-register">
   <div class="row">
       <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           <nav>
            <div class="card login-wrap2">
               <div class="card-header">
                 <h1 style="color:white">Your Account</h1>
               </div>
               <div class="card-body signup-form">
              
               <form action="" method="POST">
               <input type="text" name="clientid" placeholder="clientid" value="<?php echo $rows['clientid'];?>">
           <input type="text" name="name" placeholder="name" value="<?php echo $rows['name'];?>">
           <input type="email" name="email" placeholder="e-mail" value="<?php echo $rows['emailid'];?>">
           <input type="text" name="contact" placeholder="contact" value="<?php echo $rows['contact'];?>">
           <textarea row="5" column="25" placeholder="address" name="address"><?php echo $rows['address'];?></textarea>
    
           <button type="submit" class="btn btn-dark" name="submit">submit</button>
       </form>
               </div>
             </div>
           </div>
           </div>
           </div>


<?php
 include_once 'footer.php';
 ?>