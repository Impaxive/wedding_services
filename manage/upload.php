<?php
require 'http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/aws-sdk/aws-sdk/aws-autoloader.php';
use Aws\S3\s3config;
use Aws\S3\Exception\S3Exception;
$s3config = array(
            'region'  => 'us-west-2',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'AKIA4SCJ2F7S4YY6WCCQ',//Put key here
                'secret' => '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'// Put Secret here
            ]
        );
$bucket = 'mywedservices'; 
?>
<form enctype="multipart/form-data" method="POST">
    <input type='file' name='image_name'>
    <input type='submit' name="submit">
</form>

<?php 
if($_POST['submit'])
{
	

    if(isset($_FILES['image_name']['name']) && ($_FILES['image_name']['name'])!=""){
        $errors= array();
        $image = $_FILES['image_name']['name'];
        $file_size =$_FILES['image_name']['size'];
        $file_tmp =$_FILES['image_name']['tmp_name'];
        $file_type=$_FILES['image_name']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image_name']['name'])));
        // $uploadFolder='uploads/';
        $image_names = time()."_".$image;   
        $extensions= array("jpeg","jpg","png","PNG","JPG","JPEG");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            echo "<script> alert('extension not allowed, please choose a JPEG or PNG file.');</script>";
        }

        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
            echo "<script> alert('File size must be excately 2 MB');</script>";
        }else{
            // move_uploaded_file($file_tmp,$uploadFolder.$image_names);
            // $tmpfile = $_FILES['file'];
            $s3 = new Aws\S3\S3Client($s3config);
            $key = $image_names;
            // echo $file_url;
            echo $key;
            $result = $s3->putObject([
                'Bucket' => $bucket,
                'Key'    => $key,
                'SourceFile' => $file_tmp,
                'ACL'   => 'public-read'
            ]);
            $file_url = $result['ObjectURL'];
                echo 'Upload Success';
            }
            var_dump($result);
        }
        
           
	
       
}
?>
