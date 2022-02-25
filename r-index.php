<html>
<body>
<?php include('dbconn.php') ?>
    <?php include('header.php') ?>
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
<div>
    <div class="main-search-container" style="background-image: url('/images1/HomePage/AdobeStock_image with 1.6 MB.jpeg');">
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
    
<div>
</body>
</html>
    <!-- Popular Categories Section End-->
