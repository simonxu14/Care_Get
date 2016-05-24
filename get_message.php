<?php
//this code is to get all the data in table message_entry
/**
 * Created by PhpStorm.
 * User: simonxu14
 * Date: 5/24/2016
 * Time: 11:19 AM
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

$query="select * from message_entry";
$result=$conn->query($query);

if ($result) {

    if($result->num_rows>0){
        while($row =$result->fetch_array() ){
            echo ($row[0])."<br>";
            echo ($row[1])."<br>";
            echo ($row[3])."<br>";
            echo ($row[4])."<br>";
            echo ($row[5])."<br>";
            echo ($row[6])."<br>";
            echo ($row[7])."<br>";
            echo ($row[8])."<br>";
            echo "<hr>";
        }
    }

}else {
    echo "Fail";
}
$result->free();
$conn->close();
