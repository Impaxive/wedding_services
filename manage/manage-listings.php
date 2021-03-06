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
                    <h4>Manage Listings</h4>
                </div>
                <div class="p-4">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-striped" style="border: 1px solid gray;" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="display:none">Correl ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th style="width:40%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM listing_table";
                                    $result = $conn->query($sql);
                                    if($result -> num_rows >0){
                                        while($row = $result->fetch_assoc()){
                                            $id=$row['list_id'];
                                            $correl_id = $row['correl_id'];
                                            $title = substr($row['title'],0,15);
                                            $location_id = $row['location_id'];
                                            $category_id = $row['category_id'];


                                            $cat_sql = "SELECT * FROM categories WHERE category_id = $category_id";
                                            $cat_res = $conn->query($cat_sql);
                                            if($result->num_rows > 0){
                                                while ($row = $cat_res->fetch_assoc()) {
                                                $cat_title = substr($row['title'],0,15);
                                                }
                                            }
                                            $loc_sql = "SELECT * FROM locations WHERE location_id = $location_id";
                                            $loc_res = $conn->query($loc_sql);
                                            if($result->num_rows > 0){
                                                while ($row = $loc_res->fetch_assoc()) {
                                                $city_name = $row['city'];
                                                }
                                            }

                                            $editvar = "/manage/edit-listing.php?id=";
                                            $viewimg = "/manage/manage-images.php?id=";

                                            $urledit =  $editvar . $id;

                                            $imgview = $url . $viewimg . $correl_id;
            
                                            echo
                                                "<tr>
                                                    <td style ='display:none'>$correl_id</td>
                                                    <td>$title</td>
                                                    <td>$cat_title</td>
                                                    <td>$city_name</td>
                                                    <td>
                                                    <a href='$urledit'><button class='btn btn-success btn-sm w-25'>EDIT</button></a>
                                                    <button type='button' class='btn btn-success btn-sm w-25 deletebtn'>DELETE</button>
                                                    <a href='$imgview'><button class='btn btn-success btn-sm w-25'>IMAGES</button></a>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th style="width:40%">Action</th>
                                    </tr>
                                </tfoot>
                            </table>     
                        </div>
                    </div>
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
              <form action="delete-listing.php" method="POST">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
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