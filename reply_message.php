<?php
/**
 * Created by PhpStorm.
 * User: simonxu14
 * Date: 5/24/2016
 * Time: 10:21 AM
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

if( $_GET["message_id"] || $_GET["user_id"] || $_GET["file_id"] || $_GET["content"] || $_GET["created_by"] || $_GET["updated_by"]) {
    echo "message_id: ". $_GET['message_id']. "<br>";
    echo "user_id: ". $_GET['user_id']. "<br>";
    echo "file_id: ". $_GET['file_id']. "<br>";
    echo "content: ". $_GET['content']. "<br>";
    echo "created_by: ". $_GET['created_by']. "<br>";
    echo "updated_by: ". $_GET['updated_by']. "<br>";
}

$message_id = $_GET['message_id'];
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