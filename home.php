<?php include('dbconn.php') ?>
    <?php include("header.php") ?>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q50PY4PBEP"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-Q50PY4PBEP');
        </script>
    </head>
    <style>
        .text-transform{
            color: black;
            font-size: 14px;
            /* overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 280px; */
            font-weight: bold;
        }
        .listing-item {
            height: 200px;
        }
    </style>
 
    <!-- banner ================================================== -->
    <div>
    <div class="main-search-container"
        style="background-image: url('https://weddingservices.co.in/images1/HomePage/home-page-new-optim.jpg');">
        <div class="main-search-inner">

            <div class="container">
                <form enctype="multipart/form-data" method="POST">
                    <div class="row margin-top-100">
                        <div class="col-md-12 text-center margin-top-60">
                            <h2 style="text-shadow: -1px -1px 0 #000, 0 -1px 0 #000, 1px -1px 0 #000, 1px 0 0 #000, 1px 1px 0 #000, 0 1px 0 #000, -1px 1px 0 #000, -1px 0 0 #000;">Find Nearby Wedding <span class="typed-words"></span></h2>
                            <h4></h4>

                            <div class="main-search-input margin-top-50">
                                <div class="col-md-12 main-search-input-item">
                                    <select data-placeholder="What are you looking for?" name="category_id" class="chosen-select">
                                        <option>What are you looking for?</option>
                                        <?php 
                                        $sql3 = "SELECT * FROM categories";
                                        $result3 = $conn->query($sql3);
                                        // output data of each row
                                        if($result3->num_rows > 0){
                                            while ($row = $result3->fetch_assoc()) {
                                                $title = $row['title'];
                                                $caturl = $row['url'];
                                        ?>
                                        <option value="<?php echo $caturl; ?>"><?php echo $title; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button class="button" type="submit" name="submit">Search</button>

                            </div>
                        </div>
                    </div>
                </form>   
            </div>

        </div>
    </div>

    <!-- Cotegories ================================================== -->
    <section class="fullwidth border-top margin-top-40 padding-top-40" data-background-color="#fff">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Popular Categories</strong>
                    </h3>
                </div>

                <div class="col-md-12 ">
                    <div class="simple-slick-carousel arrows-nav">
                        <?php
                            if(isset($_POST['submit']))
                            {
                                // $lid = $_POST['location_id'];
                                $cat_id = $_POST['category_id'];
                                $lid = $_SESSION['locationUrl'];
                                // if($_SESSION['locationUrl']){
                                //     $lid = $_SESSION['locationUrl'];
                                //     $sql_loc = "SELECT * FROM locations WHERE `url` = '$lid'";
                                // }else if($_POST['location_id']){
                                //     $lid = $_POST['location_id'];
                                //     $sql_loc = "SELECT * FROM locations WHERE `url` = '$lid'";
                                // }
                                // if($_POST['location_id'] !='' && $_POST['category_id'] != ''){
                                    // $sql_loc = "SELECT * FROM locations WHERE `url` = '$lid'";
                                    $sql_loc = "SELECT * FROM locations WHERE `url` = '$lid'";
                                    $res_loc = $conn -> query($sql_loc);
                                    // output data of each row
                                    if($res_loc->num_rows > 0){
                                        while ($row = $res_loc->fetch_assoc()) {
                                            $locationId = $row['location_id'];
                                            $l_title = $row['city']; 
                                            $l_url = $row['url'];


                                            $sql_cat = "SELECT * FROM categories WHERE `url` = '$cat_id'";
                                            $res_cat = $conn -> query($sql_cat);
                                            // output data of each row
                                            if($res_cat->num_rows > 0){
                                                while ($row = $res_cat->fetch_assoc()) {
                                                    $category_id = $row['category_id'];


                                                    $sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id='$category_id' AND vendor_plan_type = '3'";
                                                    $result = $conn->query($sql); 
                                                    if($result->num_rows>0){
                                                        echo "<script>window.location.href='https://weddingservices.co.in/$lid/$cat_id';</script>";
                                                    }else{
                                                        echo "No Data Found";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                    
                                // }
                                    
                            }
                            else{ 
                                $sql = "SELECT * FROM listing";   
                            }
                        ?>
                        <?php
                            $sql = "SELECT * FROM categories"; 
                            $result = $conn->query($sql);  
                            if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $category_url = $row['url'];
                                $featured_image = $row['featured_image'];
                                $catid = $row['category_id'];
                                $desc = $row['description'];
                        ?>
                        
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $_SESSION['locationUrl']?>/<?php echo $category_url; ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image;  ?>" alt="" width="200px" height="127px">
                                    <div class="listing-item-content">
                                        <h3><?php echo $title; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Listing Item / End -->
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/categories" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Venues Carousel -->

    <?php
        $l_url = $_SESSION['locationUrl'];
        $sql = "SELECT * FROM categories WHERE category_id = '11'"; 
        $result = $conn->query($sql);  
        if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $category_url = $row['url'];
            $featured_image = $row['featured_image'];
            $catid = $row['category_id'];
            $desc = $row['description'];
        }
    }   
    ?>
    <section class="fullwidth border-top margin-top-40 padding-top-40"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top <?php echo $title ?></strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <!-- Carousel / Start -->
                    <div class="simple-slick-carousel arrows-nav">
                    <?php
                        if(isset($_POST['submit']))
                        {
                            if($_SESSION['locationUrl']){
                                $locId = $_SESSION['locationUrl'];
                            }else if($_POST['location_id']){
                                $locId = $_POST['location_url'];
                            }
                            // $locId = $_POST['location_url'];
                            // echo "$locId";
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id']; 
                                    $l_title = $row['city'];   
                                }
                            }
                            $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '11'";
                            // echo "SUBMIT";
                                
                        }else if($_SESSION['locationUrl']){
                            $locId = $_SESSION['locationUrl'];
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];  
                                    $l_title = $row['city']; 
                                }
                            }
                            $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '11'";
                        }else {
                            $list_sql = "SELECT * FROM listing_table";
                        }
                        $list_result = $conn->query($list_sql); 
                        if($list_result->num_rows>0){
                            while ($row = $list_result->fetch_assoc()) {
                                $list_ids=$row['list_id'];
                                // $alias = $row['alias'];
                                $correl_id = $row['correl_id'];
                                $title = $row['title'];
                                $about = $row['about'];
                                $category_id = $row['category_id'];
                                $location_id = $row['location_id'];
                                $list_url = $row['url'];
                                $meta_tags = $row['meta_tags'];
                                $featured_image = $row['featured_image'];
                                $pricing = $row['pricing'];
                                $price_range = $row['price_range'];
                                $position = $row['position'];

                                $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_ids'";
                                // echo $slq_r;
                                $r_res = $conn->query($slq_r);
                                if($r_res->num_rows>0){
                                    while ($row = $r_res->fetch_assoc()) {
                                        $prod_id=$row['product_id'];
										$rating = $row['avg_rating'];
                                        $count_review = $row['count_r'];
            
                                    }
            
                                } 

                                // echo $locId;
                        ?>
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $locId ?>/<?php echo $category_url ?>/<?php echo $list_url ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image ?>" alt="" width="200px" height="127px">

                                </div>
                                
                                    <?php 
                                      if($rating != '')
                                    {
                                    ?>
                                    <div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <div class="rating-counter">(<?php echo $count_review; ?> reviews)</div>
                                    </div>
                                    <?php 
                                    }else{
                                    ?>
                                    <div class="star-rating" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <div class="rating-counter">(0 reviews)</div>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                <div style="padding: 0px 32px 1px;">
                                    <p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> <?php echo $l_title; ?></p>
                                </div>
                            </a>
                        </div>
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
                        <?php }?>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Carousel / End -->
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/<?php echo $l_url ?>/<?php echo $category_url ?>" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->

    <!-- Decorators Carousel -->
    <section class="fullwidth border-top margin-top-40 padding-top-40"
        data-background-color="#fff">

        <?php
            $l_url = $_SESSION['locationUrl'];
            $sql = "SELECT * FROM categories WHERE category_id = '7'"; 
            $result = $conn->query($sql);  
            if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $category_u = $row['url'];
                $featured_image = $row['featured_image'];
                $catid = $row['category_id'];
                $desc = $row['description'];
            }
        }   
        ?>

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top <?php echo $title ?></strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <!-- Carousel / Start -->
                    <div class="simple-slick-carousel arrows-nav">
                    <?php       
                        if($_SESSION['locationUrl']){
                            $locId = $_SESSION['locationUrl'];
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];  
                                    $l_title = $row['city']; 
                                }
                            }
                        }
                        $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '7'";
                        $list_result = $conn->query($list_sql); 
                        if($list_result->num_rows>0){
                            while ($row = $list_result->fetch_assoc()) {
                                $list_ids=$row['list_id'];
                                // $alias = $row['alias'];
                                $correl_id = $row['correl_id'];
                                $title = $row['title'];
                                $about = $row['about'];
                                $category_id = $row['category_id'];
                                $location_id = $row['location_id'];
                                $list_url = $row['url'];
                                $meta_tags = $row['meta_tags'];
                                $featured_image = $row['featured_image'];
                                $pricing = $row['pricing'];
                                $price_range = $row['price_range'];
                                $position = $row['position'];

                                $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_ids'";
                                // echo $slq_r;
                                $r_res = $conn->query($slq_r);
                                if($r_res->num_rows>0){
                                    while ($row = $r_res->fetch_assoc()) {
                                        $prod_id=$row['product_id'];
										$rating = $row['avg_rating'];
                                        $count_review = $row['count_r'];
            
                                    }
            
                                } 

                                // echo $locId;
                        ?>
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $locId ?>/<?php echo $category_u ?>/<?php echo $list_url ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image ?>" alt="" width="200px" height="127px">

                                </div>
                                
                                    <?php 
                                      if($rating != '')
                                    {
                                    ?>
                                    <div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <div class="rating-counter">(<?php echo $count_review; ?> reviews)</div>
                                    </div>
                                    <?php 
                                    }else{
                                    ?>
                                    <div class="star-rating" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <div class="rating-counter">(0 reviews)</div>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                <div style="padding: 0px 32px 1px;">
                                    <p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> <?php echo $l_title; ?></p>
                                </div>
                            </a>
                        </div>
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
                        <?php }?>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Carousel / End -->
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/<?php echo $l_url ?>/<?php echo $category_u ?>" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->
    <!-- Fullwidth Section / End -->

    <!-- Caterers Carousel -->
    <section class="fullwidth border-top margin-top-40 padding-top-40"
        data-background-color="#fff">

        <div class="container">
            <div class="row">
            <?php
                $l_url = $_SESSION['locationUrl'];
                $sql = "SELECT * FROM categories WHERE category_id = '6'"; 
                $result = $conn->query($sql);  
                if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $title = $row['title'];
                    $category_u = $row['url'];
                    $featured_image = $row['featured_image'];
                    $catid = $row['category_id'];
                    $desc = $row['description'];
                }
            }   
            ?>

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top <?php echo $title ?></strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <!-- Carousel / Start -->
                    <div class="simple-slick-carousel arrows-nav">
                    <?php       
                        if($_SESSION['locationUrl']){
                            $locId = $_SESSION['locationUrl'];
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];  
                                    $l_title = $row['city']; 
                                }
                            }
                        }
                        $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '6'";
                        $list_result = $conn->query($list_sql); 
                        if($list_result->num_rows>0){
                            while ($row = $list_result->fetch_assoc()) {
                                $list_ids=$row['list_id'];
                                // $alias = $row['alias'];
                                $correl_id = $row['correl_id'];
                                $title = $row['title'];
                                $about = $row['about'];
                                $category_id = $row['category_id'];
                                $location_id = $row['location_id'];
                                $list_url = $row['url'];
                                $meta_tags = $row['meta_tags'];
                                $featured_image = $row['featured_image'];
                                $pricing = $row['pricing'];
                                $price_range = $row['price_range'];
                                $position = $row['position'];

                                $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_ids'";
                                // echo $slq_r;
                                $r_res = $conn->query($slq_r);
                                if($r_res->num_rows>0){
                                    while ($row = $r_res->fetch_assoc()) {
                                        $prod_id=$row['product_id'];
										$rating = $row['avg_rating'];
                                        $count_review = $row['count_r'];
            
                                    }
            
                                } 

                                // echo $locId;
                        ?>
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $locId ?>/<?php echo $category_u ?>/<?php echo $list_url ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image ?>" alt="" width="200px" height="127px">

                                </div>
                                
                                    <?php 
                                      if($rating != '')
                                    {
                                    ?>
                                    <div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <div class="rating-counter">(<?php echo $count_review; ?> reviews)</div>
                                    </div>
                                    <?php 
                                    }else{
                                    ?>
                                    <div class="star-rating" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <div class="rating-counter">(0 reviews)</div>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                <div style="padding: 0px 32px 1px;">
                                    <p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> <?php echo $l_title; ?></p>
                                </div>
                            </a>
                        </div>
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
                        <?php }?>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Carousel / End -->
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/<?php echo $l_url ?>/<?php echo $category_u ?>" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->
    <!-- Fullwidth Section / End -->

    <!-- Photography Carousel -->
    <section class="fullwidth border-top margin-top-40 padding-top-40"
        data-background-color="#fff">

        <div class="container">
            <div class="row">
            <?php
                $l_url = $_SESSION['locationUrl'];
                $sql = "SELECT * FROM categories WHERE category_id = '9'"; 
                $result = $conn->query($sql);  
                if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $title = $row['title'];
                    $category_u = $row['url'];
                    $featured_image = $row['featured_image'];
                    $catid = $row['category_id'];
                    $desc = $row['description'];
                }
            }   
            ?>

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top <?php echo $title; ?></strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <!-- Carousel / Start -->
                    <div class="simple-slick-carousel arrows-nav">
                    <?php       
                        if($_SESSION['locationUrl']){
                            $locId = $_SESSION['locationUrl'];
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];  
                                    $l_title = $row['city']; 
                                }
                            }
                        }
                        $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '9'";
                        $list_result = $conn->query($list_sql); 
                        if($list_result->num_rows>0){
                            while ($row = $list_result->fetch_assoc()) {
                                $list_ids=$row['list_id'];
                                // $alias = $row['alias'];
                                $correl_id = $row['correl_id'];
                                $title = $row['title'];
                                $about = $row['about'];
                                $category_id = $row['category_id'];
                                $location_id = $row['location_id'];
                                $list_url = $row['url'];
                                $meta_tags = $row['meta_tags'];
                                $featured_image = $row['featured_image'];
                                $pricing = $row['pricing'];
                                $price_range = $row['price_range'];
                                $position = $row['position'];

                                $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_ids'";
                                // echo $slq_r;
                                $r_res = $conn->query($slq_r);
                                if($r_res->num_rows>0){
                                    while ($row = $r_res->fetch_assoc()) {
                                        $prod_id=$row['product_id'];
										$rating = $row['avg_rating'];
                                        $count_review = $row['count_r'];
            
                                    }
            
                                } 

                                // echo $locId;
                        ?>
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $locId ?>/<?php echo $category_u ?>/<?php echo $list_url ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image ?>" alt="" width="200px" height="127px">

                                </div>
                                
                                    <?php 
                                      if($rating != '')
                                    {
                                    ?>
                                    <div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <div class="rating-counter">(<?php echo $count_review; ?> reviews)</div>
                                    </div>
                                    <?php 
                                    }else{
                                    ?>
                                    <div class="star-rating" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <div class="rating-counter">(0 reviews)</div>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                <div style="padding: 0px 32px 1px;">
                                    <p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> <?php echo $l_title; ?></p>
                                </div>
                            </a>
                        </div>
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
                        <?php }?>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Carousel / End -->
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/<?php echo $l_url ?>/<?php echo $category_u ?>" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->

    <!-- Makeup Carousel -->
    <section class="fullwidth border-top margin-top-40 padding-top-40 margin-bottom-40"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

            <?php
                $l_url = $_SESSION['locationUrl'];
                $sql = "SELECT * FROM categories WHERE category_id = '13'"; 
                $result = $conn->query($sql);  
                if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $title = $row['title'];
                    $category_u = $row['url'];
                    $featured_image = $row['featured_image'];
                    $catid = $row['category_id'];
                    $desc = $row['description'];
                }
            }   
            ?>

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-30">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top <?php echo $title ?></strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <!-- Carousel / Start -->
                    <div class="simple-slick-carousel arrows-nav">
                    <?php       
                        if($_SESSION['locationUrl']){
                            $locId = $_SESSION['locationUrl'];
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];  
                                    $l_title = $row['city']; 
                                }
                            }
                        }
                        $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id = '13'";
                        $list_result = $conn->query($list_sql); 
                        if($list_result->num_rows>0){
                            while ($row = $list_result->fetch_assoc()) {
                                $list_ids=$row['list_id'];
                                // $alias = $row['alias'];
                                $correl_id = $row['correl_id'];
                                $title = $row['title'];
                                $about = $row['about'];
                                $category_id = $row['category_id'];
                                $location_id = $row['location_id'];
                                $list_url = $row['url'];
                                $meta_tags = $row['meta_tags'];
                                $featured_image = $row['featured_image'];
                                $pricing = $row['pricing'];
                                $price_range = $row['price_range'];
                                $position = $row['position'];

                                $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$list_ids'";
                                // echo $slq_r;
                                $r_res = $conn->query($slq_r);
                                if($r_res->num_rows>0){
                                    while ($row = $r_res->fetch_assoc()) {
                                        $prod_id=$row['product_id'];
										$rating = $row['avg_rating'];
                                        $count_review = $row['count_r'];
            
                                    }
            
                                } 

                                // echo $locId;
                        ?>
                        <!-- Listing Item -->
                        <div class="carousel-item">
                            <a href="https://weddingservices.co.in/<?php echo $locId ?>/<?php echo $category_u ?>/<?php echo $list_url ?>" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="https://weddingservices.co.in/manage/uploads/<?php echo $featured_image ?>" alt="" width="200px" height="127px">

                                </div>
                                
                                    <?php 
                                      if($rating != '')
                                    {
                                    ?>
                                    <div class="star-rating" data-rating="<?php echo $rating; ?>" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <div class="rating-counter">(<?php echo $count_review; ?> reviews)</div>
                                    </div>
                                    <?php 
                                    }else{
                                    ?>
                                    <div class="star-rating" style="padding: 0px 32px; height: 68px;">
                                        <h3 class="text-transform"><?php echo $title; ?></h3>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <span class="star empty"></span>
                                        <div class="rating-counter">(0 reviews)</div>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                <div style="padding: 0px 32px 1px;">
                                    <p class="text-transform" style="font-size: 12px; font-weight: unset;"><i class="fa fa-map-marker"></i> <?php echo $l_title; ?></p>
                                </div>
                            </a>
                        </div>
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
                        <?php }?>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Carousel / End -->
                </div>

                <div class="col-md-12 font-center">
                    <a href="https://weddingservices.co.in/<?php echo $l_url ?>/<?php echo $category_u ?>" id="servicesPageLink" class="btn-def button">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->
    <!-- Fullwidth Section / End -->

    <!-- Info Section 
    <section class="fullwidth padding-top-40 padding-bottom-70" data-background-color="#f9f9f9">
        <div class="container padding-50">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="headline centered headline-extra-spacing">
                        <strong class="headline-with-separator" style="font-weight: bold;">Destination Wedding</strong>
                        <span class="margin-top-25">Explore some of the best tips from around the world from our
                            partners and friends. Discover some of the most popular listings!</span>
                    </h3>
                </div>
            </div>

            <div class="row icons-container">
                
                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-Map2"></i>
                        <h3>Find Interesting Place</h3>
                        <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus.</p>
                    </div>
                </div>

                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-Speach-Bubble3"></i>
                        <h3>Check Reviews</h3>
                        <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi.</p>
                    </div>
                </div>

                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2">
                        <i class="im im-icon-Checked-User"></i>
                        <h3>Make a Reservation</h3>
                        <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Info Section / End -->

    <!-- Wedding Stories Blog Posts -->
    <section class="fullwidth border-top padding-top-40 padding-bottom-75">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator" style="font-weight: bold;">Wedding Stories</strong>
                    </h3>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-4">
                    <a href="#" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/AdobeStock_286280748.jpeg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Event for you of a lifetime</h3><br>
                                <p>Make the most memorable day of your lifetime with our certified vendors and let us make it possible for you.</p>
                            </div>
                        </div>
                    </a>
                </div>
               
                <div class="col-md-4">
                    <a href="#" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/23.jpg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Search, Book,Relax and Enjoy</h3><br>
                                <p>Make your dream come true of having a fancy wedding affair by search your opportunity, book your vendor, relax and enjoy your occasion.</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="#" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/24.jpg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Have a grandeur and gracious Wedding  from us</h3>
                                <p>Make your wedding experience the best and memorable one for you and cherish every moment of your life.</p>
                            </div>
                        </div>
                    </a>
                </div>
                

                <div class="col-md-12 centered-content">
                    <a href="#" class="btn-def button margin-top-10">View More</a>
                </div>

            </div>

        </div>
    </section>
    <!-- Recent Blog Posts / End -->

    <!-- Flip banner -->
    <a href="vendors.php" class="flip-banner parallax"
        data-background="images1/HomePage/homePageFlipBanner.jpg" data-color="#000" data-color-opacity="0.45"
        data-img-width="2500" data-img-height="1666">
        <div class="flip-banner-content">
        <h2 class="flip-visible">Are you a Vendor?</h2>
            <h2 class="flip-hidden">Click here to Associate with us<i class="sl sl-icon-arrow-right"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->

    <!-- <script type="text/javascript">
        document.getElementById('jsform').submit();
    </script> -->
    
    <?php include('footer.php') ?>