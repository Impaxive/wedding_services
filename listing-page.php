<?php include("dbconn.php") ?>

<?php include("header.php") ?>

<style>
	.post-image {
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
	}
	.fs {
		font-size: 12px !important;
	}
	.img-blur-wrap {
		position: relative;
		overflow: hidden;
		border-radius: 10px;
	}
	.img-blur {
		background-size:auto,400px;
		filter: none;
		z-index: 2;
		position: relative;
		max-width: 650px;
		height: 450px;
		margin: 0 auto;  
		box-shadow:0px 20px 40px #000;
	}
	.img-blur-bg {
		background-size:auto,cover;
		filter: blur(5px);
		width:100%;
		height: 450px;
		position: absolute;
		z-index: 1;
	}
	.box {
		background: #f9f9f9;
		padding: 10px;
		border-radius: 10px;
		box-shadow: 0px 6px 10px 0px grey;
	}
	.tabs-nav li {
		width: 24.5% !important;
	}
	.tabs-nav li a:hover, .tabs-nav li.active a {
		background: whitesmoke !important;
	}
	.tabs-nav li a {
		text-align: center !important;
		width: 100% !important;
	}
	@media (max-width: 1024px) {
		.tabs-nav li {
			width: 24% !important;
		}
	}
	@media (max-width: 480px) {
		.tabs-nav li {
			width: 100% !important;
		}
	}
	.w-60 {
		width: 60% !important;
	}
	.text-transform{
        color: black;
        font-size: 14px;
        font-weight: bold;
    }
	.listing-item {
        height: 200px;
    }
	#breadcrumbs ul li:before {
		font-size: 10px !important;
	}
	.text p {
		text-align: justify !important;
	}
</style>

<?php
    $locurl = mysqli_real_escape_string($conn,$_GET['locurl']);
    $catUrl = mysqli_real_escape_string($conn,$_GET['caturl']);
    $listurl = mysqli_real_escape_string($conn,$_GET['listurl']);

$sql = "SELECT * FROM locations WHERE url = '$locurl' ";
 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $l_city = $row['city'];
        $locationId = $row['location_id'];
    }}
?>

<?php
 $sql2 = "SELECT * FROM categories WHERE url = '$catUrl' ";
 $result2 = $conn ->query($sql2);
 if($result2->num_rows > 0){
    while ($row = $result2->fetch_assoc()) {
        $c_title = $row['title'];
        $cat_id = $row['category_id'];
    }}
?>

<?php

    $sql = "SELECT * FROM listing_table WHERE url = '$listurl'";
    $result = $conn->query($sql);
    // output data of each row
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $list_id=$row['list_id'];
			$_SESSION['list_individual_id'] = $list_id;
            $correl_id = $row['correl_id'];
            $title = $row['title'];
            $about = $row['about'];
            $category_id = $row['category_id'];
            $location_id = $row['location_id'];
            $url = $row['url'];
            $meta_tags = $row['meta_tags'];
            $featured_image = $row['featured_image'];
            $pricing = $row['pricing'];
            $price_range = $row['price_range'];
            $position = $row['position'];
			$listname = $row['title'];
			$vendor_name = $row['vendor_name'];
			$v_business_name = $row['v_business_name'];
			$_SESSION['list_vendor_id'] = $v_business_name;
			$whatsapp_chat = $row['whatsapp_chat'];
			$live_booking = $row['live_booking'];

			$sql2 = "SELECT * FROM categories WHERE category_id = '$category_id'";
			$result2 = $conn->query($sql2);
			// output data of each row
			if($result2->num_rows > 0){
				while ($row = $result2->fetch_assoc()) {
					$cat_title = $row['title'];
				}
			}

			$sql3 = "SELECT * FROM locations WHERE location_id = '$location_id'";
			$result3 = $conn->query($sql2);
			// output data of each row
			if($result3->num_rows > 0){
				while ($row = $result3->fetch_assoc()) {
					$city = $row['city'];
				}
			}
        }
    }
?>

<!-- Titlebar
================================================== -->
<!-- Titlebar ================================================== -->
<div id="titlebar" class="solid" style="padding: 34px 0px 26px; margin-bottom: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="margin-top-0"><b><?php echo $title; ?></b></h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul style="font-size: 10px;">
						<li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
						<li><?php echo $l_city ?></li>
						<li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $locurl ?>/<?php echo $catUrl ?>"><?php echo $c_title ?></a></li>
						<li><?php echo $title ?></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
		<div class="row">
			<!-- Post Content -->
			<div class="col-lg-8 col-md-8 padding-right-30 margin-bottom-30">
				<!-- Blog Post -->
				<!-- <div class="post-image" style="background-image: url('https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>');">
					<img class="post-img" style="height: 400px; width: auto;" src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>" alt="">
				</div> -->
				<div class='img-blur-wrap'>
					<div class='img-blur-bg' style="background:linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3) ),  url('https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>') center no-repeat;"></div>
					<div class='img-blur' style="background:url('https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>') center no-repeat;"></div>
				</div>
				<!-- Blog Post / End -->
			</div>
	        <!-- Content / End -->
			
			<!-- Widgets -->
			<div class="col-lg-4 col-md-4">
				<div class="sidebar right box">
					<div class="row">
						<div class="col-12">
							<div class="text-center">
								<h3 style="color: black;"><span><i class="fa fa-inr margin-right-5" aria-hidden="true"></i></span><?php echo $price_range; ?></h3>
								
								<div class="margin-top-20"></div>
								<?php 
									$r_sql = "SELECT ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_id'";
									$r_result = $conn->query($r_sql);
									if($r_result->num_rows > 0){
										while ($row = $r_result->fetch_assoc()) {
											$prod_id=$row['product_id'];
											$rating = $row['avg_rating'];
										}
									}
									?>

									<?php 
									if($rating != '')
									{
									?>
										<!-- <span class="star"></span><div class="numerical-rating" data-rating="<?php echo $rating ?>"></div> -->
										<div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; display: flex; justify-content: center;"></div>
									<?php 
									}else{
									?>
										<div class="star-rating" style="padding: 0px 32px; display: flex; justify-content: center;">
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
										</div>
									<?php
									}
								?>

								<?php $catUrl_r = mysqli_real_escape_string($conn,$_GET['caturl']); ?>
								<a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $locurl ?>/<?php echo $catUrl_r ?>/<?php echo $listurl ?>/submitReview"><h4><span class="margin-right-10"><i class="sl sl-icon-star"></i></span>Write Review</h4></a>
								
								<div class="row margin-top-30">
									<?php if($whatsapp_chat != 'yes' && $live_booking !='yes'){?>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
											<a href="#" style="background: #ef55a0;" class="button w-60 margin-bottom-10 margin-top-0 fs" id="modalLink" data-bs-toggle="modal" data-bs-target="#mycontactModal"><i class="fa fa-user margin-left-0 margin-right-0" aria-hidden="true"></i>Contact</a>
										</div>
									<?php }else if($whatsapp_chat == 'yes' && $live_booking !='yes'){
									?>
										<div class="col-12 text-center">
											<a href="#" style="background: #ef55a0;" class="button w-60 margin-bottom-10 margin-top-0 fs" id="modalLink" data-bs-toggle="modal" data-bs-target="#mycontactModal"><i class="fa fa-user margin-left-0 margin-right-0" aria-hidden="true"></i>Contact</a>
										</div>
										<div class="col-12">
											<a style="background: #32bde6;" href="https://wa.me/919030099995" target="_blank" class="button w-60 margin-bottom-10 fullwidth margin-top-0 fs"  style="background-color: #64bc36;"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp Chat</a>
										</div>
									<?php }else if($whatsapp_chat === 'yes' && $live_booking === 'yes'){
									?>
										<div class="col-12 text-center">
											<a style="background: #ef55a0;" class="button w-60 margin-bottom-10 margin-top-0 fs" id="modalLink" data-bs-toggle="modal" data-bs-target="#mycheckavModal"><i class="fa fa-calendar margin-left-0 margin-right-0" aria-hidden="true"></i>Check availability</a>
										</div>
										<div class="col-12">
											<a style="background: #32bde6;" href="https://wa.me/919030099995" target="_blank" class="button w-60 margin-bottom-10 fullwidth margin-top-0 fs"  style="background-color: #64bc36;"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp Chat</a>
										</div>
									<?php }else if($whatsapp_chat != 'yes' && $live_booking ==='yes'){?>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
											<a style="background: #ef55a0;" class="button w-60 margin-bottom-10 margin-top-0 fs" id="modalLink" data-bs-toggle="modal" data-bs-target="#mycheckavModal"><i class="fa fa-calendar margin-left-0 margin-right-0" aria-hidden="true"></i>Check availability</a>
										</div>
									<?php } ?>	
								</div>
							</div>
						</div>
					</div>


					<div class="clearfix"></div>
					<div class="margin-bottom-40"></div>
				</div>
			</div>
		</div>
		<!-- Sidebar / End -->

		<div class="row">
			<div class="col-12 margin-top-30 margin-bottom-20">
				<div class="style-2 padding-right-10 padding-left-10">
					<!-- Tabs Navigation -->
					<ul class="tabs-nav">
						<li class="active"><a href="#tab1a"><i class="sl sl-icon-camera"></i> Photo Album</a></li>
						<li><a href="#tab2a"><i class="sl sl-icon-badge"></i> Attributes</a></li>
						<li><a href="#tab3a"><i class="sl sl-icon-info"></i> About</a></li>
						<li><a href="#tab4a"><i class="sl sl-icon-bubbles"></i> Comments</a></li>
					</ul>

					<!-- Tabs Content -->
					<div class="tabs-container">
						<div class="tab-content" id="tab1a">
							<div class="row">
								<div class="col-12 margin-bottom-20">
									<div class="listing-slider mfp-gallery-container margin-bottom-0" style="min-height: 100px;">
										<?php
											$sql = "SELECT * FROM listing_images WHERE correl_id = '$correl_id'";
											$result = $conn->query($sql);
											if($result->num_rows > 0){
											while ($row = $result->fetch_assoc()) {
												$id=$row['id'];
												$correl_id = $row['correl_id'];
												$image = $row['image_name'];
										?>
										<a href="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo rawurlencode($image); ?>" data-background-image="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo rawurlencode($image); ?>" class="item mfp-gallery" title="<?php echo $title;?>" style="min-height: 100px;width: 100px; margin: 0px 10px;"></a>
												<?php 
												}
											}
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-content" id="tab2a">
							<div class="style-2">
								<p><?php echo $pricing; ?></p>
							</div>
						</div>

						<div class="tab-content" id="tab3a">
							<div class="style-2 text">
								<p><?php echo $about; ?></p>
							</div>	
						</div>
						<div class="tab-content" id="tab4a">
							<div class="row">
								<div class="col-12">
									<!-- Reviews -->
									<section class="comments">
										<ul>
											<?php
											$sql = "SELECT * FROM comments WHERE product_id = $list_id";
											$result = $conn->query($sql);
											// output data of each row
											if($result->num_rows > 0){
												while ($row = $result->fetch_assoc()) {
													$r_id=$row['id'];
													$r_name = $row['name'];
													$r_description = $row['description'];
													$r_created_date = $row['created_date'];
											?>
											<li style="margin: 30px 0px;">
												<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
												<div class="comment-content"><div class="arrow-comment"></div>
													<div class="comment-by"><?php echo $r_name; ?><span class="date"><?php echo $r_created_date; ?></span>
														<!-- <a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a> -->
													</div>
													<p><?php echo $r_description; ?></p>
												</div>
											</li>
											<?php }} ?>

										</ul>

									</section>
									<div class="clearfix"></div>


									<!-- Add Comment -->
									<div id="add-review" class="add-review-box">

										<!-- Add Review -->
										<h3 class="listing-desc-headline margin-bottom-35">Add Comment</h3>
										<?php
										$sql_list = "SELECT * FROM listing_table WHERE url = '$listurl'";
										$result_list = $conn->query($sql_list);
										// output data of each row
										if($result_list->num_rows > 0){
											while ($row = $result_list->fetch_assoc()) {
												$list_id=$row['list_id'];
											}
											}
											if (isset($_POST['submit'])){
												$name=$_POST['name'];
												$email_id=$_POST['email_id'];
												$created_date =date('Y-m-d');
												$description = $_POST['description'];

												$sql = "INSERT INTO comments(name,email_id,description,product_id,created_date)
														VALUES('$name','$email_id','$description','$list_id','$created_date')";
												$insresult = $conn->query($sql);
												if($insresult === TRUE){
													$last_id = $conn->insert_id;
													// echo '<script> alert("Comment Posted Successfully");</script>';
													// echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/$locurl/$catUrl/$listurl';</script>";
												}
												else{
													echo '<script> alert("Something went wrong!");</script>';
												}
											}
										?>
										<!-- Review Comment -->
										<form id="add-comment" class="add-comment" enctype="multipart/form-data" method="POST">
											<fieldset>

												<div class="row">
													<div class="col-md-6">
														<label>Name:</label>
														<input type="text" value="" name="name" />
													</div>
														
													<div class="col-md-6">
														<label>Email:</label>
														<input type="email" value="" name="email_id" />
													</div>
												</div>

												<div>
													<label>Comment:</label>
													<textarea cols="40" rows="3" name="description" ></textarea>
												</div>

											</fieldset>

											<button type="submit" name="submit" class="button">Submit Comment</button>
											<div class="clearfix"></div>
										</form>

									</div>
									<!-- Add Review Box / End -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center">
				<h3 class="margin-bottom-40"><b>Popular <?php echo $c_title ?></b></h3>
			</div>
			<div class="col-12 col-lg-3 col-md-4 fw-carousel-item margin-bottom-30">
				<a class="listing-item-container">
					<div class="listing-item">
						<img src="https://mywedservices.s3.ap-south-1.amazonaws.com/1639997643_WhatsApp Image 2021-11-30 at 9.54.33 AM.jpeg" alt="">
					</div>
					<div class="star-rating" style="padding: 0px 32px; height: 68px;">
						<h3 class="text-transform">Lorem ipsum sit</h3>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<div class="rating-counter">(0 reviews)</div>
					</div>
					<div style="padding: 0px 32px 1px;">
						<p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> Lorem ipsum</p>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-3 col-md-4 fw-carousel-item margin-bottom-30">
				<a class="listing-item-container">
					<div class="listing-item">
						<img src="https://mywedservices.s3.ap-south-1.amazonaws.com/1639997643_WhatsApp Image 2021-11-30 at 9.54.33 AM.jpeg" alt="">
					</div>
					<div class="star-rating" style="padding: 0px 32px; height: 68px;">
						<h3 class="text-transform">Lorem ipsum sit</h3>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<div class="rating-counter">(0 reviews)</div>
					</div>
					<div style="padding: 0px 32px 1px;">
						<p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> Lorem ipsum</p>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-3 col-md-4 fw-carousel-item margin-bottom-30">
				<a class="listing-item-container">
					<div class="listing-item">
						<img src="https://mywedservices.s3.ap-south-1.amazonaws.com/1639997643_WhatsApp Image 2021-11-30 at 9.54.33 AM.jpeg" alt="">
					</div>
					<div class="star-rating" style="padding: 0px 32px; height: 68px;">
						<h3 class="text-transform">Lorem ipsum sit</h3>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<div class="rating-counter">(0 reviews)</div>
					</div>
					<div style="padding: 0px 32px 1px;">
						<p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> Lorem ipsum</p>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-3 col-md-4 fw-carousel-item margin-bottom-30">
				<a class="listing-item-container">
					<div class="listing-item">
						<img src="https://mywedservices.s3.ap-south-1.amazonaws.com/1639997643_WhatsApp Image 2021-11-30 at 9.54.33 AM.jpeg" alt="">
					</div>
					<div class="star-rating" style="padding: 0px 32px; height: 68px;">
						<h3 class="text-transform">Lorem ipsum sit</h3>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<div class="rating-counter">(0 reviews)</div>
					</div>
					<div style="padding: 0px 32px 1px;">
						<p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> Lorem ipsum</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>




  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $(function () {
			<?php
				if(isset($last_id)){
			?>
        swal.fire({
            title: "Comment Posted Successfully",
            icon: "success"
        }).then(function() {
        window.location = "http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $locurl ?>/<?php echo $catUrl?>/<?php echo $listurl ?>";
        });
			<?php
				}
			?>
    });
	</script>

    <script type="text/javascript">
    $(function () {
			<?php
				if(isset($new_id)){
			?>
        swal.fire({
            title: "Request Submitted Successfully",
            icon: "success"
        }).then(function() {
        window.location = "http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $locurl ?>/<?php echo $catUrl ?>/<?php echo $listurl ?>";
        });
			<?php
				}
			?>
    });
	</script>

<?php include("footer.php") ?>