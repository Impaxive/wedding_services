<?php include('dbconn.php') ?>
<?php
    session_start();
		if(isset($_POST['login']))
		{
			$uname=$_POST['username'];
			$pwd=$_POST['password'];
			$_SESSION['usernow']=$uname;
			$sql = "SELECT * FROM users where username='$uname' and password='$pwd'";
			$result = $conn->query($sql);
			if ($result->num_rows == 0)
			{
				echo "<h4><center>Invalid Username or password. Please Try Again</center></h4>";
			}
			else
			{
				echo "<script>window.location.href='manage-vendors-venues.php';</script>";
			}
		}

?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="wrapper">
      <div class="row g-0">
        <div class="col-3 p-3">
        </div>
        <div class="col-6 main-content" style="margin-top:100px">
            <div class="p-4">
                <div class="card">
                    <div class="pt-3 px-5 text-center">
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/amsan-wedding-services.png" width="300px" class="">
                        <h4 class="text-center pt-3">Login</h4>
                    </div>
                    <form method="POST">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Email ID</b></label>
                              <input type="text" name="username" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Password</b></label>
                              <input type="password" name="password" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer bg-light d-flex justify-content-center">
                          <button type="submit" name="login" class="btn btn-info text-light ms-3" href="">Login</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3 p-3">
        </div>
      </div>
    </div>

    <script type="javascript" src="index.js"></script>
</body>
</html>