<?php
session_start();
if(isset($_SESSION['clientid']))
{
    $x=0;
    $sid=$_SESSION['clientid'];
    include_once 'conn.php';
    $sql="select * from clientmaster where clientid='$sid'";
    $result=mysqli_query($conn,$sql);
    $rows1=mysqli_fetch_assoc($result);
    if(isset($_POST['snacroom']))
    {
        $sql="select * from roomtype where typename='Standard Non A/C Room'";
        $result=mysqli_query($conn,$sql);
        $rows2=mysqli_fetch_assoc($result);
        $x=1;
    }
    else if(isset($_POST['droom']))
    {
        $sql="select * from roomtype where typename='Deluxe Room'";
        $result=mysqli_query($conn,$sql);
        $rows2=mysqli_fetch_assoc($result);
        $x=2;
    }
    else if(isset($_POST['sdroom']))
    {
        $sql="select * from roomtype where typename='Super Deluxe Room'";
        $result=mysqli_query($conn,$sql);
        $rows2=mysqli_fetch_assoc($result);
        $x=3;
    }
    else if(isset($_POST['sroom']))
    {
        $sql="select * from roomtype where typename='Suite Room'";
        $result=mysqli_query($conn,$sql);
        $rows2=mysqli_fetch_assoc($result);
        $x=4;
    }
    else{
        
        header('Location:bookroom.php?submission_error');
        exit();
    }
}
else{
    header('Location:login.php?sign_in');
    exit();  
}


?>

<?php
 include_once 'header.php';
?>

<div class="container-fluid booking">
    <div class="row text-center">
        <div class="col-12 one">
    <h1>Selected Room Details</h1>
</div>
</div>
</div>

<div class="container-fluid booking1">
    <div class="row text-center">
<div class="col-xs-12 col-sm-6 col-md-5 offset-md-1">
<?php if($rows2['typename']=='Standard Non A/C Room'){
echo '<img src="images/93336.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>';
}?>
<?php if($rows2['typename']=='Deluxe Room'){
echo '<img src="images/148952559.jpg" alt="Deluxe Room" title="Deluxe Room" class="img-fluid rounded d-block mx-auto clearfix"/>';
}?>
<?php if($rows2['typename']=='Super Deluxe Room'){
echo '<img src="images/Four-Poster-Room.jpg" alt="Super Deluxe Room" title="Super Deluxe Room" class="img-fluid rounded d-block mx-auto clearfix"/>';
}?>
<?php if($rows2['typename']=='Suite Room'){
echo '<img src="images/interior2.jpg" alt="Suite Room" title="Suite Room" class="img-fluid rounded d-block mx-auto clearfix"/>';
}?>
</div>
<div class="col-xs-12 col-sm-6 col-md-5">
<table class="table table-dark table-hover">
  <tbody>
   <tr>
 <td>Price Per Day</td>
 <td><?php echo $rows2['rate/day'];?></td>
</tr>
<tr>
 <td>Room Type</td>
 <td><?php echo $rows2['typename'];?></td>
</tr>
<tr>
 <td>Max Adult</td>
 <td>3</td>
</tr>
<tr>
 <td>Max Child</td>
 <td>3</td>
</tr>
<tr>
 <td>Number Of Beds</td>
 <td>2</td>
</tr>
<tr>
 <td>Check-in Time</td>
 <td>12pm-12Am</td>
</tr>
</tbody>
</table>
</div>
<div class="col-12 one">
<h2 >Review Your Details</h2>
</div>
<div class="col-12">
  <form action="payment.php" method="POST">
      <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-5 offset-md-1">
      <label for="check-in"> Check-in</label><br>
  <input type="text" name="check-in" value="<?php echo $_POST['check-in'];?>" readonly><br>
  <label for="noofroom"> Number Of Room</label><br>
  <input type="text" name="noofrooms" value="<?php echo $_POST['noofrooms'];?>" readonly><br>
  <label for="noofchild"> Number Of Child</label><br>
  <input type="text" name="noofchild" value="<?php echo $_POST['child'];?>" readonly><br>
  <label for="contact">Contact Number</label><br>
  <input type="text" name="contact" value="<?php echo $rows1['contact'];?>" readonly><br>
  <label for="emailid">Email</label><br>
  <input type="text" name="emailid" value="<?php echo $rows1['emailid'];?>" readonly><br>
</div>
<div class="col-xs-12 col-sm-6 col-md-5">
      <label for="check-out"> Check-out</label><br>
  <input type="text" name="check-out" value="<?php echo $_POST['check-out'];?>" readonly><br>
  <label for="noofadults"> Number Of Adults</label><br>
  <input type="text" name="noofadults" value="<?php echo $_POST['adult'];?>" readonly><br>
  <label for="name">Name</label><br>
  <input type="text" name="name" value="<?php echo $rows1['name'];?>" readonly><br>
  <label for="clientid">Clientid</label><br>
  <input type="text" name="clientid" value="<?php echo $rows1['clientid'];?>" readonly><br>
  <label for="address">Address</label><br>
  <textarea type="text" name="address" row="5" column="25" readonly><?php echo $rows1['address']?> </textarea><br>
  <input type="hidden" name="bill" value="<?php echo $rows2['rate/day'];?>">
  <input type="hidden" name="typename" value="<?php echo $rows2['typename'];?>">
</div>
   <div class="col-xs-12 col-sm-4 col-md-3 offset-md-3 offset-sm-2">
 <button class="btn btn-dark btn-lg" type="submit" name="submit">Confirm</button>
</div>
<div class="col-xs-12 col-sm-4 col-md-3">
 <a class="btn btn-dark btn-lg" type="reset" href="bookroom.php" name="submit">Reset</a>
</div>
</div>
</form>
</div>
</div>
</div>

<?php

include_once 'footer.php';
?>
