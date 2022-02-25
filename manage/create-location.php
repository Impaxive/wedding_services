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
            <h4>Create Location</h4>
        </div>
        <div class="p-4">
            <div class="card">
            <?php
                if (isset($_POST['submit'])){
                    $city=$_POST['city'];
                    $url=$_POST['url'];
                    $created_date =date('Y-m-d');
                    $meta_tags = $_POST['meta_tags'];
                    $errors = array();

                        $sql = "INSERT INTO locations(city,url,meta_tags,created_date)
                                VALUES('$city','$url','$meta_tags','$created_date')";
                        $insresult = $conn->query($sql);
                        if($insresult === TRUE){
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
                            <input type="text" name="city" class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Url</b></label>
                            <input type="text" name="url" class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Meta Tags</b></label>
                            <input type="text" name="meta_tags" class="form-control">
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <button type="submit" class="btn btn-info text-light" name="submit">Submit</button>
                        <a class="btn btn-secondary ms-3" href="manage-locations.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>