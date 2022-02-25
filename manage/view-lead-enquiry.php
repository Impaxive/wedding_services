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
            <h4>View Enquiry Info</h4>
        </div>
        <div class="p-4">
            <div class="card">
                <?php
                    $id=$_GET['id'];
                    $sql = "SELECT * FROM contact WHERE id='$id'";
                    $result = $conn->query($sql);
                    // output data of each row
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                        $id=$row['id'];
                        $name = $row['name'];
                        $email_id = $row['email_id'];
                        $mobile_number = $row['mobile_number'];
                        $requirement = $row['requirement'];
                        $list_id = $row['list_id'];
                        $vendor_id = $row['vendor_id'];
                        $from_date = $row['from_date'];
                        $to_date = $row['to_date'];
                        $budget = $row['budget'];

                        $sql_l = "SELECT * FROM listing_table WHERE list_id = $list_id";
                        $res_l = $conn->query($sql_l);
                        if($res_l->num_rows > 0){
                            while ($row = $res_l->fetch_assoc()) {
                            $l_title = $row['title'];
                            }
                        }

                        $sql_v = "SELECT * FROM vendor WHERE vendor_id = $vendor_id";
                        $res_v = $conn->query($sql_v);
                        if($res_v->num_rows > 0){
                            while ($row = $res_v->fetch_assoc()) {
                            $business_name = $row['business_name'];
                            $v_number = $row['mobile_number'];

                            }
                        }
                        }
                    }

                    if(isset($_POST['submit'])){
                        $apikey = "naB0WMUDwE6H4VnZeWnPLg";
                        $apisender = "AMSANW";
                        $msg ="Hi, You have received a new lead. Details : $name - $mobile_number. Regards - AMSAN Wedding Services";
                        $num = $v_number; // MULTIPLE NUMBER VARIABLE PUT HERE...!
                        $ms = rawurlencode($msg); //This for encode your message content
                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                        $ch=curl_init($url);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch,CURLOPT_POST,1);
                        curl_setopt($ch,CURLOPT_POSTFIELDS,"");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
                        $data = curl_exec($ch);
                        // echo '';
                        // print($data); 
                        
                        /* result of API call*/
                        // END SMS Block
                    
                        echo "<script>window.location.href='lead-enquiries.php';</script>";
                    }

                ?>
                <form enctype="multipart/form-data" method="POST">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $name; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Email ID</b></label>
                            <input type="text" name="url" class="form-control" value="<?php echo $email_id; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Mobile Number</b></label>
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $mobile_number; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Listing Name</b></label>
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $l_title; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Business Name</b></label>
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $business_name; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>From Date</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $from_date; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>To Date</b></label>
                            <input type="text" name="url" class="form-control" value="<?php echo $to_date; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Budjet</b></label>
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $budget; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Requirement</b></label>
                            <textarea type="text" name="requirement" class="form-control" rows="4" disabled><?php echo $requirement ?></textarea>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <button class="btn btn-info text-light" type="submit" name="submit">Assign</button>
                        <a class="btn btn-secondary ms-3" href="lead-enquiries.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>