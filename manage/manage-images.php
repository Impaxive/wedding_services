<?php
include "dbconn.php";
session_start();
if (!isset($_SESSION['usernow'])) {
    echo "You are not authorized to view this page";
    exit(0);
  } else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <title>Wedding Services</title>
</head>
<body>
    <div id="wrapper">
      <div class="row g-0">
        <?php include("sidebar.php") ?>
        <div class="col-9 main-content">
            <div class="pt-3 px-3">
                <h4>Manage Images</h4>
            </div>
            <div class="p-4">
                <?php $correl_id = $_GET['id']; ?>
                <div class="bg-white d-flex justify-content-end">
                    <a class="btn btn-success w-25 mb-3" href="add-image.php?id=<?php echo $correl_id ?>">Add Image</a>
                </div>
                <table id="example" class="table table-striped" style="border: 1px solid gray;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="display:none">Correl ID</th>
                            <th class="w-50">Image</th>
                            <th style="width:50%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $correl_id = $_GET['id'];
                      $sql = "SELECT * FROM listing_images WHERE correl_id = '$correl_id'";
                      $result = $conn->query($sql);
                      // output data of each row
                      if($result->num_rows > 0){
                          while ($row = $result->fetch_assoc()) {
                              $id=$row['id'];
                              $correl_id = $row['correl_id'];
                              $image = $row['image_name'];
                              echo
                                    "<tr>
                                        <td style ='display:none'>$id</td>
                                        <td><img src='uploads/$image' height='300px' style='height:300px'></td>
                                        <td>
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
                            <th style="display:none">Correl ID</th>
                            <th>Image</th>
                            <th style="width:50%">Action</th>
                        </tr>
                    </tfoot>
                </table> 
            </div>
        </div>
      </div>
      <!-- sample modal content -->
		<div class="modal fade" id="modal-default" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <!-- <span aria-hidden="true">&times;</span> -->
                </button>
              </div>
              <form action="delete-image.php" method="POST">
                <div class="modal-body">
                      <input type="hidden" name="delete_id" id="delete_id">
                      <h5 class="mb-15">Are you sure you want to Delete?</h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">NO</button>
                  <button type="submit" name="deletedata" class="btn btn-danger">DELETE</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

    <script type="javascript" src="index.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "searching": false, 
                "paging":   false,
                "ordering": false,
                "info":     false
            });
        } );
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function () {
        $(document).on('click','.deletebtn', function(){
            $('#modal-default').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data[0]);
        $('#delete_id').val(data[0]);
        });
    });
</script>
</body>
</html>