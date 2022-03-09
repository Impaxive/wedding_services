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
            <h4>View Review</h4>
        </div>
        <div class="p-4">
            <div class="card">
                <?php
                    $id=$_GET['id'];
                    $sql = "SELECT * FROM add_review WHERE id='$id'";
                    $result = $conn->query($sql);
                    // output data of each row
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                        $id=$row['id'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $title = $row['title'];
                        $email_id = $row['email_id'];
                        $rating = $row['rating'];
                        $product_id = $row['product_id'];
                        $description = $row['description'];


                        $sql2 = "SELECT * FROM listing_table WHERE list_id='$product_id'";
                        $result2 = $conn->query($sql2);
                        // output data of each row
                        if($result2->num_rows > 0){
                            while ($row = $result2->fetch_assoc()) {
                                $id=$row['id'];
                                $list_title=$row['title'];
                            }
                            }
                        }
                    }

                ?>
                <form>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $title ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>First Name</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $first_name ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Last Name</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $last_name ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Email ID</b></label>
                            <input type="text" name="url" class="form-control" value="<?php echo $email_id ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Listing Name</b></label>
                            <input type="text" name="meta_tags" class="form-control" value="<?php echo $list_title ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Rating</b></label>
                            <input type="text" name="meta_tags" class="form-control" value="<?php echo $rating ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea type="text" name="meta_tags" class="form-control" rows="4" disabled><?php echo $description ?></textarea>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <a class="btn btn-secondary ms-3" href="manage-reviews.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>