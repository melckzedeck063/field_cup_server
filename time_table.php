<?php
 require_once('connect.php');
$date = "";
 if(isset($_POST['date'])){
 $date = $_POST['date'];
 }
 $day  = "";
 if(isset($_POST['day'])){
 $day = $_POST['day'];
 }
 $ground = "";
 if(isset($_POST['ground'])){
 $ground = $_POST['ground'];
 }
 
$match = "";
 if(isset($_POST['teams'])){
 $match = $_POST['teams'];
 }
 $time = "";
 if(isset($_POST['time'])){
 $time = $_POST['time'];
 }

 $sql = "INSERT INTO time_table (date,day,time,game,ground) VALUES ('$date','$day','$time','$match','$ground')";
 if(mysqli_query($conn,$sql)){
      $result['success']='1';
  $result['message']='Time table successfull added';
      echo json_encode($result);
    mysqli_close($conn);
 }
 else {
      $result['success']='0';
      $result['message']='Request failed';
          echo json_encode($result);
          mysqli_close($conn);
 }
   ?>
