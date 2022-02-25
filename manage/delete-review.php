<?php
include "dbconn.php";
session_start();
if (!isset($_SESSION['usernow'])) {
    echo "You are not authorized to view this page";
    exit(0);
  } else {
}
?>
<?php
if(isset($_POST['deletedata'])){
    $id = $_POST['delete_id'];
    $query = "DELETE FROM add_review WHERE id='$id'";
    $deleteres=mysqli_query($conn, $query);
    if($deleteres){
      echo "<script>window.location.href='manage-review.php';</script>";
    }else{
      echo '<script> alert("Something went wrong!");</script>';
    }
}
?>
