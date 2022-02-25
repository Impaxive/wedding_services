<?php include('dbconn.php') ?>
<?php include("header.php") ?>
        <!-- Header Container / End -->

        <!-- Map Container -->
        <div class="contact-map margin-bottom-60">

            <!-- Google Maps -->
            <div id="singleListingMap-container">
                <div id="singleListingMap" data-latitude="17.380854615825086" data-longitude="78.471116406077"
                    data-map-icon="im im-icon-Map2"></div>
                <a href="#" id="streetView">Street View</a>
            </div>
            <!-- Google Maps / End -->

            <!-- Office -->
            <div class="address-box-container">
                <div class="address-container" style="background-color: rgb(34, 30, 30);">
                    <div class="office-address">
                        <h3>Our Office</h3>
                        <ul>
                            <li>PLOT NO:307/A, AMSRI SHAMIRA COMPLEX,</li>
                            <li>BEHIND DMART, SECUNDERABAD-500025</li>
                            <li>Email: info@weddingservices.co.in</li>
                            <li>Phone: +91 9030099995</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Office / End -->

        </div>
        <div class="clearfix"></div>
        <!-- Map Container / End -->

        <!-- Container / Start -->
        <div class="container margin-bottom-70" id="contactContainer">

            <div class="row">

                <!-- Contact Form -->
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <section id="contact">

                        <div id="contact-message"></div>
                        <?php 
                            if (isset($_POST['submitData'])){
                                $name=$_POST['name'];
                                $email_id=$_POST['email_id'];
                                $created_date =date('Y-m-d');
                                $comments = $_POST['comments'];
                                $subject = $_POST['subject'];

                                $sql_contact = "INSERT INTO contact_form(name,email_id,subject,comments,created_date)
                                        VALUES('$name','$email_id','$subject','$comments','$created_date')";
                                // echo $sql_contact;
                                $insresult_c = $conn->query($sql_contact);
                                if($insresult_c === TRUE){
                                    $last_id = $conn->insert_id;
                                    // echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/contact-form.php;</script>";
                                }
                                else{
                                    echo '<script> alert("Something went wrong!");</script>';
                                }
                            }
                        ?>

                        <form enctype="multipart/form-data" method="POST">

                            <div class="row">
                                <h4 class="headline margin-bottom-35"><strong class="headline-with-separator">Contact
                                        Form</strong></h4>
                                <div>
                                    <label>Your Name</label>
                                    <input name="name" type="text" id="name" required="required" />
                                </div>

                                <div>
                                    <label>Your Email</label>
                                    <input name="email_id" type="email" id="email"
                                        pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                        required="required" />
                                </div>

                                <div>
                                    <label>Subject</label>
                                    <input name="subject" type="text" id="subject" required="required" />
                                </div>

                                <div>
                                    <label>Your Message (Optional)</label>
                                    <textarea name="comments" cols="40" rows="3" id="comments" spellcheck="true"
                                        required="required"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submitData"  class="submit button">Submit</button>

                        </form>
                    </section>
                </div>
                <div class="col-md-2"></div>
                <!-- Contact Form / End -->

            </div>

        </div>
        <!-- Container / End -->

        <!-- Footer ================================================== -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            $(function () {
                    <?php
                        if(isset($last_id)){
                    ?>
                swal.fire({
                    title: "Request Submitted Successfully",
                    icon: "success"
                }).then(function() {
                window.location = "http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/contact-form.php";
                });
                    <?php
                        }
                    ?>
            });
            </script>
        <?php include('footer.php') ?>