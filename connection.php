<?php
function connection(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "id12896945_greenhouse";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    return $conn;
}

function nodeData($Node){
    $conn = connection();
    $nodeArray=array();
    $sql = "SELECT * FROM ".$Node." ORDER BY dateTime";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($nodeArray,array($row["tempc"],$row["humidity"],$row["soilm"],$row["lightInt"],$row["soilr"],$row["dateTime"]));
        }
    } else {
        //echo "0 results";
    }
    $conn->close();
    return $nodeArray;
}

function insert($node,$temp,$hum,$soilm,$light,$soilr){
    $conn = connection();
    $sql = "INSERT INTO Node" .$node. " (tempc, humidity, soilm, lightInt, soilr) VALUES (" .$temp. ", " .$hum. ", " .$soilm. ", " .$light. ", '" .$soilr. "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?> 