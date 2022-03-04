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
            <h4>Create Category</h4>
        </div>
        <div class="p-4">
            <div class="card">
                <?php 
                  if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $url = $_POST['url'];
                        $meta_tags = $_POST['meta_tags'];
                        $desc = $_POST['description'];
                        $created_date = date('Y-m-d');

                        $s3 = new Aws\S3\S3Client([
                            'region'  => 'ap-south-1',
                            'version' => 'latest',
                            'credentials' => [
                                'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                                'secret' => "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",
                            ]
                        ]);	

                        if(isset($_FILES['image_name']['name']) && ($_FILES['image_name']['name'])!= ''){
                            $errors = array();
                            $imagename = $_FILES['image_name']['name'];
                            $file_size = $_FILES['image_name']['size'];
                            $file_tmp = $_FILES['image_name']['tmp_name'];
                            $file_type = $_FILES['image_name']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['image_name']['name'])));
                            $uploadFolder='uploads/';
                            $image_names = time()."_".$imagename;
                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");
                    
                            $result = $s3->putObject([
                                'Bucket' => 'mywedservices',
                                'Key'    => $image_names,
                                'SourceFile' => $file_tmp			
                            ]);
                    
                            // var_dump($result);


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
                                        
                        }



                        if(isset($_FILES['thumbnail_img']['name']) && ($_FILES['thumbnail_img']['name'])!= ''){
                            $errors = array();
                            $thumb_img = $_FILES['thumbnail_img']['name'];
                            $file_size = $_FILES['thumbnail_img']['size'];
                            $file_tmp = $_FILES['thumbnail_img']['tmp_name'];
                            $file_type = $_FILES['thumbnail_img']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['thumbnail_img']['name'])));
                            $uploadFolder='uploads/';
                            $thumbnail_img = time()."_".$thumb_img;
                            $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");
	
                    
                            $result = $s3->putObject([
                                'Bucket' => 'mywedservices',
                                'Key'    => $thumbnail_img,
                                'SourceFile' => $file_tmp			
                            ]);
                    
                            // var_dump($result);


                            if(in_array($file_ext,$extensions)=== false){
                                $errors[]="Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.";
                                echo "<script> alert('Only Images are allowed. Please choose a JPG OR JPEG OR PNG file.');</script>";
                            }

                            if($file_size > 30000){
                                $errors[]='File size should not exceed 30 KB';
                                echo "<script> alert('File size should not exceed 30 KB');</script>";
                            }else{
                                move_uploaded_file($file_tmp,$uploadFolder.$thumbnail_img);
                            }
                                        
                        }

                        if(empty($errors)==true){
                            $sql = "INSERT INTO categories(title,description,url,meta_tags,featured_image,thumbnail_img,created_date)
                                    VALUES('$title','$desc','$url','$meta_tags','$image_names','$thumbnail_img','$created_date')";
                            // echo $sql;
                            $insresult = $conn->query($sql);
                            if($insresult === TRUE){
                                echo "<script>window.location.href='manage-categories.php';</script>";
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
                                    <label><b>Title</b></label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><b>Url</b></label>
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
                                    <input type="file" name="image_name" class="form-control">
                                    <div class="col-lg-12 margin-15px-top">
                                        <p><span class="text-danger">Note :</span> Imange Size : Size of the image should be less than 30 KB and only JPG , JPEG and PNG formats are allowed.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><b>Thumbnail Image</b></label>
                                    <input type="file" name="thumbnail_img" class="form-control">
                                    <div class="col-lg-12 margin-15px-top">
                                        <p><span class="text-danger">Note :</span> Imange Size : Size of the image should be less than 30 KB and only JPG , JPEG and PNG formats are allowed.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><b>Description</b></label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-light" name="submit">Submit</button>
                        <a class="btn btn-secondary ms-3" href="manage-categories.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>