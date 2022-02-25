<?php include("dbconn.php") ?>

<?php include("header.php") ?>

<!-- Content
================================================== -->


<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-offset-3 col-lg-5 col-md-5">
	    <div class="">
			<h2 class="" style="margin-bottom:20px;">OTP</h2>
			<p class="mb-20" style="margin-bottom:20px;">OTP has been sent to your mobile number. Please check</p>
		</div>
	</div>
	<div class="col-lg-offset-3 col-lg-5 col-md-5" style="margin-top:0px;">
		<div class="sidebar right">
			
			.<form enctype="multipart/form-data" method="POST">
				<?php
					if (isset($_POST['submitotp'])){
						$otp=$_POST['otp'];
						$number = $_SESSION['mobile_number'];

						$sql = "SELECT * FROM vendor WHERE mobile_number = '$number' AND otp = '$otp'";
						$insresult = $conn->query($sql);
						while ($row = $insresult->fetch_assoc()) {
							$email = $row['email_id'];
							$name_v = $row['name'];
							$otp_v = $row['otp'];
						}

						echo $otp == $otp_v;
						
						if($otp === $otp_v ){
						// Mail
						// echo $uname;
							$uname=$email;
							$name=$name_v;
							$to = $uname; 
							$from_add="info@weddingservices.co.in";
							$subject = 'REGISTRATION SUCCESS - WEDDING SERVICES';
							$message = '<html><body>';
							$message .='<div style="background:#fafafa;margin:0 auto;max-width:100%">';
							$message .= '<table style="width:100%;padding:10px 10px 0px;background:#fafafa" align="center" border="0" cellpadding="0" cellspacing="0">';
							$message .='<tbody>';
							$message .='<tr><td style="padding:0 15px 5px"><p style="color:#222222;font-weight:bold;font-size:20px;padding-top:0px">REGISTRATION SUCCESS - WEDDING SERVICES</td></tr>';
							$message .='<tr>';
							$message .='<td style="background:#fff;border:0;clear:both">';
							$message .='<table style="width:100%;color:#222222;font-family:OpenSans;font-size:14px;line-height:17px">';
							$message .='<tbody>';
							$message .='<tr><td style="padding:0 15px 5px"><p style="color:#222222;font-weight:bold;font-size:16px;padding-top:0px">Dear <strong>' . $name . '</strong> </p>';
							$message .='<p style="padding-top:10px">Vendor Registered Successfully in WEDDING SERVICES. </p>';
							$message .='<p style="padding-top:10px">Regards</p><p><strong>Wedding Services Team</strong></p>';
							$message .= "</tr></tbody></table>";
							$message .= "</tr></tbody></table>";
							$message .= "</body></html>";
							$headers  = "From: " . $from_add . "\r\n";
							$headers .= "Reply-To: ". $to . "\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							$result=mail($to, $subject, $message, $headers, '-f'.$from_add);

						// END Mail
						   
							echo "<script>window.location.href='vendors.php';</script>";

						}
						else if($otp != $otp_v){
							echo   "<script>alert('Invalid OTP');</script>";
						}
					}
				?>
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<label>Enter OTP:</label>
								<input type="number" value="" name="otp" />
							</div>
						</div>
						</fieldset>
					<div class="">
						<button class="button" type="submit" name="submitotp">Submit</button>
						<div class="clearfix"></div>
					</div> 
				</form>

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>



<?php include("footer.php") ?>