<?php
 require_once('connect.php');

 $position = "";
 if(isset($_POST['position'])){
 $position= $_POST['position'];
 }
 $age= "";
 if(isset($_POST['age'])){
 $age = $_POST['age'];
 }
 
 $team= "";
 if(isset($_POST['team'])){
 $team= $_POST['team'];
 }
 $name= "";
 if(isset($_POST['name'])){
 $name= $_POST['name'];
 }

 if(!empty($name) && !empty($team) && !empty($age)){

  $sql = "INSERT INTO players (name,position,age,team) 
  values ('$name','$position','$age','$team')";
 
  if(mysqli_query($conn,$sql)){
       $result['success']='1';
   $result['message']='Player registered successfull';
       echo json_encode($result);
     mysqli_close($conn);
  }
  else {
       $result['success']='0';
       $result['message']='error';
           echo json_encode($result);
           mysqli_close($conn);
  }
 }
 else {
  $result['success']='0';
  $result['message']='All fields are required';
      echo json_encode($result);
      mysqli_close($conn);
 }


   ?>
