<?php
 include_once 'header.php';
?>

<script>
  $(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel1").slideToggle("slow");
  });
});

$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
  });
});
</script>
<div class="container-fluid text-center login-info">
   <div class="row">
       <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      
                    <h1 id="flip1">Admin login</h1>
                  <div id="panel1">
                   <div class="card login-wrap">
                      <div class="card-header">
                        <h1>Admin Login</h1>
                      </div>
                      <div class="card-body signup-form">
                        
                          <form action="adminlogin.php" method="POST">
                          <input type="text" name="user" placeholder="ownerid/email" required autofocus>
                          <input type="password" name="pass" placeholder="password" required autofocus>
                          <button type="submit" class="btn btn-dark" name="submit">Sign in</button></form>
                       
                        </div>
                    </div>
                  </div>
                 
          
           <h1 id="flip2">Customer login</h1>
           <div id="panel2">
            <div class="card login-wrap">
               <div class="card-header">
                 <h1>Customer login</h1>
               </div>
               <div class="card-body signup-form">
                 <form action="customerlogin.php" method="POST">
                   <input type="text" name="user" placeholder="username/email" required autofocus>
                   <input type="password" name="pass" placeholder="password" required autofocus>
                   <button type="submit" class="btn btn-dark" name="submit">Sign in</button>
                </form>
               </div>
             </div>
           </div>
           <div>
              <h4 style="color:#0A0E02;text-decoration:underline;font-size:30px;">New user<a type="submit" href="register.php" class="btn btn-info btn-lg one">sign up</a><h4>
        </div>
       </div>
   </div>
</div>

<?php
 include_once 'footer.php';
?>