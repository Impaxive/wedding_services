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
                <h4>Contact Enquiries</h4>
            </div>
            <div class="p-4">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="border: 1px solid gray;" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:25%">Name</th>
                                    <th style="width:25%">Email ID</th>
                                    <th style="width:25%">Created Date</th>
                                    <th style="width:25%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM contact_form";
                                    $result = $conn->query($sql);
                                    // output data of each row
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $id=$row['id'];
                                            $name = $row['name'];
                                            $email_id = $row['email_id'];
                                            $subject = $row['subject'];
                                            $comments = $row['comments'];
                                            $created_date = $row['created_date'];



                                                $viewvar = "/manage/view-contact-enquiry.php?id=";

                                                $urlview =  $viewvar . $id;


                                            echo
                                                "<tr>
                                                    <td>$name</td>
                                                    <td>$email_id</td>
                                                    <td>$created_date</td>
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
                                    <th style="width:25%">Name</th>
                                    <th style="width:25%">Email ID</th>
                                    <th style="width:25%">Created Date</th>
                                    <th style="width:25%">Action</th>
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