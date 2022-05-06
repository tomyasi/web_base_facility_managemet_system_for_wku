<?php
include("../connection.php");
if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "exists";
        exit();
    } else {
        $query = "INSERT INTO users (username, email, password) 
               VALUES ('$username', '$email', '" . md5($password) . "')";
        $results = mysqli_query($db, $query);
        echo 'Saved!';
        exit();
    }
}
// if (isset($_POST["phone"]) && isset($_POST["gmail"])) {
//     $phone_sql = "SELECT phone FROM user where phone='$phone'";
//     $gmail_sql = "SELECT gmail FROM user WHERE gmail='$gmail'";
//     $phone_check = mysqli_query($con, $phone_check);
//     if (mysqli_num_rows($phone_check) > 0) {
//         echo '<span class="text-danger">The phone number is already exist!</span>';
//     } else {
//         echo '<span class="text-success">The phone number is available!</span>';
//     }
//     $gmail_check = mysqli_query($con, $gmail_check);
//     if (mysqli_num_rows($phone_check) > 0) {
//         echo '<span class="text-danger">The phone number is already exist!</span>';
//     } else {
//         echo '<span class="text-success">The phone number is available!</span>';
//     }
// }
?>
<?php
mysqli_close($con);
include("footer.php");
?>