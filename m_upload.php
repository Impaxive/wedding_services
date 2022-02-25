<?php 
require 'aws-sdk/aws-sdk/aws-autoloader.php';
// define("IMAGE_URL", "https://codercasts.s3.eu-west-1.amazonaws.com/");

if(isset($_POST['submit']))
    {
        $allowedFileType = array('JPG', 'PNG', 'JPEG', 'jpg', 'jpeg', 'png', 'gif');
        
        // Velidate if files exist
        if (!empty(array_filter($_FILES['img']['name']))) 
            {
                // Loop through file items
                foreach($_FILES['img']['name'] as $id=>$val)
                    {
                        // Get files upload path
                        $img        = $_FILES['img']['name'][$id];
                        $tempLocation    = $_FILES['img']['tmp_name'][$id];
                        $targetFilePath  = $img;
                        $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                        // if(in_array($fileType, $allowedFileType))
                        //     {
                        //         $sql = "INSERT INTO images (img) VALUES (:img)";
                        //         $statement = $db->prepare($sql);
                        //         $statement->bindParam(':img'	,	$img  , PDO::PARAM_STR);
                        //         try
                        //             {
                        //                 $statement->execute();
                        //                 $success = "Upload successful";
                        //             }
                        //         catch(PDOException $e)
                        //             {
                        //                 echo $e;
                        //                 $failed = "There was an issue, please try again";
                        //             }
                        //     }
                        // else
                        //     {
                        //         $error = "Only .jpg, .jpeg and .png file formats allowed.";
                        //     }
                        
                        
                        if(in_array($fileType, $allowedFileType))
                            {
                                $s3 = new Aws\S3\S3Client([
                                    'region'  => 'ap-south-1',
                                    'version' => 'latest',
                                    'credentials' => [
                                        'key'    => "AKIA4SCJ2F7S4SGSCSGK",
                                        'secret' => "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",
                                    ]
                                ]);		
                                try
                                    {
                                        // $result = $s3->putObject([
                                        // 'Bucket' => 'AWS S3 BUCKET',
                                        // 'Key'    => $img,
                                        // 'SourceFile' => $tempLocation,
                                        // 'ACL'    => 'public-read',
                                        // 'ContentType' => 'image/png'		
                                        // ]);

                                        $result = $s3->putObject([
                                            'Bucket' => 'mywedservices',
                                            'Key'    => $img,
                                            'SourceFile' => $tempLocation			
                                        ]);
                                    }
                                catch(S3Exception $e)
                                    {
                                        echo $e;
                                    }
                                $uploaded_images = $result['ObjectURL'] . PHP_EOL;
                            } 
                        else 
                            {
                                $response = array(
                                    "status" => "alert-danger",
                                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                                );
                            }
                    }
            } 
    }    

    if(isset($success))
    {
        echo $success;
    }
if(isset($failed))
    {
        echo $failed;
    }
if(isset($error))
    {
        echo $error;
    }
?>
<!-- <html>
    <body> -->
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> 
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="img[]" class="form-control" multiple>
        </div>
        <button name="submit" class="btn btn-info btn-block">Submit</button>
    </form>
    <!-- </body>
</html> -->