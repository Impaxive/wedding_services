<?php include("dbconn.php")?>
<?php include("header.php") ?>
<?php
$url = mysqli_real_escape_string($conn,$_GET['url']);
$cat_url = mysqli_real_escape_string($conn,$_GET['caturl']);

// echo $url;
// echo $cat_url;

// if(mysqli_real_escape_string($conn,$_GET['url'])){
//     $url = mysqli_real_escape_string($conn,$_GET['url']);
// }else if(mysqli_real_escape_string($conn,$_GET['locurl_inv'])){
//     $url = mysqli_real_escape_string($conn,$_GET['locurl_inv']);
// }

 $sql = "SELECT * FROM locations WHERE url = '$url' ";
 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $city = $row['city'];
        $locationId = $row['location_id'];
    }}
?>

<?php
 $sql2 = "SELECT * FROM categories WHERE url = '$cat_url' ";
 $result2 = $conn ->query($sql2);
 if($result2->num_rows > 0){
    while ($row = $result2->fetch_assoc()) {
        $title = $row['title'];
        $cat_id = $row['category_id'];
    }}
?>


        <!-- Titlebar ================================================== -->
        <section class="titlebar">
            <div id="titlebar" class="solid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h2><?php echo $title; ?></h2>

                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
                                    <li><a href="#"><?php echo $city ?></a></li>
                                    <li><?php echo $title ?></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Most Visited Places -->
        <section class="fullwidth margin-top-25 padding-bottom-70" data-background-color="#fff">

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h3 class="headline centered margin-bottom-70">
                            <strong class="headline-with-separator" style="font-weight: bold;">Top Wedding <?php echo $title ?></strong>

                        </h3>
                    </div>
                </div>
            </div>

            <!-- Carousel / Start -->
            <div class="simple-fw-slick-carousel dots-nav">

                <!-- Listing Item -->
                <?php
                // $catid = $_GET['id'];
                // echo $category_id;
                // echo $location_id;
                // $locurl_inv = mysqli_real_escape_string($conn,$_GET['locurl_inv']);
                if(mysqli_real_escape_string($conn,$_GET['url'])){
                    $sql2 = "SELECT * FROM listing_table WHERE category_id = $cat_id AND location_id = $locationId";
                }else{
                    $locationId = $_SESSION['locationUrl'];
                    $sql2 = "SELECT * FROM listing_table WHERE category_id = $cat_id AND location_id = $locationId";
                }
                // echo $sql2;
                
                $result2 = $conn->query($sql2);
                if($result2->num_rows > 0){
                    while ($row = $result2->fetch_assoc()) {
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

                        // $sql = "SELECT * FROM categories WHERE category_id = $category_id";
                        // $result = $conn->query($sql);
                        // if($result->num_rows > 0){
                        //     while ($row = $result->fetch_assoc()) {
                        //         $id=$row['category_id'];
                        //         $cattitle = $row['title'];
                        //     }
                        // }
                ?>
                <div class="fw-carousel-item">
                    <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $url; ?>/<?php echo $cat_url ?>/<?php echo $list_url; ?>" class="listing-item-container">
                        <div class="listing-item">
                            <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img_list; ?>" alt="">
                            <div class="listing-item-content">
                                <!-- <span class="tag">Invitation</span> -->
                                <h3><?php echo $title; ?></h3>
                            </div>
                        </div>
                        <!-- <div class="star-rating" data-rating="5.0">
                            <div class="rating-counter">(23 reviews)</div>
                        </div> -->
                    </a>
                </div>
                <?php }}else{ ?>
                <!-- Listing Item / End -->
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
                }
                ?>
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
            $list_sql = "SELECT * FROM listing_table WHERE category_id = $catid AND location_id = $locationId AND vendor_plan_type != '1' ORDER BY vendor_plan_type ASC";

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
                    $v_business_name = $row['v_business_name'];

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


        

    <!-- </div> -->
    <!-- Wrapper / End -->

    <!-- Footer  ================================================== -->
    <?php include("footer.php") ?>