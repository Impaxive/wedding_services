<?php include('dbconn.php') ?>
<?php include("header.php") ?>

<div id="titlebar" class="solid" style="padding: 34px 0px 26px; margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="margin-top-0"><b>Wedding Stories</b></h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul style="font-size: 10px;">
                        <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a></li>
                        <li>Wedding Stories</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="fullwidth padding-top-15 padding-bottom-20">
    <div class="container">
        <div class="row">
            <?php 
            $sql_p = "SELECT * FROM posts ORDER BY post_id DESC";
            $res_p = $conn->query($sql_p);
            if($res_p->num_rows > 0){
                while($row = $res_p->fetch_assoc()){
                    $title_p = $row['title'];
                    $url_p = $row['url'];
                    $tags_p = $row['tags'];
                    $featured_image = $row['featured_image'];
                    $post_content = $row['post_content'];
                    $thumbnail_img = $row['thumbnail_img'];

                
            ?>
            
            <div class="col-md-4">
                <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com" class="blog-compact-item-container">
                    <div class="blog-compact-item">
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $thumbnail_img; ?>" alt="">
                        <div class="blog-compact-item-content">
                            <ul class="blog-post-tags">
                            </ul>
                            <h3><?php echo $title_p; ?></h3>
                            <p><?php echo $post_content; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php  }
            }?>

        </div>
    </div>
</section>
<!-- Recent Blog Posts / End -->

<?php include("footer.php") ?>