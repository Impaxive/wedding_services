<?php
	if(isset($_POST['submit'])){
		$file_name = $_FILES['image']['name'];   
		$temp_file_location = $_FILES['image']['tmp_name']; 

		require 'aws-sdk/aws-autoloader.php';

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
			'Key'    => $file_name,
			'SourceFile' => $temp_file_location			
		]);

		$file_url = $result['ObjectURL'];
                echo 'Upload Success';

		var_dump($result);
	}
?>

<form action="" method="POST" enctype="multipart/form-data">         
	<input type="file" name="image" />
	<input type="submit" name="submit"/>
</form>