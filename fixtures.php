<?php

require_once('connect.php');

 $select_query = "SELECT * FROM time_table";
 $results = mysqli_query($conn,$select_query);

 if(mysqli_num_rows($results) > 0){

    $fixtures = array();

    while ($row = mysqli_fetch_assoc($results)) {
        $fixtures[] = $row;
    }

    if (count($fixtures) > 0) {
        $result["success"] = "1";
        $result["message"] = "fixtures data found successfully";
        $result["fixtures_data"] = $fixtures;
        echo json_encode($result);
    } else {
        $result["success"] = "0";
        $result["message"] = "No fixtures data found";
        echo json_encode($result);
    }
 }
 else  {
    $result["success"] = "0";
    $result["message"] = "No fixtures data found";
    echo json_encode($result);
 }

?>