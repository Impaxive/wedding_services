<?php include("dbconn.php")?>
<?php include("header.php") ?>

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

<?php
if($_SESSION['locationUrl']){
    $url = $_SESSION['locationUrl'];
    $sql = "SELECT * FROM locations WHERE url = '$url' ";
}else{
    $url = mysqli_real_escape_string($conn,$_GET['locationURL']);
    $sql = "SELECT * FROM locations WHERE url = '$url' ";
}

 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $city = $row['city'];
        $locationId = $row['location_id'];
    }}
?>

<?php
 $cat_url = mysqli_real_escape_string($conn,$_GET['category_url']);
 $sql2 = "SELECT * FROM categories WHERE url = '$cat_url' ";
 $result2 = $conn ->query($sql2);
 if($result2->num_rows > 0){
    while ($row = $result2->fetch_assoc()) {
        $title = $row['title'];
        $id=$row['category_id'];
        $c_url = $row['url'];
    }}
?>
    <!-- Titlebar ================================================== -->
    <div id="titlebar" class="solid" style="padding: 34px 0px 26px; margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="margin-top-0"><b><?php echo $title; ?></b></h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul style="font-size: 10px;">
                            <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
                            <li><?php echo $city; ?></li>
                            <li><?php echo $title ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Most Visited Places -->
    <section class="fullwidth margin-top-25 padding-bottom-70" data-background-color="#fff">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-70">
                        <strong class="headline-with-separator" style="font-weight: bold;">Top Wedding <?php echo $title ?></strong>
                    </h3>
                </div>

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
                    
                    $sql2 = "SELECT * FROM listing_table WHERE category_id = '$id' AND location_id = '$locationId' ORDER BY vendor_plan_type DESC";
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
                            
                            $slq_r = "SELECT COUNT(*) AS count_r ,ROUND(AVG(rating),1) AS avg_rating FROM add_review WHERE product_id = '$id'";
                            // echo $slq_r;
                            $r_res = $conn->query($slq_r);
                            if($r_res->num_rows>0){
                                while ($row = $r_res->fetch_assoc()) {
                                    $prod_id=$row['product_id'];
                                    $rating = $row['avg_rating'];
                                    $count_review = $row['count_r'];
        
                                }
        
                            } 
                            
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="carousel-item" style="width: 300px !important;">
                        <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $url; ?>/<?php echo $c_url ?>/<?php echo $list_url; ?>" class="listing-item-container">
                            <div class="listing-item">
                                <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img_list; ?>" alt="">
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
                </div>
                <?php }}else{ ?>
                    <!-- Listing Item / End -->
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <h4 class="headline centered margin-bottom-45">
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


<!-- </div> -->
<!-- Wrapper / End -->

<!-- Footer  ================================================== -->
<?php include("footer.php") ?>