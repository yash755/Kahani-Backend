<?php

$servername = "localhost";
$username = "root";
$password = "Yash!197";
$dbname = "stories";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$json = file_get_contents('php://input');
$obj = json_decode($json);
$id = $obj[0]->id;

$image_list = array();

$sql = "SELECT * FROM stories WHERE sno = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                $k = array('id' => $row["sno"] ,'story_name' => $row["story_description"]);
                array_push($image_list,$k);
//        echo "id: " . $row["sno"]. " - Name: " . $row["story_description"];
    }
}

$conn->close();

exit(json_encode($image_list));

?>
