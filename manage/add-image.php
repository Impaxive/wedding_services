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
<div class="col-9 main-content bg-color">
    <div class="pt-3 px-3">
        <h4>Add Image</h4>
    </div>
    <div class="p-4">
        <div class="card">
        <?php
            $correl_id=$_GET['id'];
            // echo $correl_id;
            if (isset($_POST['submit'])){
                $created_date =date('Y-m-d');
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
                        $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file";
                        echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file');</script>";
                    }

                    if($file_size > 150000){
                        $errors[]='File size should not exceed 150 KB';
                        echo "<script> alert('File size should not exceed 150 KB');</script>";
                    }else{
                        move_uploaded_file($file_tmp,$uploadFolder.$image_names);
                    }
                }
                if(empty($errors)==true){
                $sql = "INSERT INTO listing_images(correl_id,image_name,created_date)
                        VALUES('$correl_id','$image_names','$created_date')";
                // echo $sql;
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label><b>Image</b></label>
                                <input type="file" id="image" name="image_name" class="form-control">
                                <div class="col-lg-12 margin-15px-top">
                                    <p><span class="text-danger">Note :</span> Imange Size : Size of the image should be less than 150 KB and only JPG , JPEG and PNG formats are allowed.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-center">
                    <button class="btn btn-info text-light" type="submit" name="submit">Submit</button>
                    <a class="btn btn-secondary ms-3" href="manage-listings.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

   <?php include("footer.php") ?>