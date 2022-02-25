<?php include('dbconn.php') ?>
<?php include("header.php") ?>
<style>
        .text-transform
        {
            color: black;
            font-size: 18px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 280px;
        }
</style>
<div class="main-search-container" style="background-image: url('/images1/HomePage/AdobeStock_183485123.jpeg');">
    <div class="main-search-inner">
        <div class="container">
            <form enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Find Nearby Wedding <span class="typed-words"></span></h2>
                        <div class="main-search-input">
                            <div class="col-md-12 main-search-input-item">
                                    <select data-placeholder="What are you looking for?" name="category_id" class="chosen-select">
                                        <option value="" disabled selected>What are you looking for?</option>
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