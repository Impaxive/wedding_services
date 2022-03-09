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
                <h4>Manage Comments</h4>
            </div>
            <div class="p-4">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="border: 1px solid gray;" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th style="width:20%">Listing Name</th>
                                    <th style="width:20%">Name</th>
                                    <!-- <th style="width:25%">Description</th> -->
                                    <th style="width:20%">Created Date</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM comments";
                                    $result = $conn->query($sql);
                                    // output data of each row
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $id=$row['id'];
                                            $name = substr($row['name'],0,15);
                                            $product_id = $row['product_id'];
                                            $description = $row['description'];
                                            $created_date = $row['created_date'];



                                                $viewvar = "/manage/view-comment.php?id=";

                                                $urlview =  $viewvar . $id;

                                                $sql2 = "SELECT * FROM listing_table WHERE list_id='$product_id'";
                                                // echo $sql2;
                                                $result2 = $conn->query($sql2);
                                                // output data of each row
                                                if($result2->num_rows > 0){
                                                    while ($row = $result2->fetch_assoc()) {
                                                    $listid=$row['list_id'];
                                                    $title=substr($row['title'],0,15);
                                                    }
                                                }

                                            echo
                                                "<tr>
                                                    <td style='display:none'>$id</td>
                                                    <td>$title</td>
                                                    <td>$name</td>
                                                    <td>$created_date</td>
                                                    <td>
                                                        <a href='$urlview'><button class='btn btn-success btn-sm w-25'>VIEW</button></a>
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
                                    <th style="width:20%">Listing Name</th>
                                    <th style="width:20%">Name</th>
                                    <!-- <th>Description</th> -->
                                    <th style="width:20%">Created Date</th>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <!-- <span aria-hidden="true">&times;</span>
                </button> -->
              </div>
              <form action="delete-comment.php" method="POST">
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