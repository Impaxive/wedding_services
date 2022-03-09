<?php
include "dbconn.php";
session_start();
if (!isset($_SESSION['usernow'])) {
    echo "You are not authorized to view this page";
    exit(0);
  } else {
}
?><?php include("header.php") ?>
<?php include("sidebar.php") ?>
    <div class="col-9 main-content bg-color">
        <div class="pt-3 px-3">
            <h4>View Enquiry Info</h4>
        </div>
        <div class="p-4">
            <div class="card">
                <?php
                    $id=$_GET['id'];
                    $sql = "SELECT * FROM contact_form WHERE id='$id'";
                    $result = $conn->query($sql);
                    // output data of each row
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                        $id=$row['id'];
                        $name = $row['name'];
                        $email_id = $row['email_id'];
                        $subject = $row['subject'];
                        $comments = $row['comments'];
                        }
                    }

                ?>
                <form>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="city" class="form-control" value="<?php echo $name ?>" disabled>
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
                            <label><b>Subject</b></label>
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $subject ?>" disabled>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label><b>Comments</b></label>
                            <textarea type="text" name="requirement" class="form-control" rows="4" disabled><?php echo $comments ?></textarea>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <a class="btn btn-secondary ms-3" href="contact-enquiries.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>