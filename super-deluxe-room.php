
<?php
include_once 'conn.php';
$sql="select * from roomtype where typename='Super Deluxe Room' ";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
?>

<?php
 include_once 'header.php';
?>

<div class="container">
  <nav aria-label="breadcrumb" style="padding-top:70px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="main.php">Home</a></li>
    <li class="breadcrumb-item"><a href="rooms.php">Rooms</a></li>
    <li class="breadcrumb-item active" aria-current="page">Super Deluxe Room</li>
  </ol>
      </nav>
      <div class="booking-item-detail">
         <header class="booking-item-header">
			<div class="row">
					<div class="col-md-8">
						<h2 class="lh1em" style="font-size:2.2em">Hotel Samrat, Patna -Super Deluxe Room</h2>
					</div>
					<div class="col-md-4">
						<p class="booking-item-header-price"><small>price from</small> <span style="font-size:50px;color:red">&#8377; <?php echo $rows['rate/day'];?></span>/night</p>
					</div>
				</div>
         </header>
			<div class="row">
				<div class="col-md-6">
                <div class="tab-content">
								<div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-loop="true">
									<img src="images/sdr_image1.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
									<img src="images/sdr_image2.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
									<img src="images/sdr_image3.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
									<img src="images/sdr_image4.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                                    <img src="images/sdr_image5.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                                    <img src="images/sdr_image6.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
                                    <img src="images/sdr_image7.jpg" alt="Standard Non A/C Room" title="Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix"/>
								</div>
</div>
			
				</div>
				<div class="col-md-6">
						<h2 class="text-color">Room Description</h2>
						<p>The Super Deluxe Single and Double Rooms offers that luxury and comfort to our guests. They are perfectly decorated lururious room with ample walking space.The Super deluxe hotel room is finely decorated for your luxurious stay and contains all basic amenities .The Super Deluxe Room has all the features such as rich interior and spacious, LCD, Wi-Fi, attached bath and all other Super Deluxe facilities.The large windows to admire the beauty of the nature, trees and the mountains, that soothes your mind and soul.</p>
					<a class="btn btn-primary" href="bookroom.php">Book Now</a>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h3 class="text-color">Feature</h3>
							<ul class="standard-non-ac-room-list-item">
                                <li><i class="fas fa-wifi fa-lg"></i><span class="booking-item-feature-title">Wi-Fi Internet</span></li>
                                <li><i class="fab fa-first-order-alt fa-lg"></i></i><span class="booking-item-feature-title">Air Conditioning</span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<h3 class="text-color">Suitability</h3>
							<ul class="standard-non-ac-room-list-item">
								<li><i class="fas fa-wheelchair fa-2x"></i><span class="booking-item-feature-title">Wheelchair Access</span>
								</li>
								<li><i class="fas fa-luggage-cart fa-lg"></i><span class="booking-item-feature-title">Luggage Storage Area</span>
								</li>
								<li><i class="fas fa-child fa-2x"></i><span class="booking-item-feature-title">For Children</span>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
            </div>

        <div class="contaimer  booking-item">
            <h4 class="text-center">Other Room</h4>
			<div class="row">
			    
				    <div class="col-md-4">
                                <a href="deluxe-room.php">
									<img src="images/sdr_image8.jpg" alt="Hotel Samrat-Delux-Room" class="img-fluid rounded d-block mx-auto clearfix" />
								</a>
								<h4 class="text-center one" ><a href="deluxe-room.php">Deluxe Room</a></h4>
					</div>
					<div class="col-md-4">
                                <a href="standard-non-ac-room.php">
									<img src="images/sdr_image9.jpg" alt="Hotel Samrat-Standard Non A/C Room" class="img-fluid rounded d-block mx-auto clearfix" />
								</a>
								<h4 class="text-center one" ><a href="standard-non-ac-room.php">Standard Non A/C Room</a></h4>
					</div>
					<div class="col-md-4">
						        <a href="suite-room.php">
									<img src="images/sdr_image10.jpg" alt="Hotel Samrat-Suite-Room" class="img-fluid rounded d-block mx-auto clearfix" />
								</a>
								<h4 class="text-center one" ><a href="suite-room.php">Suite Room</a></h4>
					
					</div>
            </div>
       </div>

</div>		
</div>
<br>
<?php
 include_once 'footer.php';
?>