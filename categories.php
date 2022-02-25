    <?php include('dbconn.php') ?>
    <?php include("header.php") ?>
        <!-- Header Container / End -->


        <div id="titlebar" class="solid" style="padding: 34px 0px 26px; margin-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="margin-top-0"><b>Our Complete Services</b></h3>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul style="font-size: 10px;">
                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
                                <li>Our Complete Services</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container margin-bottom-45">
            <div class="row" id="servicesCategory">
                <div class="container">
                    <div class="row">
                        <?php
                            $l_url = $_SESSION['locationUrl'];
                            $sql = "SELECT * FROM categories"; 
                            $result = $conn->query($sql);  
                            if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $category_url = $row['url'];
                                $featured_image = $row['featured_image'];
                                $thumbnail_img_c = $row['thumbnail_img'];
                                $catid = $row['category_id'];
                                $desc = $row['description'];
                        ?>
                        <div class="col-lg-3 col-md-6 margin-bottom-30">
                            <!-- Image Box -->
                            <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $l_url?>/<?php echo $category_url; ?>" class="img-box alternative-imagebox"
                                data-background-image="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo rawurlencode($thumbnail_img_c);  ?>"></a>
                            <div>
                                <h4 class="text-center"><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $l_url?>/<?php echo $category_url; ?>" style="color: black;"><?php echo $title; ?></a></h4>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <!-- Container / End -->
            </div>
        </div>

        <!-- Footer ================================================== -->




    <?php include('footer.php') ?>