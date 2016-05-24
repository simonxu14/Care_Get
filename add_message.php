<?php
//add a new message
/**
 * Created by PhpStorm.
 * User: simonxu14
 * Date: 5/24/2016
 * Time: 5:20 PM
 */
$server = "192.168.2.185";
$username = "xinlong";
$password = "xinlong";
$database = "carecarma";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if( $_GET["title"] || $_GET["created_by"] || $_GET["file_id"] || $_GET["content"] ) {
    echo "title: ". $_GET['title']. "<br>";
    echo "created_by: ". $_GET['created_by']. "<br>";
    echo "file_id: ". $_GET['file_id']. "<br>";
    echo "content: ". $_GET['content']. "<br>";
}

$title = $_GET['title'];
$created_at = date("Y-m-d h:i:sa");
$created_by = $_GET['created_by'];
$updated_at = date("Y-m-d h:i:sa");
$created_by = $_GET['created_by'];
//insert the data into the table message
$sql = "INSERT INTO message (title, created_at, created_by, updated_at, updated_by) VALUES ('$title', '$created_at', '$created_by', '$created_at', '$created_by')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//the auto generated message_id
$message_id = mysqli_insert_id($conn);

$send_to = $_GET["send_to"];
$send_array = explode(',',$send_to);

for($index=0;$index<count($send_array);$index++){
    echo $send_array[$index];echo "</br>";
    $user_id = $send_array[$index];
    $is_originator = true;
    if ($user_id != $created_by) {
        $is_originator = false;
    }
    $last_viewed = date("Y-m-d h:i:sa");
    $created_at = date("Y-m-d h:i:sa");
    $created_by = $_GET['created_by'];
    $updated_at = date("Y-m-d h:i:sa");
    $created_by = $_GET['created_by'];
    //insert the data into the table message
    $sql = "INSERT INTO user_message (message_id, user_id, is_originator, last_viewd, created_at, created_by, updated_at, updated_by) VALUES ('$message_id', '$user_id', '$is_originator', '$last_viewed', '$created_at', '$created_by', '$created_at', '$created_by')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$user_id = $_GET['user_id'];
$file_id = null;
$content = $_GET['content'];
$created_by = $_GET['created_by'];
$created_at = date("Y-m-d h:i:sa");
$updated_by = $_GET['updated_by'];
$created_at = date("Y-m-d h:i:sa");

$sql = "INSERT INTO message_entry (message_id, user_id, content, created_at, created_by, updated_at, updated_by) VALUES ('$message_id', '$user_id', '$content', '$created_at', '$created_by', '$created_at', '$updated_by')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();