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
    $query = "DELETE FROM listing_table WHERE correl_id='$id'";
    $deleteres=mysqli_query($conn, $query);
    if($deleteres){
      $query2 = "DELETE FROM listing_images WHERE correl_id='$id'";
      $result = mysqli_query($conn, $query2);
      if($result){
        echo "<script>window.location.href='manage-listings.php';</script>";
      }
    }else{
      echo '<script> alert("Something went wrong!");</script>';
    }
}
?>