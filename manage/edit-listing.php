<?php
include "dbconn.php";
session_start();
if (!isset($_SESSION['usernow'])) {
    echo "You are not authorized to view this page";
    exit(0);
  } else {
}
?>
<?php include("header.php") ?>
<?php include("sidebar.php") ?>
<?php require 'aws-sdk/aws-autoloader.php' ?>
        <div class="col-9 main-content">
            <div class="pt-3 px-3">
                <h4>Edit Listing</h4>
            </div>
            <div class="p-4">
                <div class="card">
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM listing_table WHERE list_id = $id";
                    $result = $conn->query($sql);
                    if($result -> num_rows >0){
                        while($row = $result->fetch_assoc()){
                            $id=$row['list_id'];
                            $correl_id = $row['correl_id'];
                            $title = $row['title'];
                            $location_id = $row['location_id'];
                            $category_id = $row['category_id'];
                            $url = $row['url'];
                            $meta_tags = $row['meta_tags'];
                            $price_range = $row['price_range'];
                            $about = $row['about'];
                            $pricing = $row['pricing'];
                            $featured_image = $row['featured_image'];
                            $v_b_name = $row['v_business_name'];
                            $position = $row['position'];
                            $v_number = $row['vendor_mobile_number'];
                            $v_planType = $row['vendor_plan_type'];
                            $live_booking = $row['live_booking'];
                            $whatsapp_chat = $row['whatsapp_chat'];
                            $thumb_img = $row['thumbnail_img'];


                            $cat_sql = "SELECT * FROM categories WHERE category_id = $category_id";
                            $cat_res = $conn->query($cat_sql);
                            if($result->num_rows > 0){
                                while ($row = $cat_res->fetch_assoc()) {
                                $cat_title = $row['title'];
                                }
                            }
                            $loc_sql = "SELECT * FROM locations WHERE location_id = $location_id";
                            $loc_res = $conn->query($loc_sql);
                            if($result->num_rows > 0){
                                while ($row = $loc_res->fetch_assoc()) {
                                $city_name = $row['city'];
                                }
                            }
                        }
                    }

                    if (isset($_POST['update'])){
                        $correl_id=uniqid();
                        $title=$_POST['title'];
                        $url=$_POST['url'];
                        $meta_tags = $_POST['meta_tags'];
                        $pricing = mysqli_real_escape_string($conn,$_POST['pricing']);
                        $about = mysqli_real_escape_string($conn,$_POST['about']);
                        $price_range = $_POST['price_range'];
                        $position = $_POST['position'];
                        $v_b_name = $_POST['v_business_name'];
                        $v_number = $_POST['vendor_mobile_number'];
                        $v_planType = $_POST['vendor_plan_type'];
                        $live_booking = $_POST['live_booking'];
                        $whatsapp_chat = $_POST['whatsapp_chat'];
                        $position = $_POST['position'];
                        $modified_date = date('Y-m-d');


                          if(isset($_FILES['image_name']['name']) && ($_FILES['image_name']['name'])!=""){
                              $errors= array();
                              $image = $_FILES['image_name']['name'];
                              $file_size =$_FILES['image_name']['size'];
                              $file_tmp =$_FILES['image_name']['tmp_name'];
                              $file_type=$_FILES['image_name']['type'];
                              $file_ext=strtolower(end(explode('.',$_FILES['image_name']['name'])));
                              $uploadFolder='uploads/';
                              $image_names = time()."_".$image;
                              $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

                              
                              $s3 = new Aws\S3\S3Client([
                                'region'  => 'ap-south-1',
                                'version' => 'latest',
                                'credentials' => [
                                    'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                                    'secret' => "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",
                                ]
                              ]);	
                      
                              $result = $s3->putObject([
                                  'Bucket' => 'mywedservices',
                                  'Key'    => $image_names,
                                  'SourceFile' => $file_tmp			
                              ]);
            
                              if(in_array($file_ext,$extensions)=== false){
                                  $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                                  echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                              }
            
                              if($file_size > 30000){
                                  $errors[]='File size should not exceed 30 KB';
                                  echo "<script> alert('File size should not exceed 30 KB');</script>";
                              }else{
                                  move_uploaded_file($file_tmp,$uploadFolder.$image_names);
                              }
                          }else{
                            $image_names=$featured_image;
                          }




                          if(isset($_FILES['thumbnail_img']['name']) && ($_FILES['thumbnail_img']['name'])!=""){
                            $errors= array();
                            $thumb_image = $_FILES['thumbnail_img']['name'];
                            $file_size =$_FILES['thumbnail_img']['size'];
                            $file_tmp =$_FILES['thumbnail_img']['tmp_name'];
                            $file_type=$_FILES['thumbnail_img']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['thumbnail_img']['name'])));
                            $uploadFolder='uploads/';
                            $thumbnail_img_name = time()."_".$thumb_image;
                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

                            $s3 = new Aws\S3\S3Client([
                              'region'  => 'ap-south-1',
                              'version' => 'latest',
                              'credentials' => [
                                  'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                                  'secret' => "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",
                              ]
                            ]);	
	
                    
                            $result = $s3->putObject([
                                'Bucket' => 'mywedservices',
                                'Key'    => $thumbnail_img_name,
                                'SourceFile' => $file_tmp			
                            ]);
          
                            if(in_array($file_ext,$extensions)=== false){
                                $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                                echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                            }
          
                            if($file_size > 30000){
                                $errors[]='File size should not exceed 30 KB';
                                echo "<script> alert('File size should not exceed 30 KB');</script>";
                            }else{
                                move_uploaded_file($file_tmp,$uploadFolder.$thumbnail_img_name);
                            }
                        }else{
                          $thumbnail_img_name=$thumb_img;
                        }
            
            
                         if(empty($errors)==true){
                          $sql_v = "SELECT * FROM vendor WHERE vendor_id = '$v_b_name'";
                          $res_v = $conn->query($sql_v);
                          if($res_v->num_rows >0){
                            while($row = $res_v->fetch_assoc()){
                              $vendor_planType = $row['plan_type'];
                              $m_number = $row['mobile_number'];
                              $cat_id = $row['business_type'];
                              $l_id = $row['city'];
                            }
                          }
                            $sql = "UPDATE listing_table SET `title`='$title',`url`='$url',`meta_tags`='$meta_tags',`featured_image`='$image_names',`category_id`='$cat_id',`location_id`='$l_id',`pricing`='$pricing',`about`='$about',`price_range`='$price_range',`v_business_name`='$v_b_name',`vendor_mobile_number`='$m_number',`vendor_plan_type`='$vendor_planType',`live_booking`='$live_booking',`whatsapp_chat`='$whatsapp_chat',`position`='$position',`thumbnail_img`='$thumbnail_img_name',`modified_date` = '$modified_date' WHERE list_id=$id";
                            $insresult = $conn->query($sql);
                            if($insresult === TRUE){
                                echo "<script>window.location.href='manage-listings.php';</script>";
                            }
                            else{
                                echo "<script> alert($errors);</script>";
                            }
                          }
                          else{
                              // print_r($errors);
                          }
                        }
                    ?>
                    <form action="" enctype="multipart/form-data" method="POST">
                      <div class="card-body p-4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Business Name</b></label>
                              <select name="v_business_name" class="form-select">
                              <?php
                                $sql = "SELECT * FROM vendor WHERE vendor_id = $v_b_name";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $id=$row['vendor_id'];
                                    $vn_name = $row['business_name'];
                                }
                                ?>
                                <option value="<?php echo $v_b_name ?>"><?php echo $vn_name; ?></option>
                                <option> -- Select Business Name -- </option>
                                <?php
                                    $sql = "SELECT * FROM vendor WHERE vendor_id != '$v_b_name'";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $id=$row['vendor_id'];
                                        $v_name = $row['business_name'];
                                        ?>
                                        <option value="<?php echo $row['vendor_id'] ?>"><?php echo $row['business_name']; ?></option>
                                        <?php
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Title</b></label>
                              <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="url" class="form-label"><b>Url</b></label>
                              <input type="text" name="url" class="form-control" value="<?php echo $url; ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Meta Tags</b></label>
                              <input type="text" name="meta_tags" class="form-control" value="<?php echo $meta_tags; ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Featured Image</b></label>
                              <input type="file" name="image_name" class="form-control">
                              <div class="col-md-12 bg-light p-3">
                                <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image ?>" height="200px">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Thumbnail Image</b></label>
                              <input type="file" name="thumbnail_img" class="form-control">
                              <div class="col-md-12 bg-light p-3">
                                <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumb_img ?>" height="200px">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Price Range</b></label>
                              <input type="text" name="price_range" class="form-control" value="<?php echo $price_range; ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Position</b></label>
                              <input type="text" name="position" class="form-control" value="<?php echo $position; ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Attributes</b></label>
                              <textarea name="pricing" class="form-control ckeditor"><?php echo $pricing ?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>About</b></label>
                              <textarea name="about" class="form-control ckeditor"><?php echo $about ?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="hidden" name="live_booking" <?php if($live_booking=="no") {echo "checked";}?> value="no">
                                <input class="form-check-input" type="checkbox" name="live_booking" <?php if($live_booking=="yes") {echo "checked";}?> value="yes">
                                <label class="form-check-label">
                                  Live Booking
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="hidden" name="whatsapp_chat" <?php if($whatsapp_chat=="no") {echo "checked";}?> value="no">
                                <input class="form-check-input" type="checkbox" name="whatsapp_chat" <?php if($whatsapp_chat=="yes") {echo "checked";}?> value="yes">
                                <label class="form-check-label">
                                  Whatsapp Chat
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer bg-light d-flex justify-content-center">
                          <button type="submit" class="btn btn-info text-light" name="update">Update</button>
                          <a class="btn btn-secondary ms-3" href="manage-listings.php">Cancel</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

 <?php include("footer.php") ?>