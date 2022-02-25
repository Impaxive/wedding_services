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
            <h4>Edit Vendor/Venue</h4>
        </div>
        <div class="p-4">
            <div class="card">
            <?php
                $id = $_GET['id'];

                $sql_v = "SELECT * FROM vendor WHERE vendor_id = $id";
                $v_res = $conn->query($sql_v);
                if($v_res->num_rows > 0){
                while ($row = $v_res->fetch_assoc()) {
                    $v_id = $row['vendor_id'];
                    $business_name= $row['business_name'];
                    $business_type = $row['business_type'];
                    $city_v = $row['city'];
                    $name = $row['name'];
                    $mobile_number = $row['mobile_number'];
                    $email_id = $row['email_id'];
                    $key_obj = $row['key_objectives'];
                    $plan_type = $row['plan_type'];
                    $comments = $row['comments'];

                    }
                }
                mysqli_free_result($v_res);
                if (isset($_POST['update'])){
                    $business_name= $_POST['business_name'];
                    $business_type = $_POST['business_type'];
                    $city = $_POST['city'];
                    $name = $_POST['name'];
                    $mobile_number = $_POST['mobile_number'];
                    $email_id = $_POST['email_id'];
                    $key_obj = $_POST['key_objectives'];
                    $plan_type = $_POST['plan_type'];
                    $comments = $_POST['comments'];
                    $modified_date =date('Y-m-d');
                    $errors= array();

                    $sql = "UPDATE `vendor` SET `business_name`='$business_name',`business_type`='$business_type',`city`='$city',`name`='$name',`mobile_number`='$mobile_number',`email_id`='$email_id',`key_objectives`='$key_obj',`plan_type`='$plan_type',`comments`='$comments',`modified_date`='$modified_date' WHERE vendor_id='$v_id'";
                    $insresult = $conn->query($sql);
                    if($insresult === TRUE){
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
                        <input type="text" name="business_name" class="form-control" value="<?php echo $business_name ?>">
                    </div> 
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Type of Business</b></label>
                            <select class="form-select" name="business_type">
                                <?php $cat_sql = "SELECT * FROM categories WHERE category_id = '$business_type'";
                                    $cat_res = $conn->query($cat_sql);
                                    if($cat_res->num_rows > 0){
                                    while ($row = $cat_res->fetch_assoc()) {
                                        $cat_title = $row['title'];
                                    }
                                    } 
                                ?>
                                    <option value="<?php echo $business_type ?>"><?php echo $cat_title; ?></option>
                                    <option> -- Select Business Type -- </option>
                                <?php
                                    $sql = "SELECT * FROM categories WHERE category_id != '$business_type'";
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
                            <?php
                                $loc_sql = "SELECT * FROM locations WHERE location_id ='$city_v'";
                                $loc_res = $conn->query($loc_sql);
                                if($loc_res->num_rows > 0){
                                    while ($row = $loc_res->fetch_assoc()) {
                                    $city = $row['city'];
                                    }
                                }
                            ?>
                                <option value="<?php echo $city_v ?>"><?php echo $city ?></option>
                                <option> -- Select City -- </option>
                            <?php
                                $sql = "SELECT * FROM locations WHERE location_id != '$city_v'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $id=$row['location_id'];
                                    $city_l = $row['city'];
                                    ?>
                                    <option value="<?php echo $row['location_id'] ?>"><?php echo $city_l; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Name</b></label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Mobile</b></label>
                        <input type="text" name="mobile_number" class="form-control" value="<?php echo $mobile_number ?>">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input type="email" name="email_id" class="form-control" value="<?php echo $email_id ?>">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Key Objective</b></label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="get_more_b" <?php if($key_obj=="get_more_b") {echo "checked";}?> name="key_objectives">
                        <label class="form-check-label">
                            Get More Business
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="get_more_v" <?php if($key_obj=="get_more_v") {echo "checked";}?> name="key_objectives">
                        <label class="form-check-label">
                            Get More Visibility
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="both" <?php if($key_obj=="both") {echo "checked";}?> name="key_objectives">
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
                            <?php if($plan_type == 1){ ?>
                            <option value="1">Gold</option>
                            <?php }else if($plan_type == 2){?>
                            <option value="2">Silver</option>
                            <?php }else if($plan_type == 3){?>
                            <option value="3">Diamond</option>
                            <?php }?>
                            <option> -- Select Plan Type -- </option>
                            <option value="1">Gold</option>
                            <option value="2">Silver</option>
                            <option value="3">Diamond</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Comments</b></label>
                        <textarea name="comments" class="form-control" rows="4"><?php echo $comments ?></textarea>
                    </div>
                    </div>
                </div>    
                </div>
                <div class="card-footer bg-light d-flex justify-content-center">
                <button type="submit" class="btn btn-info text-light" name="update">Update</button>
                <a class="btn btn-secondary ms-3" href="manage-vendors-venues.php">Cancel</a>
                </div>
            </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>