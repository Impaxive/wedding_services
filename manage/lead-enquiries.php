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
                <h4>Lead Enquiries</h4>
            </div>
            <div class="p-4">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="border: 1px solid gray;" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Listing Name</th>
                                    <th style="width:20%">Business Name</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM contact";
                                    $result = $conn->query($sql);
                                    // output data of each row
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $id=$row['id'];
                                            $name = substr($row['name'],0,15);
                                            $email_id = substr($row['email_id'],0,15);
                                            $number = $row['mobile_number'];
                                            $requirement = $row['requirement'];
                                            $created_date = $row['created_date'];
                                            $list_id = $row['list_id'];
                                            $vendor_id = $row['vendor_id'];

                                            $sql_l = "SELECT * FROM listing_table WHERE list_id = $list_id";
                                            $res_l = $conn->query($sql_l);
                                            if($res_l->num_rows > 0){
                                                while ($row = $res_l->fetch_assoc()) {
                                                $l_title = substr($row['title'],0,15);
                                                }
                                            }

                                            $sql_v = "SELECT * FROM vendor WHERE vendor_id = $vendor_id";
                                            $res_v = $conn->query($sql_v);
                                            if($res_v->num_rows > 0){
                                                while ($row = $res_v->fetch_assoc()) {
                                                $business_name = $row['business_name'];
                                                }
                                            }

                                                $viewvar = "/manage/view-lead-enquiry.php?id=";

                                                $urlview =  $viewvar . $id;


                                            echo
                                                "<tr>
                                                    <td>$name</td>
                                                    <td>$l_title</td>
                                                    <td>$business_name</td>
                                                    <td>
                                                        <a href='$urlview'><button class='btn btn-success btn-sm w-25'>VIEW</button></a>
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
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Listing Name</th>
                                    <th style="width:20%">Business Name</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </tfoot>
                        </table>     
                    </div>
                </div>
            </div>
        </div>
      </div>
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
</body>
</html>