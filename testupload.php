<?php
	// This file demonstrates file upload to an S3 bucket. This is for using file upload via a
	// file compared to just having the link. If you are doing it via link, refer to this:
	// https://gist.github.com/keithweaver/08c1ab13b0cc47d0b8528f4bc318b49a
	//
	// You must setup your bucket to have the proper permissions. To learn how to do this
	// refer to:
	// https://github.com/keithweaver/python-aws-s3
	// https://www.youtube.com/watch?v=v33Kl-Kx30o
	
	// I will be using composer to install the needed AWS packages.
	// The PHP SDK:
	// https://github.com/aws/aws-sdk-php
	// https://packagist.org/packages/aws/aws-sdk-php 
	//
	// Run:$ composer require aws/aws-sdk-php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require 'aws-sdk/aws-sdk/aws-autoloader.php';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	error_log("This is error");
	
	$bucketName = 'mywedservices';
	$IAM_KEY = 'AKIA4SCJ2F7S4YY6WCCQ';
	$IAM_SECRET = '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';
	echo $bucketName;
	
	try {
		echo "I came here";
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				
				'region'  => 'ap-south-1'
			)
			echo "I came here";
		);
	} catch (Exception $e) {
		echo "I came here";
		error_log($e);
		die("Error: " . $e->getMessage());
		
	}

	
	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	//$keyName = 'test_example/' . basename($_FILES["fileToUpload"]['tmp_name']);
	//$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	// try {
		// // Uploaded:
		// $file = $_FILES["fileToUpload"]['tmp_name'];
		// echo "I came here to file upload";
		// $s3->putObject(
			// array(
				// 'Bucket'=>$bucketName,
				// 'Key' =>  $keyName,
				// 'SourceFile' => $file,
				// 'StorageClass' => 'REDUCED_REDUNDANCY'
			// )
		// );

	// } catch (S3Exception $e) {
		// die('Error:' . $e->getMessage());
		
	// } catch (Exception $e) {
		// die('Error:' . $e->getMessage());
	// }


	echo 'Done';

	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
?>