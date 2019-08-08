
<?php
session_start();
if(!isset($_SESSION['clientid']))
{
    header('Location:login.php?login_again');
}
else{
    
    if(isset($_POST['payment']))
   {
    include_once 'conn.php';
    $date=mysqli_real_escape_string($conn,date("d-m-Y"));
    $cid=mysqli_real_escape_string($conn,$_POST['clientid']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
    $email=mysqli_real_escape_string($conn,$_POST['emailid']);
    $roomtype=mysqli_real_escape_string($conn,$_POST['roomtype']);
    $checkin=mysqli_real_escape_string($conn,$_POST['check-in']);
    $checkout=mysqli_real_escape_string($conn,$_POST['check-out']);
    $noofrooms=mysqli_real_escape_string($conn,$_POST['noofrooms']);
    $noofadults=mysqli_real_escape_string($conn,$_POST['noofadults']);
    $noofchild=mysqli_real_escape_string($conn,$_POST['noofchild']);
    $amount=mysqli_real_escape_string($conn,$_POST['amount']);
     
    
    $sql="insert into payment(booking_date,client_id,name,contact,email,roomtype,check_in,check_out,no_of_rooms,no_of_adults,no_of_child,amount_paid)  values ('$date','$cid','$name','$contact','$email','$roomtype','$checkin','$checkout','$noofrooms','$noofadults','$noofchild','$amount')";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            ?>
            <script>
            alert("some unknown error");
            </script>
            <?php
        }
        else
        {
        header("Location: paymentsuccess.php?insertion-success");
        exit();
        }
    }
 else if(isset($_POST['submit']))
  {
      include_once 'conn.php';
      $checkin=mysqli_real_escape_string($conn,$_POST['check-in']);
      $checkout=mysqli_real_escape_string($conn,$_POST['check-out']);
      $noofrooms=mysqli_real_escape_string($conn,$_POST['noofrooms']);
      $bill=mysqli_real_escape_string($conn,$_POST['bill']);

      $datetime1 = date_create($checkin); 
      $datetime2 = date_create($checkout); 
  
// calculates the difference between DateTime objects 
$interval = date_diff($datetime1, $datetime2); 
// printing result in days format 
$days=$interval->format('%a'); 
$charge=$bill*$days*$noofrooms;

  }
}
?>
        
<?php 
include_once 'header.php';
include_once 'conn.php';

?>
<script>
function validate(){
	var x=true;
			
	var c=document.getElementById('card');
	if(c.value.length!=16)
	{
		x=false;
		alert("Card Number must be of 16 digits!");
	}
	var m=document.getElementById('month');
	if(m.value=='Month')
	{
		x=false;
		alert("You have to choose a expiry month!")
	}
	var y=document.getElementById('year');
	if(y.value=='0')
	{
		x=false;
		alert("You have to choose a expiry year!")
	}
	var cvv=document.getElementById('cvv');
	if(isNaN(cvv.value)||cvv.value.length!=3){
	x=false;
		alert("Enter a valid CVV!")
 }
	
	return x;
}
</script>
	<div class="container-fluid" id="cnt">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 offset-lg-1  offset-md-1">
		    <form role="form" method="post" action="" onsubmit="return validate()">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Payment Details</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-body">
                
                        <div class="row">
                            <div class="col-5">
                                <label>CARD NUMBER</label>
                              </div>
                              <div class="col-6">
                                        <input type="number" id="card" name="cardno" class="form-control" placeholder="Valid Card Number" onkeypress="return isNumberKey(event)" required maxlength="16" />
                                  
                              </div>
                              <div class="col-1">
                                        <span class="input-group-addon"><span class="fa fa-credit-card fa-lg" style="padding-top:10px;"></span></span>
                                        </div>
                        </div>
                              <div class="row">
                                  <div class="col-5">
                                    <label>NAME ON CARD</label>
                                   </div>
                                   <div class="col-6">
                                     <input type="text" name="nameoncard" id="name" class="form-control" placeholder="Card owner name" autocomplete="off">
                                 </div>
                                </div>

                              <div class="row">
                                  <div class="col-5">
                                
                                	
                                    <label> EXPIRY DATE</label>
                                        </div>
                                        <div class="col-4">
                                            <select name="month" id="month">
                                                <option value="Month">Month</option>
                                                <option value="jan">January</option>
                                                <option value="feb">February</option>
                                                <option value="mar">March</option>
                                                <option value="apr">April</option>
                                                <option value="may">May</option>
                                                <option value="jun">June</option>
                                                <option value="jul">July</option>
                                                <option value="aug">August</option>
                                                <option value="sep">September</option>
                                                <option value="oct">October</option>
                                                <option value="nov">November</option>
                                                <option value="dec">December</option>
                                            </select>
                                </div>
                                <div class="col-3">
                                            <select name="year" id="year">
                                                <option value="Year">Year</option>
                                            </select>
                                </div>
                             </div> 
                            
                   <div class="row">
                            <div class="col-5">
                                
                                    <label>CVV CODE</label>
                           </div>
                           <div class="col-5">
                                    <input type="password"  class="form-control" id="cvv" placeholder="CVV" onkeypress="return isNumberKey(event)" maxlength="3" />
                                </div>
                    </div>
                        
                    <div class="row">
                            <div class="col-5">
                                
                                    <label>TOTAL AMOUNT</label>
                            </div>
                            <div class="col-5">
                                    <input type="text" name="amount" class="form-control" value="<?php echo $charge;?>" placeholder="" readonly />
                            </div>
                            
</div>
                   
                    </div>     
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                        <input type="hidden" name="check-in" value="<?php echo $_POST['check-in'];?>" >
                    <input type="hidden" name="noofrooms" value="<?php echo $_POST['noofrooms'];?>">
                    
                    <input type="hidden" name="noofchild" value="<?php echo $_POST['noofchild'];?>" >
                    
                    <input type="hidden" name="contact" value="<?php echo $_POST['contact'];?>" >
                    
                    <input type="hidden" name="emailid" value="<?php echo $_POST['emailid'];?>" >
                    <input type="hidden" name="check-out" value="<?php echo $_POST['check-out'];?>" >
                    
                    <input type="hidden" name="noofadults" value="<?php echo $_POST['noofadults'];?>">
                    
                    <input type="hidden" name="name" value="<?php echo $_POST['name'];?>" >
                   
                    <input type="hidden" name="clientid" value="<?php echo $_POST['clientid'];?>">
                    <input type="hidden" name="roomtype" value="<?php echo $_POST['typename'];?>">
                            <button class="btn btn-warning btn-lg btn-block" type="submit" name="payment">Process payment</button>
                        </div>
                    </div>
            
            </div>
            </div>
            
            </form>
                    
                
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <img src="images/we-accept-all-debit-cards.jpg"  class="img-fluid rounded d-block mx-auto clearfix" style="padding-top:140px;"/>
        </div>
    </div>
</div>


<script type="text/javascript">

 var select=document.getElementById("year");

select.innerHTML="";
for(var i=2018;i<=2050;i++)
{
    var opt=i;
    if(i==2018)
    {
        
      select.innerHTML+="<option value=0>Year</option>";  
  }
   else
   { 
    select.innerHTML+="<option value="+opt+">"+opt+"</option>";}
}
</script>


<?php
include_once 'footer.php';
?>