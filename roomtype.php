<?php
 if(isset($_POST['submit']))
 {
     include_once 'conn.php';
     $roomname=mysqli_real_escape_string($conn,$_POST['roomname']);
    $noofroom=mysqli_real_escape_string($conn,$_POST['noofroom']);
    $rate=mysqli_real_escape_string($conn,$_POST['rate']);
    if(empty($roomname) || empty($noofroom) || empty($rate))
    {
        header("Location: roomtype.php?submit=empty");
        exit(); 
    }
    else
    {
               $sql="insert into roomtype (typename,`no of room`,`rate/day`) values ('$roomname','$noofroom','$rate')";
               $result=mysqli_query($conn,$sql);
               if(!$result)
               {
                 header("Location: roomtype.php?submit=somethingwrong");
                exit();
              }
               else
               {
               header("Location: roomtype.php?submit=success");
               exit();
               }
    }
}
 
?>



<?php
 include_once 'header.php';
?>

   <div class="container-fluid text-center admin-register">
   <div class="row">
       <div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
           <nav>
            <div class="card login-wrap2">
               <div class="card-header">
                 <h1 style="color:white">Room Info</h1>
               </div>
               <div class="card-body signup-form">
               <form action="" method="POST">
           <input type="text" name="roomname" placeholder="room-type-name" required autofocus>
           
           <input type="text" name="noofroom" placeholder="No of room" required autofocus>
           <input type="text" name="rate" placeholder="Rate/Night" required autofocus>
           <button type="submit" class="btn btn-dark" name="submit">Submit</button>
       </form>
       <?php

       if(isset($_GET['submit']))
{
    $chngpwderror = $_GET['submit'];
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