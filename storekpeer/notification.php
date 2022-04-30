Code:-
notification.php

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<table width="100%" style="background-color: #0066ff;color: white;">
    <tr width="75%">
        <td>
            <h2>Welcome to facebook</h2>
        </td>
        <td width="15%">
            <i class="fa fa-bell" aria-hidden="true" id="noti_number"></i>
        </td>
    </tr>
</table>
<script type="text/javascript">
function loadDoc() {


    setInterval(function() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("noti_number").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "data.php", true);
        xhttp.send();

    }, 1000);


}
loadDoc();
</script>


data.php

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM notification_data";
$result = $conn->query($sql);

echo $result->num_rows;
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Notification: " . $row["description"];
    }
} else {
    echo "0 results";
}
*/
$conn->close();
?>