<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
  include_once 'conn.php';
  $uid=mysqli_real_escape_string($conn,$_POST['user']);
  $opwd=mysqli_real_escape_string($conn,$_POST['opwd']);
  $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
  $pwd1=mysqli_real_escape_string($conn,$_POST['pwd1']);
   if(!empty($uid) && !empty($pwd) &&!empty($opwd) && !empty($pwd1))
   {
       $sql="select * from clientmaster where emailid='$uid' or clientid='$uid'";
       $result=mysqli_query($conn,$sql);
       $resultcheck=mysqli_num_rows($result);
       if($resultcheck<1)
       {
        header('Location: customer-changepwd.php?error=invaliduid');
        exit();
       }
       else{
           if($rows=mysqli_fetch_assoc($result))
           {
              
               $hashedpwdcheck=password_verify($opwd,$rows['password']);
               if($hashedpwdcheck==false)
               {
                header('Location: customer-changepwd.php?error=wrongoldpwd');
                exit();
               }
               else if($hashedpwdcheck==true)
               {
                   if($pwd==$pwd1)
                   {
                    $hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
                    $sql="update clientmaster SET password='$hashedpwd' where emailid='$uid' or clientid='$uid'";
                    $result=mysqli_query($conn,$sql);
                      if(!$result){
                      header('Location: customer-changepwd.php?error=somethingwrong');
                      exit();
                    }
                      else
                      {
                       echo "<script type='text/javascript'>window.location.href='customerpage.php'; window.alert('you have successfully changed password.');</script>";
                       exit();
                      }   
                }
               else{
                header('Location: customer-changepwd.php?error=mismatchedpwd');
                exit();
                   }
               }
           }
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
      <a class="nav-link" href="bookroom.php">Book Room</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="customerpage.php">My page</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
  </ul>
  </div>
  </div>
</nav>
</header>

<div class="container-fluid text-center padding reset-pwd">
        <h1> Change Password</h1>
      <form action="" method="post" class="signup-form">
      <input type="text" name="user" placeholder="ownerid/email" required autofocus><br>
      <input type="password" name="opwd" placeholder="Old password" required autofocus><br>
          <input type="password" name="pwd" placeholder="New password" required autofocus><br>
          <input type="password" name="pwd1" placeholder="confirm-password" required autofocus><br>
          <button class="btn btn-dark" type="submit" name="submit" >Submit</button>

</form>
   
<?php
if(isset($_GET['error']))
{
    $chngpwderror = $_GET['error'];
    if($chngpwderror=='invaliduid')
    {
    echo "<h5 class='error'>Userid you entered does'nt exist</h5>";
    }
    if($chngpwderror=='wrongoldpwd')
    {
    echo "<h5 class='error'>Wrong old password</h5>";
    }
    if($chngpwderror=='mismatchedpwd')
    {
    echo "<h5 class='error'>New password do not match</h5>";
    }
    if($chngpwderror=='somethingwrong')
    {
    echo "<h5 class='error'>Some unknown error</h5>";
    }
}

?>
</div>

<?php
require_once 'footer.php';
?>




 
