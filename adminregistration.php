<?php
 if(isset($_POST['submit']))
 {
     include_once 'conn.php';
     $ownerid=mysqli_real_escape_string($conn,$_POST['ownerid']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
    if(empty($ownerid) || empty($name) || empty($email) || empty($contact) || empty($address) ||empty($pwd))
    {
        header("Location: adminregistration.php?signup=empty");
        exit(); 
    }
    else
    {
       if(!preg_match("/^[a-zA-Z]*$/",$name))
       {
        header("Location: adminregistration.php?signup=invalid");
        exit(); 
       }
       else
       {
          if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          {
            header("Location: adminregistration.php?signup=email");
            exit();
          }
          else
          {
            $sql="select * from ownermaster where ownerid='$ownerid' or emailid='$email'";
            $result=mysqli_query($conn,$sql);
            $resultcheck=mysqli_num_rows($result);
            if($resultcheck>0)
            {
                header("Location:adminregistration.php?signup=usertaken");
            exit();
            }
            else
            {
                $hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
               $sql="insert into ownermaster (ownerid,name,emailid,contact,password,address) values ('$ownerid','$name','$email','$contact','$hashedpwd','$address')";
               $result=mysqli_query($conn,$sql);
               if(!$result)
               {
                 header("Location: adminregistration.php?signup=somethingwrong");
                exit();
              }
               else
               {
               header("Location: adminregistration.php?signup=success");
               exit();
               }
            }
          }
       }
    }
 }
?>



<?php
 include_once 'header.php';
?>

   <div class="container-fluid text-center admin-register">
   <div class="row">
       <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           <nav>
            <div class="card login-wrap2">
               <div class="card-header">
                 <h1 style="color:white">Admin Registration</h1>
               </div>
               <div class="card-body signup-form">
               <form action="" method="POST">
               <input type="text" name="ownerid" placeholder="ownerid">
           <input type="text" name="name" placeholder="name">
           <input type="email" name="email" placeholder="e-mail">
           <input type="text" name="contact" placeholder="contact">
           <input type="password" name="pwd" placeholder="password">
           <textarea row="5" column="25" placeholder="address" name="address"></textarea>
           <button type="submit" class="btn btn-dark" name="submit">Sign up</button>
       </form>
       <?php
       if(isset($_GET['signup']))
{
    $chngpwderror = $_GET['signup'];
    if($chngpwderror=='empty')
    {
    echo "<h5 class='error'>Fill all the spaces</h5>";
    }
    if($chngpwderror=='invalid')
    {
    echo "<h5 class='error'>Invalid name character</h5>";
    }
    if($chngpwderror=='email')
    {
    echo "<h5 class='error'>Invalid e-mail</h5>";
    }
    if($chngpwderror=='usertaken')
    {
    echo "<h5 class='error'>Clientid or emailid you entered already exist</h5>";
    }
    if($chngpwderror=='somethingwrong')
    {
    echo "<h5 class='error'>Some unknown error</h5>";
    }
}

?>
               </div>
             </div>
           </div>
           </div>
           </div>


<?php
 include_once 'footer.php';
 ?>