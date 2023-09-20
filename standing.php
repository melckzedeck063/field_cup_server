<?php
 require_once('connect.php');
$match= "";
 if(isset($_POST['MATCH_PLAYED'])){
$match = $_POST['MATCH_PLAYED'];
 }
 $position  = "";
 if(isset($_POST['POSITION'])){
 $position= $_POST['POSITION'];
 }
 $match1 = "";
 if(isset($_POST['MATCH_LOST'])){
 $match1 = $_POST['MATCH_LOST'];
 }
 $match2= "";
 if(isset($_POST['MATCH_DRWAS'])){
 $match2= $_POST['MATCH_DRWAS'];
 }
$point = "";
 if(isset($_POST['POINTS'])){
 $point = $_POST['POINTS'];
 }
 $admin= "";
 if(isset($_POST['ADMIN_ID'])){
 $admin= $_POST['ADMIN_ID'];
 }
 $goal1= "";
 if(isset($_POST['GOAL_DEFFERENCE'])){
 $goal1 = $_POST['GOAL_DEFFERENCE'];
 }

 $sql = "INSERT INTO standing (MATCH_PLAYED,POSITION,MATCH_LOST,MATCH_DRWAS,POINTS,ADMIN_ID,GOAL_DEFFERENCE) 
 values ('$match','$position','$match1','$match2','$point ','$admin','$goal1')";

 if(mysqli_query($conn,$sql)){
      $result['success']='1';
  $result['message']='successful';
      echo json_encode($result);
    mysqli_close($conn);
 }
 else {
      $result['success']='0';
      $result['message']='error';
          echo json_encode($result);
          mysqli_close($conn);
 }
   ?>
