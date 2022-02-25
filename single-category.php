<?php include('dbconn.php') ?>
<?php include("header.php") ?>
<?php
    $l_url = $_SESSION['locationUrl'];
    $id = $_GET['c_url'];
		echo $id;


        $sql = "SELECT * FROM categories WHERE url = '$id'"; 
        $result = $conn->query($sql);  
        if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $cat_title = $row['title'];
            $category_url = $row['url'];
            $c_featured_image = $row['featured_image'];
            $thumbnail_img_c = $row['thumbnail_img'];
            $catid = $row['category_id'];
            $desc = $row['description'];
        }
    }

    $sql2 = "SELECT * FROM locations WHERE url = '$l_url' ";
    $result2 = $conn ->query($sql2);
    if($result2->num_rows > 0){
        while ($row = $result2->fetch_assoc()) {
            $cityLoc = $row['city'];
            $locationId = $row['location_id'];
            $url = $row['url'];
            $_SESSION['locationUrl'] = $url;
            
        }}

            // echo $locId;
    ?>

        <!-- Titlebar ================================================== -->
        <section class="titlebar">
            <div id="titlebar" class="solid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h2><?php echo $cat_title.$catid ?></h2>

                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><?php echo $cat_title.$catid ?></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Venues Carousel -->
        <section class="fullwidth padding-bottom-70" style="background-color: white !important;">

            <div class="container">
                <!--<div class="row">

                    <div class="col-md-12">
                        <h3 class="headline centered margin-bottom-25 padding-bottom-25">
                            <strong class="headline-with-separator" style="font-weight: bold;">Top Wedding <?php echo $cat_title ?></strong>

                        </h3>
                    </div>
                </div>-->
            </div>

            <!-- Carousel / Start -->
            <div class="simple-fw-slick-carousel dots-nav">
                <?php
                $list_sql = "SELECT * FROM listing_table WHERE category_id = $catid AND location_id = $locationId AND vendor_plan_type = '3' ORDER BY vendor_plan_type ASC";

                // echo $list_sql;
                $list_result = $conn->query($list_sql); 
                if($list_result->num_rows>0){
                    while ($row = $list_result->fetch_assoc()) {
                        $id=$row['list_id'];
                        // $alias = $row['alias'];
                        $correl_id = $row['correl_id'];
                        $title = $row['title'];
                        $about = $row['about'];
                        $category_id = $row['category_id'];
                        $location_id = $row['location_id'];
                        $list_url = $row['url'];
                        $meta_tags = $row['meta_tags'];
                        $featured_image = $row['featured_image'];
                        $thumbnail_img_list = $row['thumbnail_img'];
                        $pricing = $row['pricing'];
                        $price_range = $row['price_range'];
                        $position = $row['position'];
                        $name = $row['vendor_name'];

                        // $v_sql = "SELECT * FROM vendor WHERE vendor_name = '$name' AND paln_type='1'";
                        // $v_res = $conn->query($v_sql);
                        // if($v_res->num_rows>0){
                        //     while ($row = $v_res->fetch_assoc()) {
                        //         $plan_type = $row['plan_type'];
                        //     }
                        // }

                        

                 ?>
                  
                
                <!-- Listing Item -->
                <div class="fw-carousel-item">
                    <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $l_url; ?>/<?php echo $category_url ?>/<?php echo $list_url; ?>" class="listing-item-container compact">
                        <div class="listing-item">
                            <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img_list;  ?>" alt="">
                            <div class="listing-item-content">
                                <h3><?php echo $title; ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->
                <?php }}else{ 
                ?>
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="headline centered margin-bottom-45">
                                No Data Found

                            </h4>
                        </div>
                    </div>
                </div>
                <?php
                }?>
                <!-- Listing Item -->
               
            </div>
            <!-- Carousel / End -->


        </section>
        <!-- Fullwidth Section / End -->


        <!-- Venues Carousel -->
        <section class="fullwidth padding-bottom-70" style="background-color: white !important;">

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h3 class="headline centered margin-bottom-25 padding-bottom-25">
                            <strong class="headline-with-separator" style="font-weight: bold;">Others List</strong>

                        </h3>
                    </div>
                </div>
            </div>

            <!-- Carousel / Start -->
            <div class="simple-fw-slick-carousel dots-nav">
                <?php
                $list_sql = "SELECT * FROM listing_table WHERE category_id = $catid AND location_id = $locationId AND vendor_plan_type != '3' ORDER BY vendor_plan_type ASC";

                // echo $list_sql;
                $list_result = $conn->query($list_sql); 
                if($list_result->num_rows>0){
                    while ($row = $list_result->fetch_assoc()) {
                        $id=$row['list_id'];
                        // $alias = $row['alias'];
                        $correl_id = $row['correl_id'];
                        $title = $row['title'];
                        $about = $row['about'];
                        $category_id = $row['category_id'];
                        $location_id = $row['location_id'];
                        $list_url = $row['url'];
                        $meta_tags = $row['meta_tags'];
                        $featured_image = $row['featured_image'];
                        $thumbnail_img_list = $row['thumbnail_img'];
                        $pricing = $row['pricing'];
                        $price_range = $row['price_range'];
                        $position = $row['position'];
                        $name = $row['vendor_name'];
                        $vendor_name = $row['vendor_name'];

                        // $v_sql = "SELECT * FROM vendor WHERE vendor_name = '$name' AND paln_type='1'";
                        // $v_res = $conn->query($v_sql);
                        // if($v_res->num_rows>0){
                        //     while ($row = $v_res->fetch_assoc()) {
                        //         $plan_type = $row['plan_type'];
                        //     }
                        // }

                        

                 ?>
                  
                
                <!-- Listing Item -->
                <div class="fw-carousel-item">
                    <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $l_url; ?>/<?php echo $category_url ?>/<?php echo $list_url; ?>" class="listing-item-container compact">
                        <div class="listing-item">
                            <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img_list;  ?>" alt="">
                            <div class="listing-item-content">
                                <h3><?php echo $title; ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->
                <?php }}else{ 
                ?>
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="headline centered margin-bottom-45">
                                No Data Found

                            </h4>
                        </div>
                    </div>
                </div>
                <?php
                }?>
                <!-- Listing Item -->
               
            </div>
            <!-- Carousel / End -->


        </section>
        <!-- Fullwidth Section / End -->

        <!-- <div class="container margin-bottom-70">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3 class="headline margin-top-0 margin-bottom-40">
                        <strong class="headline-with-separator">Find Your Potential Lead</strong>
                    </h3>
                    <p>Integer dapibus purus sit amet metus scelerisque hendrerit non a urna,Phasellus id nulla id
                        tortor laoreet tempor et non risus class aptent taciti</p>
                    <a href="#" class="button margin-top-25">Know More</a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="svg-alignment">
                        <img src="images1/HomePage/indianwedding-1-1005x670 (1).jpg" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Footer ================================================== -->
        <?php include('footer.php') ?>