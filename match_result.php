<?php
 require_once('connect.php');
$match= "test vs test";
 if(isset($_POST['match'])){
$match = $_POST['match'];
 }
 $results  = "4-2";
 if(isset($_POST['results'])){
 $results= $_POST['results'];
 }
 $yellow_card= "6";
 if(isset($_POST['yellow_cards'])){
 $yellow_card = $_POST['yellow_cards'];
 }
 $red_card= "0";
 if(isset($_POST['red_card'])){
 $red_card= $_POST['red_card'];
 }
$valuable_player = "testing";
 if(isset($_POST['valuable_player'])){
 $valuable_player = $_POST['valuable_player'];
 }


 if(!empty($match) && !empty($valuable_player)){
   $sql = "INSERT INTO match_results (match_played,results,yellow_card,red_card,valuable_player) 
   VALUES ('$match','$results','$yellow_card','$red_card','$valuable_player')";
  
   if(mysqli_query($conn,$sql)){
        $result['success']='1';
    $result['message']='Results successfull uploaded';
        echo json_encode($result);
      mysqli_close($conn);
   }
   else {
        $result['success']='0';
        $result['message']='Request failed try again';
            echo json_encode($result);
            mysqli_close($conn);
   }

 }
 else {
  $result['success']='0';
  $result['message']='All inputs are required';
      echo json_encode($result);
      mysqli_close($conn);
 }

   ?>
