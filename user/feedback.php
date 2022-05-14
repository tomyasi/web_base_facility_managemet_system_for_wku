<?php
session_start();
include("../connection.php");
if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
if (isset($_POST['send'])) {
    $id = $_POST['hidden_id'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedback VALUES (NULL,'$_SESSION[user_id]','$id','$message')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: view_responce.php');
    } else {
        echo '<script> alert("The feedback not  Saved"); </script>';
    }
?>
<?php
}
?>