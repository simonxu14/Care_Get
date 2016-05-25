<?php
/**
 * Created by PhpStorm.
 * User: simonxu14
 * Date: 5/25/2016
 * Time: 11:51 AM
 */

//***********************************************************************
//***********************************************************************
//******  this code is to tell server user read the a new message  ******
//***********************************************************************
//***********************************************************************

//the server information
$server = "192.168.2.185";
$username = "xinlong";
$password = "xinlong";
$database = "carecarma";
date_default_timezone_set('America/Kentucky/Louisville');

//using mysqli to connect mysql database
$conn = new mysqli($server, $username, $password, $database);

//check if connecting is good, print "Connected successfully if connect to the mysql database"
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//print the form user input
//message_id is the message user read
//user_id is the id of the user who read this message
if( $_GET["message_id"] || $_GET["user_id"]) {
    echo "message_id: ". $_GET["message_id"]. "<br>";
    echo "user_id: ". $_GET["user_id"]. "<br>";
}

//****************************************************
//*** update the information in table user_message ***
//****************************************************
$message_id = $_GET["message_id"];
$user_id = $_GET["user_id"];
$created_at = date("Y-m-d h:i:sa");
$created_by = $_GET['created_by'];
$updated_at = date("Y-m-d h:i:sa");
$updated_by = $_GET['created_by'];

$sql = "INSERT INTO message (title, created_at, created_by, updated_at, updated_by) VALUES ('$title', '$created_at', '$created_by', '$created_at', '$created_by')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//the auto generated message_id
$message_id = mysqli_insert_id($conn);
echo $message_id;