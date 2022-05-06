<?php
include("../connection.php");
if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM eaccount WHERE username='$username'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "Sorry! email has already taken. Please try another.";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repass = $_POST['repassword'];
    $sql = "SELECT * FROM eaccount WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "exists";
        exit();
    } else {
        $query = "INSERT INTO eaccount (username, email, password) 
  	       	VALUES ('$username', '$password', '" . md5($password) . "')";
        $results = mysqli_query($db, $query);
        echo 'Saved!';
        exit();
    }
?>
<?php
}
?>