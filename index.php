<?php/*
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
}*/
 
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
           <input type="number" name="noofbeds" placeholder="Number Of Beds" min="0" required autofocus>
           <input type="number" name="maxadults" placeholder="Max Adults" min="0" required autofocus>
           <input type="number" name="maxchild" placeholder="Max Child" min="0" required autofocus>
           <input type="text" name="check-in" placeholder="Check-in Time" required autofocus>
           <input type="file" name="image"  required >

           <select id="framework" name="framework" multiple >
            <option value="Internet Facility">Internet Facility</option>
            <option value="Wifi">Wifi</option>
            <option value="Laundry">Laundry</option>
            <option value="Extra b">Extra beds</option>
            <option value="Extra bed">Extra beds</option>
            <option value="Extra be">Extra beds</option>
            <option value="Extra c">Extra beds</option>
            <option value="Extra br">Extra beds</option>
            <option value="Extra bk">Extra beds</option>
           </select>

             <button type="submit" class="btn btn-dark" name="submit">Submit</button>
       </form>
       <?php


?>
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
      url:"faciliry.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
          $('#framework option:selected').each(function(){
              $(this).prop('selected',false);
          });
          $('#framework').multiselect('refresh');
          alert(data);
      }
  })
 });
});
</script>

<?php
 include_once 'footer.php';
 ?>