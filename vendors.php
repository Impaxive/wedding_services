<?php include('dbconn.php') ?>
<?php include("header.php") ?>
<head>
    <!-- Event snippet for Website traffic conversion page --> 
    <script> gtag('event', 'conversion', {'send_to': 'AW-10817001441/piT0CKWF9I0DEOGv-aUo'}); </script>
</head>

<style>
    .nav-tabs > li {
        float:none;
        display:inline-block;
        zoom:1;
        border:1px white;
    }

    .nav-tabs {
        text-align:center;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff !important;
        background-color: #ef55a0 !important;
    }
    .nav-tabs>li>a {
        color: #32bde6 !important;
    }
</style>

       <div class="clearfix"></div>
       <!-- Header Container / End -->


        <div class="container margin-top-25 padding-top-25 margin-bottom-70">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3 class="headline margin-top-0 margin-bottom-40">
                        <strong class="headline-with-separator"><b>Join the moment to create most memorable weddings</b></strong>
                    </h3>
                    <p style="font-weight: 500;" align="justify"><b>Dear Value Partner</b>, <br> We are inviting you to join the moment to create most memorable weddings at every Indian home. At Wedding Services, we are working on reducing the gap between Indian families and the wedding services providers like to get the value exchange for the mutual WIN. Our specialist team in learning the visitor behavior and helping them in connecting the right service providers to explore your services and enjoy the beautiful moments in their life with your support. We are happy to have you as our value partner.</p>
                    <a href="https://mywedservices.s3.ap-south-1.amazonaws.com/images/AWS+Proposal.pdf" target="_blank" class="btn-live button margin-top-25">Know More</a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="svg-alignment">
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/Decoration/IMG-20201222-WA0029.jpg" style="width: 100%; margin-top: 25px;"  alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container margin-top-80">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline margin-top-0 margin-bottom-40">
                        <strong class="headline-with-separator">How It Works?</strong>
                    </h3>
                </div>
                <div class="col-md-6">
                    <a href="#vendors" class="icon-box-v3">
                        <div class="ibv3-icon">
                            <i class="im im-icon-Add-User"></i>
                        </div>
                        <div class="ibv3-content">
                            <h4>Create an Account</h4>
                            <p>REGISTER YOURSELF BY JUST FILLING A FORM.</p>
                        </div>
                    </a>
                    <!--<a href="#" class="icon-box-v3">
                        <div class="ibv3-icon">
                            <i class="im im-icon-Add-File"></i>
                        </div>
                        <div class="ibv3-content">
                            <h4>Get Approved</h4>
                            <p>GETTING THE AWS VENDOR CERTIFICATION FOR APPROVAL.</p>
                        </div>
                    </a>-->
                    <a href="#vendors" class="icon-box-v3">
                        <div class="ibv3-icon">
                            <i class="im im-icon-Favorite-Window"></i>
                        </div>
                        <div class="ibv3-content">
                            <h4>Get Exposure</h4>
                            <p>BE READY TO DELIVER YOUR BEST SERVICES.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="svg-alignment">
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/HomePage/Vendor.svg" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
        </div>


        <section class="fullwidth border-top padding-bottom-80 padding-top-80 margin-top-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 margin-bottom-25">
                        <div class="boxed-photo-banner">
                            <!-- Infobox -->
                            <div class="boxed-photo-banner-text">
                                <h2>Join Our Community<br>
                                </h2><br>
                                <p>Earn extra income and unlock new opportunities by advertising your business</p><br>
                                <a href="#vendors" class="btn-live button margin-top-25">Become a Vendor<br></a>
                                
                            </div>
                            <!-- Infobox / End -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="/images/live.png" style="height:365px; width:100%" >
                    </div>
                </div>
            </div>
        </section>

        <section id="vendors">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-center" style="padding-bottom:15px;"><b>Fill In The Form Below To Get Started On Wedding Services</b></h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">VENDOR REGISTRATION</a></li>
                                <li><a data-toggle="tab" href="#menu1">VENUE REGISTRATION</a></li>
                            </ul>
                        </div>

                        <div class="tab-content" style="border:1px solid #eee;">
                            <div id="home" class="tab-pane fade in active">
                            
                                <div class="row">

                                <!-- Contact Form -->
                                    <div class="col-md-12">

                                        <section id="contact">
                                            <?php
                                            if (isset($_POST['submitform'])){
                                                $business_name= $_POST['business_name'];
                                                $business_type = $_POST['business_type'];
                                                $city = $_POST['city'];
                                                $name = $_POST['name'];
                                                $mobile_number = $_POST['mobile_number'];
                                                $_SESSION['mobile_number'] = $mobile_number;
                                                $email_id = $_POST['email_id'];
                                                $key_obj = $_POST['key_objectives'];
                                                $otp = rand(100000,999999);
                                                $comments = mysqli_real_escape_string($conn,$_POST['comments']);
                                                $created_date =date('Y-m-d');


                                                   $sql_u = "SELECT * FROM vendor WHERE mobile_number = '$mobile_number'";
                                                   $result_u = $conn->query($sql_u);
                                                   if($result_u->num_rows < 1){
                                                        $sql = "INSERT INTO vendor(business_name,business_type,city,name,mobile_number,email_id,key_objectives,plan_type,otp,comments,created_date)
                                                        VALUES('$business_name','$business_type','$city','$name','$mobile_number','$email_id','$key_obj','','$otp','$comments','$created_date')";
                                                        //echo $sql;
                                                        $insresult = $conn->query($sql);
                                                        if($insresult){
                                                            // SMS Block
                                                            $apikey = "naB0WMUDwE6H4VnZeWnPLg";
                                                            $apisender = "AMSANW";
                                                            $msg ="Welcome to Wedding Services. Your one time verification code is $otp. Regards - AMSAN Wedding Services";
                                                            $num = $_SESSION['mobile_number']; // MULTIPLE NUMBER VARIABLE PUT HERE...!
                                                            echo $num;
                                                            $ms = rawurlencode($msg); //This for encode your message content
                                                            $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                                                            //echo $url;
                                                            $ch=curl_init($url);
                                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                            curl_setopt($ch,CURLOPT_POST,1);
                                                            curl_setopt($ch,CURLOPT_POSTFIELDS,"");
                                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
                                                            $data = curl_exec($ch);
                                                            // echo '';
                                                            // print($data); 
                                                            
                                                            /* result of API call*/
                                                            // END SMS Block
                                                        
                                                            echo "<script>window.location.href='otp-verification.php';</script>";
                                                        }
                                                        else{
                                                            echo '<script> alert("Something went wrong!");</script>';
                                                        }
                                                   }else{
                                                    echo '<script> alert("Mobile Number Already Exists!");</script>';
                                                   }  
                                            }
                                            ?>

                                            <form action="" enctype="multipart/form-data" method="POST">

                                                <div class="row">
                                                    <!-- <h4 class="headline margin-bottom-35"><strong class="headline-with-separator">Contact
                                                            Form</strong></h4> -->
                                                    <div class="col-12 col-md-6">
                                                        <label>Business Name</label>
                                                        <input name="business_name" type="text" id="name" required="required" />
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <label>Type of Business</label>
                                                        <select class="" name="business_type">
                                                            <option> -- Select Business Type -- </option>
                                                            <?php
                                                                $sql = "SELECT * FROM categories";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $id=$row['category_id'];
                                                                    $title = $row['title'];
                                                                    ?>
                                                                    <option value="<?php echo $row['category_id'] ?>"><?php echo $title; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">   
                                                    <div class="col-12 col-md-6">
                                                        <label>City</label>
                                                        <select class="" name="city">
                                                        <option> -- Select City -- </option>
                                                        <?php
                                                            $sql = "SELECT * FROM locations";
                                                            $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $id=$row['location_id'];
                                                                $city = $row['city'];
                                                                ?>
                                                                <option value="<?php echo $row['location_id'] ?>"><?php echo $row['city']; ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <label>Name</label>
                                                        <input name="name" type="text" id="name" required="required" />
                                                    </div>
                                                </div>

                                                <div class="row">   
                                                    <div class="col-12 col-md-6">
                                                        <label>Mobile Number</label>
                                                        <input name="mobile_number" type="text" id="mobile_number" required="required" />
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <label>Email</label>
                                                        <input name="email_id" type="text" id="name" required="required" />
                                                    </div>
                                                </div>

                                                <!-- <div class="row">   
                                                    <div class="col-md-12"> -->
                                                        <label style="padding-bottom:10px;">Key Objective</label>
                                                        <div class="row">
                                                            <div class="form-check col-md-4">
                                                                <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio1" value="get_more_b" style="display:inline-block;">
                                                                <label class="form-check" for="flexRadioDefault1">Get More Business</label>
                                                            </div>
                                                            <div class="form-check col-md-4">
                                                                <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio2" value="get_more_v" style="display:inline-block;">
                                                                <label class="form-check" for="inlineRadio2">Get More visibility</label>
                                                            </div>
                                                            <div class="form-check col-md-4">
                                                                <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio3" value="both" style="display:inline-block;">
                                                                <label class="form-check" for="inlineRadio3">Both</label>
                                                            </div>
                                                        </div>
                                                        

                                                <div class="row">   
                                                    <div class="col-12 col-md-12">
                                                        <label>Comments</label>
                                                        <textarea class="" rows="4" name="comments" placeholder=""></textarea>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row">
                                                    <button type="submit" class="button" name="submitform" >Submit</button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                <!-- Contact Form / End -->
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">

                                    <!-- Contact Form -->
                                        <div class="col-md-12">

                                            <section id="contact">
                                                <?php
                                                if (isset($_POST['submitvenueform'])){
                                                    $business_name= $_POST['business_name'];
                                                    $business_type = '11';
                                                    $city = $_POST['city'];
                                                    $name = $_POST['name'];
                                                    $mobile_number = $_POST['mobile_number'];
                                                    $_SESSION['mobile_number'] = $mobile_number;
                                                    $email_id = $_POST['email_id'];
                                                    $key_obj = $_POST['key_objectives'];
                                                    $otp = rand(100000,999999);
                                                    $comments = $_POST['comments'];
                                                    $created_date =date('Y-m-d');
                                                    
                                                    
                                                    $sql_u = "SELECT * FROM vendor WHERE mobile_number = '$mobile_number'";
                                                    $result_u = $conn->query($sql_u);
                                                    if($result_u->num_rows < 1){
                                                            $sql = "INSERT INTO vendor(business_name,business_type,city,name,mobile_number,email_id,key_objectives,plan_type,otp,comments,created_date)
                                                            VALUES('$business_name','$business_type','$city','$name','$mobile_number','$email_id','$key_obj','','$otp','$comments','$created_date')";
                                                            //echo $sql;
                                                            $insresult = $conn->query($sql);
                                                            if($insresult){
                                                                // SMS Block
                                                                $apikey = "naB0WMUDwE6H4VnZeWnPLg";
                                                                $apisender = "AMSANW";
                                                                $msg ="Welcome to Wedding Services. Your one time verification code is $otp. Regards - AMSAN Wedding Services";
                                                                $num = $_SESSION['mobile_number']; // MULTIPLE NUMBER VARIABLE PUT HERE...!
                                                                $ms = rawurlencode($msg); //This for encode your message content
                                                                $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                                                                $ch=curl_init($url);
                                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                                curl_setopt($ch,CURLOPT_POST,1);
                                                                curl_setopt($ch,CURLOPT_POSTFIELDS,"");
                                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
                                                                $data = curl_exec($ch);
                                                                // echo '';
                                                                // print($data); 
                                                                
                                                                /* result of API call*/
                                                                // END SMS Block
                                                            
                                                                echo "<script>window.location.href='otp-verification.php';</script>";
                                                            }
                                                            else{
                                                                echo '<script> alert("Something went wrong!");</script>';
                                                            }
                                                    }else{
                                                        echo '<script> alert("Mobile Number Already Exists!");</script>';
                                                    } 
                                                }
                                                ?>

                                                <form action="" enctype="multipart/form-data" method="POST">

                                                    <div class="row">
                                                        <!-- <h4 class="headline margin-bottom-35"><strong class="headline-with-separator">Contact
                                                                Form</strong></h4> -->
                                                        <div class="col-12 col-md-6">
                                                            <label>Business Name</label>
                                                            <input name="business_name" type="text" id="name" required="required" />
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <label>Type of Business</label>
                                                            <select class="" name="business_type">
                                                                <option> -- Select Business Type -- </option>
                                                                <option value="Venue">Venue</option>
                                                            
                                                            </select>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="row">   
                                                        <div class="col-12 col-md-6">
                                                            <label>City</label>
                                                            <select class="" name="city">
                                                            <option> -- Select City -- </option>
                                                            <?php
                                                                $sql = "SELECT * FROM locations";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $id=$row['location_id'];
                                                                    $city = $row['city'];
                                                                    ?>
                                                                    <option value="<?php echo $row['location_id'] ?>"><?php echo $row['city']; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-6">
                                                            <label>Name</label>
                                                            <input name="name" type="text" id="name" required="required" />
                                                        </div>
                                                    </div>

                                                    <div class="row">   
                                                        <div class="col-12 col-md-6">
                                                            <label>Mobile Number</label>
                                                            <input name="mobile_number" type="text" id="mobile_number" required="required" />
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-6">
                                                            <label>Email</label>
                                                            <input name="email_id" type="text" id="name" required="required" />
                                                        </div>
                                                    </div>

                                                    <label style="padding-bottom:10px;">Key Objective</label>
                                                    <div class="row">
                                                        <div class="form-check col-md-4">
                                                            <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio1" value="get_more_b" style="display:inline-block;">
                                                            <label class="form-check" for="flexRadioDefault1">Get More Business</label>
                                                        </div>
                                                        <div class="form-check col-md-4">
                                                            <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio2" value="get_more_v" style="display:inline-block;">
                                                            <label class="form-check" for="inlineRadio2">Get More visibility</label>
                                                        </div>
                                                        <div class="form-check col-md-4">
                                                            <input class="form-check-input" type="radio" name="key_objectives" id="inlineRadio3" value="both" style="display:inline-block;">
                                                            <label class="form-check" for="inlineRadio3">Both</label>
                                                        </div>
                                                    </div>
                                                            

                                                    <div class="row">   
                                                        <div class="col-12 col-md-12">
                                                            <label>Comments</label>
                                                            <textarea class="" rows="4" name="comments" placeholder=""></textarea>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row">
                                                        <button type="submit" class="button" name="submitvenueform" >Submit</button>
                                                    </div>
                                                </form>
                                            </section>
                                        </div>
                                        <!-- <div class="col-md-1"></div> -->
                                    <!-- Contact Form / End -->
                                    </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-2"></div> -->
                </div>
            </div>
        </section>




     <?php include("footer.php") ?>