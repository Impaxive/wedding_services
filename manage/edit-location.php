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
        <div class="col-9 main-content bg-color">
            <div class="pt-3 px-3">
                <h4>Edit Location</h4>
            </div>
            <div class="p-4">
                <div class="card">
                <?php
                    $id=$_GET['id'];
                    $sql = "SELECT * FROM locations WHERE location_id='$id'";
                    $result = $conn->query($sql);
                    // output data of each row
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                            $id=$row['location_id'];
                            $city = $row['city'];
                            $url=$row['url'];
                            $meta_tags = $row['meta_tags'];
                        }
                    }
                    mysqli_free_result($result);
                    //Update
                    if (isset($_POST['update'])){
                    $city=$_POST['city'];
                    $url=$_POST['url'];
                    $modified_date =date('Y-m-d');
                    $meta_tags = $_POST['meta_tags'];
                    $errors = array();

                    $sql = "UPDATE locations SET `city`='$city',`url`='$url',`meta_tags`='$meta_tags',`modified_date`='$modified_date' WHERE location_id='$id'";
                    $upresult = $conn->query($sql);
                    if($upresult === TRUE){
                        echo "<script>window.location.href='manage-locations.php';</script>";
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
                              <label><b>City</b></label>
                              <input type="text" name="city" class="form-control" value="<?php echo $city ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Url</b></label>
                              <input type="text" name="url" class="form-control" value="<?php echo $url ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label><b>Meta Tags</b></label>
                              <input type="text" name="meta_tags" class="form-control" value="<?php echo $meta_tags ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer bg-light d-flex justify-content-center">
                          <button type="submit" class="btn btn-info text-light" name="update">Update</button>
                          <a class="btn btn-secondary ms-3" href="manage-locations.php">Cancel</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
<?php include("footer.php") ?>