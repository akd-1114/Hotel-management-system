<?php
  SESSION_START();
  if(isset($_POST['submit']))
  {
    include_once 'conn.php';
    $uid=mysqli_real_escape_string($conn,$_POST['user']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pass']);
    if(empty($uid)||empty($pwd))
    {
        header("location:login.php?error=empty");
    }
    else
    {
        $sql="select * from clientmaster where emailid='$uid' or clientid='$uid'";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck<1)
        {
         header("Location: login.php?login=invalid");
         exit();
        }
        else
        {
           if($rows=mysqli_fetch_assoc($result))
            {
               
                $hashedpwdcheck=password_verify($pwd,$rows['password']);
                if($hashedpwdcheck==false)
                {
                     header("Location: login.php?login=error");
                      exit();
                }
                elseif($hashedpwdcheck==true)
                {

                    $_SESSION['clientid']=$rows['clientid'];
                    $_SESSION['emailid']=$rows['emailid'];
                    $_SESSION['password']=$rows['password'];
                    if(isset($_SESSION['clientid']))
                    header("Location: customerpage.php?login=success");
                    exit();
                }
            }
 
        }
     }
 }
  else{
      header("location:login.php?error=submission");
  }
