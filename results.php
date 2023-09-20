<?php

require_once('connect.php');

 $select_query = "SELECT * FROM match_results";
 $results = mysqli_query($conn,$select_query);

 if(mysqli_num_rows($results) > 0){

    $match_results = array();

    while ($row = mysqli_fetch_assoc($results)) {
        $match_results[] = $row;
    }

    if (count($match_results) > 0) {
        $result["success"] = "1";
        $result["message"] = "match_results data found successfully";
        $result["match_results_data"] = $match_results;
        echo json_encode($result);
    } else {
        $result["success"] = "0";
        $result["message"] = "No match_results data found";
        echo json_encode($result);
    }
 }
 else  {
    $result["success"] = "0";
    $result["message"] = "No match_results data found";
    echo json_encode($result);
 }

?>