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
    <div class="col-9 main-content">
    <div class="pt-3 px-3">
        <h4>Create Vendor/Venue</h4>
    </div>
    <div class="p-4">
        <div class="card">
            <?php 
            if (isset($_POST['submit'])){
                $business_name= $_POST['business_name'];
                $business_type = $_POST['business_type'];
                $city = $_POST['city'];
                $name = $_POST['name'];
                $mobile_number = $_POST['mobile_number'];
                $email_id = $_POST['email_id'];
                $key_obj = $_POST['key_objectives'];
                $plan_type = $_POST['plan_type'];
                $comments = $_POST['comments'];
                $created_date =date('Y-m-d');
                $errors = array();
    
    
                  $sql = "INSERT INTO vendor(business_name,business_type,city,name,mobile_number,email_id,key_objectives,plan_type,comments,created_date)
                          VALUES('$business_name','$business_type','$city','$name','$mobile_number','$email_id','$key_obj','$plan_type','$comments','$created_date')";
                  $insresult = $conn->query($sql);
                  if($insresult === TRUE){
                      // Mail
                    // echo $uname;
                        $uname=$email_id;
                        $name=$name;
                        $to = $uname; 
                        $from_add="info@weddingservices.co.in";
                        $subject = 'REGISTRATION SUCCESS - WEDDING SERVICES';
                        $message = '<html><body>';
                        $message .='<div style="background:#fafafa;margin:0 auto;max-width:100%">';
                        $message .= '<table style="width:100%;padding:10px 10px 0px;background:#fafafa" align="center" border="0" cellpadding="0" cellspacing="0">';
                        $message .='<tbody>';
                        $message .='<tr><td style="padding:0 15px 5px"><p style="color:#222222;font-weight:bold;font-size:20px;padding-top:0px">REGISTRATION SUCCESS - WEDDING SERVICES</td></tr>';
                        $message .='<tr>';
                        $message .='<td style="background:#fff;border:0;clear:both">';
                        $message .='<table style="width:100%;color:#222222;font-family:OpenSans;font-size:14px;line-height:17px">';
                        $message .='<tbody>';
                        $message .='<tr><td style="padding:0 15px 5px"><p style="color:#222222;font-weight:bold;font-size:16px;padding-top:0px">Dear <strong>' . $name . '</strong> </p>';
                        $message .='<p style="padding-top:10px">Vendor Registered Successfully in WEDDING SERVICES. </p>';
                        $message .='<p style="padding-top:10px">Regards</p><p><strong>Wedding Services Team</strong></p>';
                        $message .= "</tr></tbody></table>";
                        $message .= "</tr></tbody></table>";
                        $message .= "</body></html>";
                        $headers  = "From: " . $from_add . "\r\n";
                        $headers .= "Reply-To: ". $to . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $result=mail($to, $subject, $message, $headers, '-f'.$from_add);

                    // END Mail
                      echo "<script>window.location.href='manage-vendors-venues.php';</script>";
                  }
                  else{
                      echo "<script> alert($errors);</script>";
                  }
                }
            ?>
            <form action="" enctype="multipart/form-data" method="POST">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Business Name</b></label>
                    <input type="text" name="business_name" class="form-control">
                    </div> 
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Type of Business</b></label>
                    <select class="form-select" name="business_type">
                        <option>--Select Business Type--</option>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                              while ($row = $result->fetch_assoc()) {
                                $id=$row['category_id'];
                                $title = $row['title'];
                        ?>
                            <option value="<?php echo $row['category_id'] ?>"><?php echo $title; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>City</b></label>
                    <select name="city" class="form-select">
                        <option>--Select City--</option>
                        <?php
                            $sql = "SELECT * FROM locations";
                            $result = $conn->query($sql);
                              while ($row = $result->fetch_assoc()) {
                                $id=$row['location_id'];
                                $city = $row['city'];
                        ?>
                            <option value="<?php echo $row['location_id'] ?>"><?php echo $row['city']; ?></option>
                        <?php
                              }
                          ?>
                    </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Name</b></label>
                    <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Mobile</b></label>
                    <input type="text" name="mobile_number" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" name="email_id" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Key Objective</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="get_more_b" name="key_objectives">
                        <label class="form-check-label">
                        Get More Business
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="get_more_v" name="key_objectives">
                        <label class="form-check-label">
                        Get More Visibility
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="both" name="key_objectives">
                        <label class="form-check-label">
                        Both
                        </label>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Plan</b></label>
                    <select name="plan_type" class="form-select">
                        <option>--Select Plan Type--</option>
                        <option value="1">Gold</option>
                        <option value="2">Silver</option>
                        <option value="3">Diamond</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label><b>Comments</b></label>
                    <textarea name="comments" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                </div>    
            </div>
            <div class="card-footer bg-light d-flex justify-content-center">
                <button type="submit" class="btn btn-info text-light" name="submit">Submit</button>
                <a class="btn btn-secondary ms-3" href="manage-vendors-venues.php">Cancel</a>
            </div>
            </form>
        </div>
    </div>
<?php include("footer.php") ?>