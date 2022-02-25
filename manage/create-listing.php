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

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Services</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head> -->

        <div class="col-9 main-content">
            <div class="pt-3 px-3">
                <h4>Create Listing</h4>
            </div>
            <div class="p-4">
                <div class="card">
                    <?php 
                    if (isset($_POST['submit'])){
                        $correl_id=uniqid();
                        $title=$_POST['title'];
                        $url=$_POST['url'];
                        $meta_tags = $_POST['meta_tags'];
                        $pricing = mysqli_real_escape_string($conn,$_POST['pricing']);
                        $about = mysqli_real_escape_string($conn,$_POST['about']);
                        $price_range = $_POST['price_range'];
                        $vendor_name = $_POST['vendor_name'];
                        $live_booking = $_POST['live_booking'];
                        $whatsapp_chat = $_POST['whatsapp_chat'];
                        $position = $_POST['position'];
                        $created_date =date('Y-m-d');

                        $s3 = new Aws\S3\S3Client([
                          'region'  => 'ap-south-1',
                          'version' => 'latest',
                          'credentials' => [
                              'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                              'secret' => "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",
                          ]
                        ]);	

                        if(isset($_FILES['featured_image']['name']) && ($_FILES['featured_image']['name'])!="")
                        {
                            $errors= array();
                            $image = $_FILES['featured_image']['name'];
                            $file_size =$_FILES['featured_image']['size'];
                            $file_tmp =$_FILES['featured_image']['tmp_name'];
                            $file_type=$_FILES['featured_image']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['featured_image']['name'])));
                            $uploadFolder='uploads/';
                            $image_names = time()."_".$image;
                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

                            $result = $s3->putObject([
                              'Bucket' => 'mywedservices',
                              'Key'    => $image_names,
                              'SourceFile' => $file_tmp			
                            ]);
            
                            if(in_array($file_ext,$extensions)=== false){
                                $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                                echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                            }
            
                            if($file_size > 2097152){
                                $errors[]='File size should not exceed 2 MB';
                                echo "<script> alert('File size should not exceed 2 MB');</script>";
                            }else{
                                move_uploaded_file($file_tmp,$uploadFolder.$image_names);
                            }
                        }

                        if(isset($_FILES['thumbnail_img']['name']) && ($_FILES['thumbnail_img']['name'])!="")
                        {
                            $errors= array();
                            $thumb_image = $_FILES['thumbnail_img']['name'];
                            $file_size =$_FILES['thumbnail_img']['size'];
                            $file_tmp =$_FILES['thumbnail_img']['tmp_name'];
                            $file_type=$_FILES['thumbnail_img']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['thumbnail_img']['name'])));
                            $uploadFolder='uploads/';
                            $thumbnail_img = time()."_".$thumb_image;
                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

                            $result = $s3->putObject([
                              'Bucket' => 'mywedservices',
                              'Key'    => $thumbnail_img,
                              'SourceFile' => $file_tmp			
                            ]);
            
                            if(in_array($file_ext,$extensions)=== false){
                                $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                                echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                            }
            
                            if($file_size > 2097152){
                                $errors[]='File size should not exceed 2 MB';
                                echo "<script> alert('File size should not exceed 2 MB');</script>";
                            }else{
                                move_uploaded_file($file_tmp,$uploadFolder.$thumbnail_img);
                            }
                        }
            
                        $img='';
                        $imageCount=count($_FILES['album_images']['name']);
                        for($i=0;$i<$imageCount;$i++){
                            $errors= array();
                            $imgName = $_FILES['album_images']['name'][$i];
                            $imageTmpName = $_FILES['album_images']['tmp_name'][$i];
                            $uploadFolder = 'uploads/';
                            $alubumImg = time()."_".$imgName;
                            $file_size =$_FILES['album_images']['size'][$i];
                            $file_ext=strtolower(end(explode('.',$_FILES['album_images']['name'][$i])));

                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

                            $result = $s3->putObject([
                              'Bucket' => 'mywedservices',
                              'Key'    => $alubumImg,
                              'SourceFile' => $imageTmpName			
                            ]);

                            if(in_array($file_ext,$extensions)=== false){
                              $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                              echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                            }
            
                            if($file_size > 2097152){
                                $errors[]='File size should not exceed 2 MB';
                                echo "<script> alert('File size should not exceed 2 MB');</script>";
                            }else{
                                if(move_uploaded_file($imageTmpName,$uploadFolder.$alubumImg)){
                                    $query="INSERT INTO listing_images(correl_id,image_name,created_date)VALUES('$correl_id','$alubumImg','$created_date')";
                                    $res=$conn->query($query);
            
                                    // echo $conn->error;
                                }
                            }
                        }
            
                         if(empty($errors)==true){
                          $sql_v = "SELECT * FROM vendor WHERE vendor_id = '$vendor_name'";
                          $res_v = $conn->query($sql_v);
                          if($res_v->num_rows >0){
                            while($row = $res_v->fetch_assoc()){
                              $vendor_planType = $row['plan_type'];
                              $m_number = $row['mobile_number'];
                              $cat_id = $row['business_type'];
                              $l_id = $row['city'];
                            }
                          }
                            $sql = "INSERT INTO listing_table(correl_id,title,url,meta_tags,featured_image,category_id,location_id,pricing,about,price_range,position,vendor_name,v_business_name,vendor_plan_type,vendor_mobile_number,live_booking,whatsapp_chat,thumbnail_img,created_date)
                                    VALUES('$correl_id','$title','$url','$meta_tags','$image_names','$cat_id','$l_id','$pricing','$about','$price_range',$position,'Vendor Name','$vendor_name','$vendor_planType','$m_number','$live_booking','$whatsapp_chat','$thumbnail_img','$created_date')";
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
                              <select name="vendor_name" class="form-select">
                                <option>--Select Business Name--</option>
                                <?php 
                                   $sql = "SELECT * FROM vendor";
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
                              <input type="text" name="title" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="url" class="form-label"><b>Url</b></label>
                              <input type="text" name="url" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Meta Tags</b></label>
                              <input type="text" name="meta_tags" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Featured Image</b></label>
                              <input type="file" name="featured_image" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Thumbnail Image</b></label>
                              <input type="file" name="thumbnail_img" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Photo Album</b></label>
                              <input type="file" name="album_images[]" multiple class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label><b>Price Range</b></label>
                                <input type="text" name="price_range" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label><b>Position</b></label>
                                <input type="text" name="position" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Attributes</b></label>
                              <textarea name="pricing" class="form-control ckeditor"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>About</b></label>
                              <textarea name="about" class="form-control ckeditor"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="hidden" name="live_booking" value="no">
                                <input class="form-check-input" type="checkbox" name="live_booking" value="yes">
                                <label class="form-check-label">
                                  Live Booking
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="hidden" name="whatsapp_chat" value="no">
                                <input class="form-check-input" type="checkbox" name="whatsapp_chat" value="yes">
                                <label class="form-check-label">
                                  Whatsapp Chat
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer bg-light d-flex justify-content-center">
                          <button type="submit" class="btn btn-info text-light" name="submit">Submit</button>
                          <a class="btn btn-secondary ms-3" href="manage-listings.php">Cancel</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>


    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>  

<?php include("footer.php") ?>