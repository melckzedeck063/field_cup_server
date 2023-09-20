<?php

require_once('connect.php');

 $select_query = "SELECT * FROM teams";
 $results = mysqli_query($conn,$select_query);

 if(mysqli_num_rows($results) > 0){

    $teams = array();

    while ($row = mysqli_fetch_assoc($results)) {
        $teams[] = $row;
    }

    if (count($teams) > 0) {
        $result["success"] = "1";
        $result["message"] = "Teams data found successfully";
        $result["teams_data"] = $teams;
        echo json_encode($result);
    } else {
        $result["success"] = "0";
        $result["message"] = "No teams data found";
        echo json_encode($result);
    }
 }
 else  {
    $result["success"] = "0";
    $result["message"] = "No teams data found";
    echo json_encode($result);
 }

?>