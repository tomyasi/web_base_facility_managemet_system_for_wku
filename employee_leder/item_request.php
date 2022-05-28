<?php
include("header.php");
if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="widget-content nopadding" style="border-radius: 20px; margin-right:20%; margin-left:10%">
            <form name="form1" action="" method="post" class="form-horizontal nopadding">
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Resource Request </h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class=" span4">
                                    <br>
                                    <div>
                                        <label>&nbsp</label>
                                        <input type="text" id="search" class="span12" placeholder="search resource"
                                            name="full_name" style="border-radius:10px">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                    </div>
                                </div>
                                <div class="span2">
                                    <br>
                                    <div>
                                        <label>&nbsp</label>
                                        <input type="button" class="span11 btn btn-success" value="Search"
                                            style="border-radius:10px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
<!-- <script type="text/javascript">
$(document).ready(function() {
    // Send Search Text to the server
    $("#search").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
            $.ajax({
                url: "action.php",
                method: "post",
                data: {
                    query: searchText,
                },
                success: function(response) {
                    $("#show-list").html(response);
                },
            });
        } else {
            $("#show-list").html("");
        }
    })
    // Set searched text in input field on click of search button
    $(document).on("click", "a", function() {
        $("#search").val($(this).text());
        $("#show-list").html("");
    });
})
</script> -->