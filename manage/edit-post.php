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
            <h4>Edit Post</h4>
        </div>
        <div class="p-4">
            <div class="card">
            <?php 
                $id=$_GET['id'];
                $sql = "SELECT * FROM posts WHERE post_id='$id'";
                $result = $conn->query($sql);
                // output data of each row
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $id=$row['post_id'];
                        $title=$row['title'];
                        $url=$row['url'];
                        $meta_tags = $row['tags'];
                        $post_content = $row['post_content'];
                        $featured_image = $row['featured_image'];
                        $thumbnail_img = $row['thumbnail_img'];
                    }
                }
                mysqli_free_result($result);
        
                if (isset($_POST['update'])){
                    $title=$_POST['title'];
                    $url=$_POST['url'];
                    $modified_date =date('Y-m-d');
                    $meta_tags = $_POST['meta_tags'];
                    $post_content = $_POST['post_content'];

                    $s3 = new Aws\S3\S3Client([
                        'region'  => 'ap-south-1',
                        'version' => 'latest',
                        'credentials' => [
                            'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                            'secret' => "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",
                        ]
                    ]);		

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
                      $thumbnail_img_name=$thumbnail_img;
                    }

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
                     if(empty($errors)==true){
                      $sql = "UPDATE posts SET `title`='$title',`url`='$url',`tags`='$meta_tags',`featured_image`='$image_names',`post_content`='$post_content',`thumbnail_img`='$thumbnail_img_name',`modified_date` = '$modified_date' WHERE post_id='$id'";
                      $upresult = $conn->query($sql);
                      if($upresult === TRUE){
                            echo "<script>window.location.href='manage-posts.php';</script>";
                        }
                        else{
                            echo '<script> alert("Something went wrong!");</script>';
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
                                    <label for="title" class="form-label"><b>Title</b></label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="url" class="form-label"><b>Url</b></label>
                                    <input type="text" name="url" class="form-control" value="<?php echo $url ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tags" class="form-label"><b>Tags</b></label>
                                    <input type="text" name="meta_tags" class="form-control" value="<?php echo $meta_tags ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="featuredImage" class="form-label"><b>Featured Image</b></label>
                                    <input type="file" name="image_name" class="form-control">
                                    <div class="col-md-12 bg-light p-3">
                                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image ?>" height="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="featuredImage" class="form-label"><b>Thumbnail Image</b></label>
                                    <input type="file" name="thumbnail_img" class="form-control">
                                    <div class="col-md-12 bg-light p-3">
                                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img ?>" height="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="postContent"><b>Post Content</b></label>
                                    <textarea class="form-control" name="post_content" rows="3"><?php echo $post_content ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-light" name="update">Update</button>
                        <a class="btn btn-secondary ms-3" href="manage-posts.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>