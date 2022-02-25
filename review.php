<?php include('dbconn.php') ?>
<?php include("header.php") ?>
<?php
  $locurl_r = mysqli_real_escape_string($conn,$_GET['locurl_r']);
  $catUrl_r = mysqli_real_escape_string($conn,$_GET['caturl_r']);
  $listurl_r = mysqli_real_escape_string($conn,$_GET['listurl_r']);
  $listname_r = mysqli_real_escape_string($conn,$_GET['listname_r']);

$sql = "SELECT * FROM locations WHERE url = '$locurl_r' ";
 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $l_city = $row['city'];
        $locationId = $row['location_id'];
    }}
?>

<?php
 $sql2 = "SELECT * FROM categories WHERE url = '$catUrl_r' ";
 $result2 = $conn ->query($sql2);
 if($result2->num_rows > 0){
    while ($row = $result2->fetch_assoc()) {
        $c_title = $row['title'];
        $cat_id = $row['category_id'];
    }}
?>


<?php
    $sql = "SELECT * FROM listing_table WHERE url = '$listurl_r'";
    $result = $conn->query($sql);
    // output data of each row
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $list_id=$row['list_id'];
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

<style>

/* Code By Webdevtrick ( https://webdevtrick.com ) */

#form {
  display: flex;
  flex-direction: column-reverse;
  justify-content: center;
  align-items: center;
  max-width: 800px;
  height: 100%;
  margin: auto;
}
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  width: 100%;
  height: 100%;
}
.reset {
  display: none;
  position: absolute;
  top: 100%;
  left: 50%;
  margin: auto;
  padding: 12px 24px;
  color: #4d4d4d;
  background: #f0f0f0;
  border-radius: 60px;
  font-family: "Helvetica", sans-serif;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  outline: none;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}
.reset:hover {
  background: #fbc416;
}
input, label {
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.stars {
  position: relative;
}
.stars input {
  display: none;
}
.stars input:checked ~ label:not(.reset) {
  -webkit-animation: wobble 0.8s ease-out;
          animation: wobble 0.8s ease-out;
  color: #fbc416;
}
.stars input:checked:not(#star-reset) ~ label.reset {
  display: block;
}
.stars label:not(.reset) {
  display: inline-block;
  float: right;
  position: relative;
  width: 40px;
  height: 40px;
  font-size: 40px;
  padding: 2px;
  cursor: pointer;
  color: #3d3d3d;
  transition: color 0.1s ease-out;
  z-index: 10;
}
.face {
  position: relative;
  width: 200px;
  background: white;
  border: 6px solid #f0f0f0;
  border-radius: 100%;
  margin: 80px 0 50px;
  transition: box-shadow 0.4s ease-out;
}
.face:after {
  content: "";
  display: block;
  padding-bottom: 100%;
}
.eyes {
  position: absolute;
  top: 50%;
  display: block;
  width: 14px;
  height: 14px;
  border-radius: 100%;
  background: #f0f0f0;
}
.eyes:nth-child(1) {
  left: 30%;
}
.eyes:nth-child(2) {
  right: 30%;
}
u {
  position: absolute;
  right: 0;
  bottom: 25%;
  left: 0;
  margin: auto;
  width: 24px;
  height: 24px;
  text-decoration: none;
  border: 6px solid #f0f0f0;
  border-radius: 100%;
}
u:before, u:after {
  content: "";
  position: absolute;
  top: 15px;
  width: 6px;
  height: 6px;
  background: #f0f0f0;
  border-radius: 60px 60px 0 0;
  z-index: 2;
}
u:before {
  left: -5px;
  -webkit-transform: rotate(-32deg);
          transform: rotate(-32deg);
}
u:after {
  right: -5px;
  -webkit-transform: rotate(32deg);
          transform: rotate(32deg);
}
u .cover {
  position: absolute;
  top: -6px;
  left: -6px;
  width: 100%;
  height: 100%;
  border: 6px solid white;
  background: white;
  -webkit-transform: translate(0, -12px);
          transform: translate(0, -12px);
}
 
input#star4:checked ~ .face u,
input#star2:checked ~ .face u {
  width: 36px;
}
input#star4:checked ~ .face u:before, input#star4:checked ~ .face u:after,
input#star2:checked ~ .face u:before,
input#star2:checked ~ .face u:after {
  top: 18px;
  height: 10px;
}
input#star4:checked ~ .face u:before,
input#star2:checked ~ .face u:before {
  left: 0px;
  -webkit-transform: rotate(-66deg);
          transform: rotate(-66deg);
}
input#star4:checked ~ .face u:after,
input#star2:checked ~ .face u:after {
  right: 0px;
  -webkit-transform: rotate(66deg);
          transform: rotate(66deg);
}
input#star4:checked ~ .face u .cover,
input#star2:checked ~ .face u .cover {
  -webkit-transform: translate(0, -8px);
          transform: translate(0, -8px);
}
 
input#star5:checked ~ .face u,
input#star4:checked ~ .face u {
  -webkit-transform: rotate(180deg) translateY(-20px);
          transform: rotate(180deg) translateY(-20px);
}
 
input#star3:checked ~ .face u {
  width: 42px;
  height: 6px;
  background: #3d3d3d;
  border: none;
  border-radius: 60px;
  -webkit-transform: translateY(-4px);
          transform: translateY(-4px);
}
input#star3:checked ~ .face u:before, input#star3:checked ~ .face u:after,
input#star3:checked ~ .face u .cover {
  display: none;
}
 
input:not(#star-reset):checked ~ .face {
  -webkit-animation: wobble 0.8s ease-out;
          animation: wobble 0.8s ease-out;
}
input:not(#star-reset):checked ~ .face,
input:not(#star-reset):checked ~ .face u {
  border-color: #3d3d3d;
}
input:not(#star-reset):checked ~ .face i,
input:not(#star-reset):checked ~ .face u:before,
input:not(#star-reset):checked ~ .face u:after {
  background: #3d3d3d;
}
 
input#star5:checked ~ .face {
  background-color: #fa5563;
}
input#star5:checked ~ .face u .cover {
  background: #fa5563;
  border-color: #fa5563;
}
 
input#star4:checked ~ .face {
  background-color: #fa824e;
}
input#star4:checked ~ .face u .cover {
  background: #fa824e;
  border-color: #fa824e;
}
 
input#star3:checked ~ .face {
  background-color: #fccd3f;
}
 
input#star2:checked ~ .face {
  background-color: #a0d77a;
}
input#star2:checked ~ .face u .cover {
  background: #a0d77a;
  border-color: #a0d77a;
}
 
input#star1:checked ~ .face {
  background-color: #6bca6c;
}
input#star1:checked ~ .face u .cover {
  background: #6bca6c;
  border-color: #6bca6c;
}
 
@-webkit-keyframes wobble {
  0% {
    -webkit-transform: scale(0.8);
            transform: scale(0.8);
  }
  20% {
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  40% {
    -webkit-transform: scale(0.9);
            transform: scale(0.9);
  }
  60% {
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
  }
  80% {
    -webkit-transform: scale(0.96);
            transform: scale(0.96);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
 
@keyframes wobble {
  0% {
    -webkit-transform: scale(0.8);
            transform: scale(0.8);
  }
  20% {
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  40% {
    -webkit-transform: scale(0.9);
            transform: scale(0.9);
  }
  60% {
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
  }
  80% {
    -webkit-transform: scale(0.96);
            transform: scale(0.96);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
</style>

<!-- Titlebar ================================================== -->
<section class="titlebar">
	<div id="titlebar" class="solid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2><?php echo $title; ?></h2>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
							<li><a href="#"><?php echo $l_city ?></a></li>
							<li><?php echo $c_title ?></li>
							<li><?php echo $title ?></li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>
</section>


<!-- Content
================================================== -->
<div class="container">
  <!-- Blog Posts -->
  <div class="blog-page">
    <div class="row">
      <div class="col-12">
        <!-- Post Content -->
        
        <!-- Content / End -->
        
        <!-- Widgets -->
        <div class="col-lg-4 col-md-4 padding-right-30">


          <!-- Blog Post -->
          <div class="blog-post single-post">
            
            <!-- Img -->
            <img class="post-img" src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>" alt="">
          </div>
          <!-- Blog Post / End -->
        </div>
        <div class="col-lg-8 col-md-8">
          <div class="sidebar right">
            <div class="row">
              <div class="col-12">
                <h6 class="alt font"><?php echo $cat_title ?></h6>
                <h3 class="alt font text-uppercase"><b><?php echo $title; ?></b></h3>
                <p><?php echo $about ?></p>	
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="margin-bottom-40"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h4>Your review will help other users make the best choice!</h4>
        <hr>
        <div class=" margin-bottom-40">
          <?php
           $sql_list = "SELECT * FROM listing_table WHERE url = '$listurl_r'";
           $result_list = $conn->query($sql_list);
           // output data of each row
           if($result_list->num_rows > 0){
             while ($row = $result_list->fetch_assoc()) {
               $list_id=$row['list_id'];
             }
            }
            if (isset($_POST['submit'])){
              $title=$_POST['title'];
              $f_name = $_POST['first_name'];
              $l_name = $_POST['last_name'];
              $email_id=$_POST['email_id'];
              $desc = $_POST['description'];
              $ratings = $_POST['stars'];
              $name = $_POST['name'];
              $created_date =date('Y-m-d');
              $description = $_POST['description'];

              $sql = "INSERT INTO add_review(product_id,title,email_id,description,first_name,last_name,rating,created_date)
                  VALUES('$list_id','$title','$email_id','$desc','$f_name','$l_name','$ratings','$created_date')";
              $insresult = $conn->query($sql);
              if($insresult === true){
                $last_id = $conn->insert_id;
                // echo $locurl_r;
                // echo $catUrl_r;
                // echo $listurl_r;
                // echo '<script>alert("Review Submitted Successfully")</script>';
                // echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/$locurl_r/$catUrl_r/$listurl_r/submitReview;</script>";
              }
              else{
                echo '<script> alert("Something went wrong!");</script>';
              }
            }
          ?>
          <!-- <span class="margin-right-10"><i class="sl sl-icon-star"></i></span> -->
          <form id="form" enctype="multipart/form-data" method="POST">
            <fieldset class="stars">
                <input type="radio" name="stars" id="star1" value="5" ontouchstart="ontouchstart"/>
                <label class="fa fa-star" for="star1"></label>
                <input type="radio" name="stars" id="star2" value="4" ontouchstart="ontouchstart"/>
                <label class="fa fa-star" for="star2"></label>
                <input type="radio" name="stars" id="star3" value="3" ontouchstart="ontouchstart"/>
                <label class="fa fa-star" for="star3"></label>
                <input type="radio" name="stars" id="star4" value="2" ontouchstart="ontouchstart"/>
                <label class="fa fa-star" for="star4"></label>
                <input type="radio" name="stars" id="star5" value="1" ontouchstart="ontouchstart"/>
                <label class="fa fa-star" for="star5"></label>
                <input type="radio" name="stars" id="star-reset"/>
                <label class="reset" for="star-reset">reset</label>
                <figure class="face"><i class="eyes"></i><i class="eyes"></i>
                <u>
                    <div class="cover"></div>
                </u>
                </figure>
            <!-- </fieldset>
          </form> -->
        </div>
      </div>
      <div class="col-lg-12">
        <!-- Add Comment -->
        <div id="add-review" class="">
          <!-- Review Comment -->
          <!-- <form id="add-comment" class="add-comment">
            <fieldset> -->
              <div class="row">
                <div class="col-md-12">
                  <label>Title of your review</label>
                  <input type="text" value="" name="title" placeholder="Highlight an interesting detail"/>
                </div>
                  
                <div class="col-md-12">
                  <label>Your review:</label>
                  <input type="text" value="" name="description" placeholder="Tell people about your experience"/>
                </div>
              
                <div class="col-md-12">
                  <label>Your Name:</label>
                </div>
                <div class="col-md-6">
                  <input type="text" value="" name="first_name" placeholder="First Name"/>
                </div>
                <div class="col-md-6">
                  <input type="text" value="" name="last_name" placeholder="Last Name"/>
                </div>
                <div class="col-md-12">
                  <label>Your  Email</label>
                  <input type="email" value="" name="email_id" placeholder="Your Email Address"/>
                </div>
              </div>
            </fieldset>
            <button type="submit" name="submit" class="button text-center">Submit Review</button>
            <div class="clearfix"></div>
          </form>
        </div>
        <!-- Add Review Box / End -->
      </div>
    </div>
    <div class="margin-bottom-40"></div>
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
          title: "Review Submitted Successfully",
          icon: "success"
      }).then(function() {
      window.location = "http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $locurl_r?>/<?php echo $catUrl_r?>/<?php echo $listurl_r?>/submitReview";
      });
			<?php
				}
			?>
        });
	</script>

<?php include("footer.php") ?>