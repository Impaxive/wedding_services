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
        <h4>Search Vendor/Venue</h4>
    </div>
    <div class="p-4">
        <div class="card">
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="card-body">
                <fieldset>
                    <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <label class="form-label"><b>Business Name</b></label>
                        <input type="text" class="form-control" name="business_name">
                    </div>
                    <div class="col-lg-2 col-md-12 mt-md-3" style="display: flex; justify-content: center; align-items: end;">
                        <div>
                        <h4>or</h4>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <label class="form-label"><b>Type of Business</b></label>
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
                </fieldset>
            </div>
            <div class="card-footer bg-light d-flex justify-content-center">
                <button type="submit" class="btn btn-info text-light" name="submit">Search</button>
                <button class="btn btn-secondary ms-3">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])){
    $business_name= $_POST['business_name'];
    $business_type = $_POST['business_type'];

        if($_POST['business_name'] != ''){
        $sql = "SELECT * FROM vendor WHERE business_name LIKE '%$business_name%' OR business_type = '$business_type'";
        }else if($_POST['business_name'] === '' ){
        $sql = "SELECT * FROM vendor WHERE business_type = '$business_type'";
        }
        $insresult = $conn->query($sql);
        if($insresult){
        ?>
        <div class="col-3 p-3 bg-light sidebarShadow"></div>
        <div class="col-9 main-content">
            <div class="pt-3 px-3">
                <h4>Manage Vendors/Venues</h4>
            </div>
            <div class="p-4">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="border: 1px solid gray" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>Business Name</th>
                                    <th>Name</th>
                                    <th style="width:50%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($_POST['business_name'] != ''){
                                        $sql = "SELECT * FROM vendor WHERE business_name LIKE '%$business_name%' OR business_type = '$business_type'";
                                    }else if($_POST['business_name'] === '' ){
                                        $sql = "SELECT * FROM vendor WHERE business_type = '$business_type'";
                                    }
                                    $result = $conn->query($sql);
                                    // output data of each row
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $id=$row['vendor_id'];
                                            $name = $row['name'];
                                            $b_name = $row['business_name'];

                                            $editvar = "/manage/edit-vendor-venue.php?id=";

                                            $urledit =  $editvar . $id;

                                            echo
                                                "<tr>
                                                    <td style='display:none'>$id</td>
                                                    <td>$b_name</td>
                                                    <td>$name</td>
                                                    <td>
                                                        <a href='$urledit'><button class='btn btn-success btn-sm w-25'>EDIT</button></a>
                                                        <button type='button' class='btn btn-success btn-sm w-25 deletebtn'>DELETE</button>
                                                    </td>
                                                </tr>";

                                        }
                                    }else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>First name</th>
                                    <th>Name</th>
                                    <th style="width:50%">Actions</th>
                                </tr>
                            </tfoot>
                        </table>     
                    </div>
                </div>
            </div>
        </div>
        <?php 
            }
            else{
                echo '<script> alert("Something went wrong!");</script>';
            }
        }
        ?>
<?php include("footer.php") ?>