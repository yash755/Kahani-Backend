<?php



$servername = "localhost";
$username = "root";
$password = "Yash!197";
$dbname = "stories";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}; 
//echo "Connected successfully";

$sql = "SELECT * FROM stories";
$result = $conn->query($sql);

$image_list = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                $k = array('id' => $row["sno"] ,'story_name' => $row["story_name"], 'category' => $row["story_category"]);
                array_push($image_list,$k);
//        echo "id: " . $row["sno"]. " - Name: " . $row["imagepath"];
    }
}

$conn->close();

exit(json_encode($image_list))

?>
