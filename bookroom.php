<?php
 include_once 'header.php';
?>

<script>
$(document).ready(function(){
  $("#flip3").click(function(){
    $("#panel3").toggle("slow");
  });
});
</script>

<div class="container-fluid text-center padding check-availability">
    <div class="jumbotron">
               <h1>Check Availability</h1>
            
               <form action="booking.php" method="POST">

                  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 offset-md-2" style="float:left">
                   <label>Check-in</label>:<br>
               <input class="form-control Date" type="text" name="check-in" placeholder="check-in" autocomplete="off"  required >
</div>

            
<div class="col-xs-12 col-sm-12 col-md-4 " style="float:right">
               <label>Check-out:</label><br>
               <input class="form-control Date"  type="text" name="check-out" placeholder="check-out" autocomplete="off" required >
</div>
 </div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
               <label>No. Of Rooms:</label><br>
               <select name="noofrooms" required autofocus>
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
                   <option>6</option>
                   <option>7</option>
                   <option>8</option>
                   <option>9</option>
                   <option>10</option>
               </select>
</div><br>
<div class="col-12">
    <h4 >Guests/Room</h4>
</div>
    <div class="col-xs-12 col-sm-12 col-md-4 offset-md-2">
    <label>Adult</label><br>
    <input type="number" min="0" max="3" style="width:50%" name="adult" value="1">
</div><br>
<div class="col-xs-12 col-sm-12 col-md-4">
    <label>Child</label><br>
    <input type="number" min="0" max="3" style="width:50%" name="child" value="0">
</div>
<div class="col-12">
   <h4 id="flip3">Search Room</h4>
   <div id="panel3">   
       <div class="container">  
         <div class="card">
                        <div class="card-header"><h2>Select Room</h2></div>
                        <div class="card-body">
              <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="">
                    <img src="images/93336.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <h5>Standard Non A/C Room</h5>
                    <p>Room type: Double/Single Bed</p>
                    <p>Max Adults: 3 Adults</p>
                    <p>Max Child: 3 Child</p>
                    <button class="btn btn-dark" name="snacroom" type="submit">Book Now</button>
                  </div>
                  <div class="col-12 seperator"></div>

                  <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="">
                    <img src="images/148952559.jpg" alt="Deluxe Room" title="Deluxe Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                  <h5>Deluxe Room</h5>
                    <p>Room type: Double/Single Bed</p>
                    <p>Max Adults: 3 Adults</p>
                    <p>Max Child: 3 Child</p>
                    <button class="btn btn-dark" name="droom" type="submit">Book Now</button>
                  </div>
                  <div class="col-12 seperator"></div>

                  <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="">
                    <img src="images/Four-Poster-Room.jpg" alt="Super Deluxe Room" title="Super Deluxe Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                  <h5>Super Deluxe Room</h5>
                    <p>Room type: Double/Single Bed</p>
                    <p>Max Adults: 3 Adults</p>
                    <p>Max Child: 3 Child</p>
                    <button class="btn btn-dark" name="sdroom" type="submit">Book Now</button>
                  </div>
                  <div class="col-12 seperator"></div>

                  <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="">
                    <img src="images/interior2.jpg" alt="Suite Room" title="Suite Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                  <h5>Suite Room</h5>
                    <p>Room type: Double/Single Bed</p>
                    <p>Max Adults: 3 Adults</p>
                    <p>Max Child: 3 Child</p>
                    <button class="btn btn-dark" name="sroom" type="submit">Book Now</button>
                  </div>
              </div>
              </div>
              </div>
         </div>
    </div>
</div>
</div>
               </form>
       
      
              
  </div>
</div>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
<script>
   $(document).ready(function() {
    $('.Date').datepicker({
      changeYear:true,
      changeMonth:true,
      dateFormat: 'dd-mm-yy',
        onSelect: function(dateText, inst) {
            //Get today's date at midnight
            var today = new Date();
            today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //Get the selected date (also at midnight)
            var selDate = Date.parse(dateText);

            if(selDate < today) {
                //If the selected date was before today, continue to show the datepicker
                $('.Date').val('');
                $(inst).datepicker('show');
            }
        }
    });
});
</script>


<?php
  include_once 'footer.php';
?>