<?php
 include_once 'header.php';
?>
<?php
  if(isset($_POST['send']))
  {
	  include_once 'conn.php';
	  $name=mysqli_real_escape_string($conn,$_POST['name']);
	  $subject=mysqli_real_escape_string($conn,$_POST['subject']);
	  $email=mysqli_real_escape_string($conn,$_POST['email']);
	  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
	  $message=mysqli_real_escape_string($conn,$_POST['comments']);
	  if(empty($subject) || empty($name) || empty($email) || empty($phone) || empty($message))
	  {
		  header("Location: contact-us.php?input=empty");
		  exit(); 
	  }
	  else
	  {
		 if(!preg_match("/^[a-zA-Z]*$/",$name))
		 {
		  header("Location: contact-us.php?input=invalid");
		  exit(); 
		 }
		 else
		 {
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
			  header("Location: contact-us.php?input=email");
			  exit();
			}
			else
			{
			  $sql="select * from contact_us where emailid='$email'";
			  $result=mysqli_query($conn,$sql);
			  $resultcheck=mysqli_num_rows($result);
			  if($resultcheck>0)
			  {
				  header("Location: contact-us.php?input=emailtaken");
			  exit();
			  }
			  else
			  {
				 $sql="insert into contact_us (name,subject,email,phone,message) values ('$name','$subject','$email','$phone','$message')";
				 $result=mysqli_query($conn,$sql);
				 if(!$result)
				 {
				   header("Location: contact-us.php?input=somethingwrong");
				  exit();
				}
				 else
				 {
				 header("Location: contact-us.php?input=success");
				 exit();
				 }
			  }
			}
		 }
	  }
   }
  
?>

<div class="container">
<nav aria-label="breadcrumb" style="padding-top:70px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="main.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">About us</li>
  </ol>
    </nav>
		<h1 class="text-center">Contact Us</h1>
		<div class="row ">
			<div class="col-md-8 border-right">
				<p>Feel free to contact us. Whenever you have any inquiry, just ask us. We are happy to assist you.</p>
				<p>If you are our existing customer, we love to hear your experience with us.</p>
				 				<form method="post" action=" ">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<i class="fa fa-user text-color"></i>
								<label class="text-color">Name</label>
								<input name="name" class="form-control" placeholder="Write Your Full Name" required="required" type="text" value="" required autofocus>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<i class="fas fa-pencil-alt text-color"></i>
								<label class="text-color">Subject</label>
								<input name="subject"class="form-control" placeholder="Your Contact Purpose" required="required" type="text" value="" required autofocus>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<i class="fa fa-envelope text-color"></i>
								<label class="text-color">Email</label>
								<input name="email" class="form-control" placeholder="Enter Your Email Address" required="required" type="text" value="" required autofocus>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<i class="fa fa-phone text-color"></i>
								<label class="text-color">Phone</label>
								<input name="phone" class="form-control" placeholder="Enter Your Mobile Number" required="required" type="text" value="" required autofocus>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-color">Message</label>
						<textarea name="comments" class="form-control" placeholder="Write Your Message" required autofocus></textarea>
					</div>
					 <button type="submit" name="send" value="sendform" class="btn  btn-lg btn-primary" style="margin-bottom:35px;">Send message</button>
				</form>
            </div>
			<div class="col-md-4">
				
					<ul class="standard-non-ac-room-list-item">
						<li>
							<h5><i class="fa fa-envelope"></i> Email</h5><a href="mailto:hotelsamrat@gmail.com">hotelsamrat@gmail.com</a>
						</li>
						<li>
							<h5><i class="fas fa-phone"></i> Phone Number</h5>
							Suryadev Singh 
							<br>
							<a href="tel:+91-9997501933">+91-9997501933</a>
							<br>
							Helpline No
							<br>
							<a href="tel:+91-8449880863">+91-8449880863</a>
							<br>
							<a href="tel:+91-1334232888">+91-1334232888</a>
						</li>
						<li>
							<h5><i class="fa fa-map-marker"></i> Address</h5>
							<address>Hotel Samrat<br />
							Indra Colony, Boring Road, Patna (Bihar) 249401							<br />
							India
							<br />
							</address>
							
						</li>
					</ul>
			</div>
		</div>
	</div>
    <br>

<?php
 include_once 'footer.php';
?>