<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="generate_account.php" title="Go to  Generate Account page" class="tip-bottom">
                <i class="icon-laptop"></i>Generate Account
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>
                <margee> GENERATE ACCOUNT FROM DATABES PAGE</margee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <form name="formsend" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                class="form-horizontal">
                <hr>
                <center>
                    <button type="submit" name="genrate_emp_account" class="btn btn-primary"
                        style="border-radius: 10px;" title="Generate Employee Account From Databese">Generate
                        Employee Account</button>
                </center>
                <div class="alert alert-success" id="success-emp" style="display:none;">
                    <center>
                        <strong>Generate employee account successfully.</strong>
                    </center>
                </div>
                <hr>
                <hr>
                <center>
                    <button type="submit" name="generate_user_account" class="btn btn-primary"
                        style="border-radius: 10px;" title="Generate User Account From Databese">Generate
                        User Account</button>
                </center>
                <div class="alert alert-success" id="success-user" style="display:none;">
                    <center>
                        <strong>Generate user account successfully.</strong>
                    </center>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>
<?php
//generate a username from Full name
if (isset($_POST["genrate_emp_account"])) {
    $result = mysqli_query($con, "SELECT *FROM employee");
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $fname = $row["fname"];
        $lname = $row["lname"];
        $status = $row["status"];
        $role = $row["jop_position"];
        $pass = $row["id"];
        $username_parts = array_filter(explode(" ", strtolower($fname))); //explode and lowercase name
        $username_parts = array_filter(explode(" ", strtolower($lname))); //explode and lowercase name
        $username_parts = array_slice($username_parts, 0, 2); //return only first two arry part

        $part1 = (!empty($username_parts[0])) ? substr($username_parts[0], 0,) : ""; //cut first name to 8 letters
        $part2 = (!empty($username_parts[1])) ? substr($username_parts[1], 0,) : ""; //cut second name to 5 letters
        //$part3 = ($rand_no) ? rand(0, $rand_no) : "";
        $username = $fname . $lname; //. $part3; //str_shuffle to randomly shuffle all characters
        $password = $pass;
        $insertdate = date("Y-m-d H:i:s");
        $qur = "INSERT INTO eaccount values(NULL,'$pass','$username','" . md5($password) . "','$status',' $insertdate','$role')";
        $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
        if ($res) {
            $count++;
        }
    }
    if ($count > 0) {
        echo $count;
?>
<script type="text/javascript">
document.getElementById("success-emp").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "generate_account.php";
}, 3000);
</script>
<?php
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
if (isset($_POST["generate_user_account"])) {
    $result = mysqli_query($con, "SELECT *FROM user");
    while ($row = mysqli_fetch_array($result)) {
        $fname = $row["fname"];
        $lname = $row["lname"];
        $status = $row["status"];
        $pass = $row["id"];
        $username_parts = array_filter(explode(" ", strtolower($fname))); //explode and lowercase name
        $username_parts = array_filter(explode(" ", strtolower($lname))); //explode and lowercase name
        $username_parts = array_slice($username_parts, 0, 2); //return only first two arry part

        $part1 = (!empty($username_parts[0])) ? substr($username_parts[0], 0,) : ""; //cut first name to 8 letters
        $part2 = (!empty($username_parts[1])) ? substr($username_parts[1], 0,) : ""; //cut second name to 5 letters
        //$part3 = ($rand_no) ? rand(0, $rand_no) : "";
        $username = $fname . $lname; //. $part3; //str_shuffle to randomly shuffle all characters
        $password = $pass;
        $insertdate = date("Y-m-d H:i:s");
        $qur = "INSERT INTO uaccount values(NULL,'$pass','$username','" . md5($password) . "','$status',' $insertdate')";
        $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
        if ($res) {
        ?>
<script type="text/javascript">
document.getElementById("success-user").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "generate_account.php";
}, 3000);
</script>
<?php
        } else {
            echo "Error: " . $sql . "" . mysqli_error($con);
        }
    }
}
mysqli_close($con);
include("footer.php");
?>