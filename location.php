<?php include("dbconn.php")?>
<?php include("header-2.php") ?>
<?php
$caturl = mysqli_real_escape_string($conn,$_GET['location_url']);
 $sql = "SELECT * FROM locations WHERE url = '$caturl' ";
 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $city = $row['city'];
        $locationId = $row['location_id'];
    }}
?>

<?php
 $id = mysqli_real_escape_string($conn,$_GET['category_url']);
 $sql = "SELECT * FROM categories WHERE url = '$id' ";
 $result = $conn ->query($sql);
 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
    }}
?>



        <!-- Titlebar ================================================== -->
        <section class="titlebar">
            <div id="titlebar" class="solid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h2><?php echo $city; ?></h2>

                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="/HTML/Wedding_services_Home.html">Home</a></li>
                                    <li><a href="/HTML/Our-Complete-Services.html">Our Complete Services</a></li>
                                    <li><?php echo $city ?></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Most Visited Places -->
        <section class="fullwidth margin-top-25 padding-top-25 padding-bottom-70" data-background-color="#fff">

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h3 class="headline centered margin-bottom-70">
                            <strong class="headline-with-separator">Top 10 Products In <?php echo $city ?></strong>

                        </h3>
                    </div>
                </div>
            </div>

            <!-- Carousel / Start -->
            <div class="simple-fw-slick-carousel dots-nav">

                <!-- Listing Item -->
                <?php
                // $catUrl = mysqli_real_escape_string($conn,$_GET['category_url']);
                // $sql = "SELECT * FROM categories WHERE url = $catUrl";
                // $result = $conn->query($sql);
                // if($result->num_rows > 0){
                //     while ($row = $result->fetch_assoc()) {
                //         $id=$row['category_id'];
                //         $cattitle = $row['title'];
                //     }
                // }
                $sql2 = "SELECT * FROM listing_table WHERE location_id = $locationId";
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
                        $url = $row['url'];
                        $meta_tags = $row['meta_tags'];
                        $featured_image = $row['featured_image'];
                        $pricing = $row['pricing'];
                        $price_range = $row['price_range'];
                        $position = $row['position'];

                       
                ?>
                <div class="fw-carousel-item">
                    <a href="category.php/<?php echo $url; ?>" class="listing-item-container">
                        <div class="listing-item">
                            <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>" alt="">
                            <div class="listing-item-content">
                                <span class="tag">Invitation</span>
                                <h3><?php echo $title; ?></h3>
                            </div>
                        </div>
                        <div class="star-rating" data-rating="5.0">
                            <div class="rating-counter">(23 reviews)</div>
                        </div>
                    </a>
                </div>
                <?php }}else{ ?>
                <!-- Listing Item / End -->
                <h3 class="text-center"> No Data Found</h3>
                <?php 
                }
                ?>
            </div>
            <!-- Carousel / End -->


        </section>
        <!-- Fullwidth Section / End -->

        <div class="container margin-bottom-70">
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
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/HomePage/indianwedding-1-1005x670 (1).jpg" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid  -->
        <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
            data-background-color="#fff">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <h3 class="headline margin-bottom-70">
                            <strong class="headline-with-separator">Other Invitation Providers</strong>

                        </h3>
                    </div>
                    <!-- Sorting - Filtering Section / End -->
                   
                    <div class="col-md-12">
                        <div class="row">
                        <?php
                            $sql2 = "SELECT * FROM listing_table WHERE category_id != $catid";
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
                                    $url = $row['url'];
                                    $meta_tags = $row['meta_tags'];
                                    $featured_image = $row['featured_image'];
                                    $pricing = $row['pricing'];
                                    $price_range = $row['price_range'];
                                    $position = $row['position'];
                            ?> 
                            <!-- Listing Item -->
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="listing-page/<?php echo $url; ?>" class="listing-item-container">
                                    <div class="listing-item">
                                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image; ?>" alt="">
                                        <div class="listing-item-content">
                                            <span class="tag">Invitation</span>
                                            <h3><?php echo $title; ?></h3>
                                        </div>
                                    </div>
                                    <div class="star-rating" data-rating="3.5">
                                        <div class="rating-counter">(12 reviews)</div>
                                    </div>
                                </a>
                            </div>
                            <?php 
                                }
                            }
                            ?>
                            <!-- Listing Item / End -->
                        </div>
                    </div>
                    

                    <div class="clearfix"></div>

                </div>

            </div>
        </section>

    </div>
    <!-- Wrapper / End -->

    <!-- Footer  ================================================== -->
    <?php include("footer.php") ?>
