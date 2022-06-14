<?php
include("header.php");
include("../connection.php");
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
        <div class="row-fluid">
            <form name="formsend" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                class="form-horizontal">
                <hr>
                <div class="alert alert-danger" id="error_emp" style="display:none;">
                    <center>
                        <strong>All Employee already exist!!!.</strong>
                    </center>
                </div>
                <center>
                    <button type="submit" name="backup" class="btn btn-primary" style="border-radius: 10px;"
                        title="Backup full Databese">Backup</button>
                </center>
                <div class="alert alert-success" id="success-emp" style="display:none;">
                    <center>
                        <strong>Successfully Backup.</strong>
                    </center>
                </div>
                <hr>
                <hr>
                <div class="alert alert-danger" id="error_user" style="display:none;">
                    <center>
                        <strong>All User already exist!!!.</strong>
                    </center>
                </div>
                <center>
                    <button type="submit" name="restor" class="btn btn-primary" style="border-radius: 10px;"
                        title="Restor Backup full Databese">Restor</button>
                </center>
                <div class="alert alert-success" id="success-user" style="display:none;">
                    <center>
                        <strong>Successfully Restor.</strong>
                    </center>
                </div>
            </form>
        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php
include("footer.php");
if (isset($_POST['backup'])) {
    $tables = array();
    $result = mysqli_query($con, "SHOW TABLES");
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    $return = '';
    foreach ($tables as $table) {
        $result = mysqli_query($con, "SELECT * FROM " . $table);
        $num_fields = mysqli_num_fields($result);

        $return .= 'DROP TABLE ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($con, "SHOW CREATE TABLE " . $table));
        $return .= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $return .= "INSERT INTO " . $table . " VALUES(";
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < $num_fields - 1) {
                        $return .= ',';
                    }
                }
                $return .= ");\n";
            }
        }
        $return .= "\n\n\n";
    }
    //save file
    $handle = fopen("backup.sql", "w+");
    fwrite($handle, $return);
    fclose($handle);
?>
<script type="text/javascript">
document.getElementById("success-emp").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "backup.php";
}, 3000);
</script>
<?php
}
if (isset($_POST['restor'])) {
    $filename = 'backup.sql';
    $handle = fopen($filename, "r+");
    $contents = fread($handle, filesize($filename));
    $sql = explode(';', $contents);
    foreach ($sql as $query) {
        $result = mysqli_query($con, $query);
        if ($result) {
        }
    }
?>
<script type="text/javascript">
document.getElementById("success-user").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "backup.php";
}, 3000);
</script>
<?php
    fclose($handle);
}

?>