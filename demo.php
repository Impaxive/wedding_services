<?php include("dbconn.php") ?>

<?php include("header.php") ?>



<!-- Content
================================================== -->


<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<!-- Widgets -->
	<!-- <div class="col-lg-5 col-md-5">
		<div class="sidebar right"> -->
			
        <select id="singleSelectValueDDJS" class="form-control"
                    onchange="singleSelectChangeValue()">
            <option value="0">Select Value 0</option>
            <option value="8">Option value 8</option>
            <option value="5">Option value 5</option>
            <option value="4">Option value 4</option>
        </select>
        

            <input type="text" id="textFieldValueJS" class="form-control"
                                placeholder="get value on option select">

                                <?php echo $value = '<p id="textFieldValueJS"></p>';?>                    

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	<!-- </div>
	</div> -->
	<!-- Sidebar / End -->


</div>
</div>

<script>
    function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("singleSelectValueDDJS");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("textFieldValueJS").value = selValue;
    }
</script>



<?php include("footer.php") ?>