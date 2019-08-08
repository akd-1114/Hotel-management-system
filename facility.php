<?php
 if(isset($_POST['submit']))
 {
     include_once 'conn.php';
     $roomtype=mysqli_real_escape_string($conn,$_POST['roomname']);
    $noofbeds=mysqli_real_escape_string($conn,$_POST['noofbeds']);
    $maxadults=mysqli_real_escape_string($conn,$_POST['maxadults']);
    $maxchild=mysqli_real_escape_string($conn,$_POST['maxchild']);
    $checkin=mysqli_real_escape_string($conn,$_POST['check-in']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);
    $framework=mysqli_real_escape_string($conn,$_POST['framework']);
    if(empty($roomname) || empty($noofbeds) || empty($maxadults) || empty($image) || empty($maxchild) || empty($checkin) || empty($framework))
    {
        header("Location: facility.php?submit=empty");
        exit(); 
    }
    else
    {
        $sql="select * from facility_report where roomtype='$roomtype'";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck>0)
        {
            $sql="update facility_report set roomtype='$roomtype',no_of_beds='$noofbeds',maxadults='$maxadults',maxchild='$maxchild',check_in_time='$checkin',room_image='$image',facilities='$framework' where roomtype='$roomtype'";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                header("Location: facility.php?submit=updation_error");
                 exit(); 
            }
            else{
                header("Location: facility.php?submit=updation_successful");
        exit(); 
            }
        }
               $sql="insert into facility_report (roomtype,no_of_beds,maxadults,maxchild,check_in_time,room_image,facilities) values ('$roomname','$noofbeds','$maxadults','$maxchild','$checkin','$image','$framework')";
               $result=mysqli_query($conn,$sql);
               if(!$result)
               {
                header("Location: facility.php?submit=somethingwrong");
                exit(); 
              }
               else
               {
                   ?>
                  <script>
                  alert("Updated Successfully !!");
                  </script>

                   <?php
               header("Location: adminpage.php?submit=success");
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
                 <h1 style="color:white">Room Entry Info</h1>
               </div>
               <div class="card-body signup-form">
               <form action="" method="POST" id="framework_form">
           <input type="text" name="roomname" placeholder="Room Type" required autofocus>
           <input type="text" name="noofbeds" placeholder="Number Of Beds" min="0" required autofocus>
           <input type="number" name="maxadults" placeholder="Max Adults/Room" min="0" required autofocus>
           <input type="number" name="maxchild" placeholder="Max Child/Room" min="0" required autofocus>
           <input type="text" name="check-in" placeholder="Check-in Time" required autofocus>
           <input type="file" name="image"  required autofocus>
</div>
           <div class="signup-form1">
           <select id="framework" name="framework" multiple class="form-control">
            <option value="Additional beds">Additional Beds</option>
            <option value="Babysitting">Babysitting</option>
            <option value="Free Wifi">Free Wifi</option>
            <option value="Laundry Service">Laundry Service</option>
            <option value="Lobby Bar">Lobby Bar</option>
            <option value="Room Service">Room Service</option>
            <option value="Wheel Chair Access">Wheel Chair Access</option>
           </select>
</div>
<div class="signup-form">
             <button type="submit" class="btn btn-dark" name="submit">Submit</button>
       </form>
    
               </div>
             </div>
           </div>
           </div>
           </div>
<script>
$(document).ready(function(){
 $('#framework').multiselect({
     nonSelectedText:'Select Facities',
     enableFiltering:true,
     enableCaseInsensitiveFiltering:true,
     buttonWidth:'325px',
     enableClickableOptGroups: true,
     includeSelectAllOption:true,
     
 });
 $('#framework_form').on('submit',function(event){
  event.preventDefault();
  var form_data=$(this).serialize();
  $.ajax({
      url:"facility.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
          $('#framework option:selected').each(function(){
              $(this).prop('selected',false);
          });
          $('#framework').multiselect('refresh');
      }
  })
 });
});
</script>

<?php
 include_once 'footer.php';
 ?>