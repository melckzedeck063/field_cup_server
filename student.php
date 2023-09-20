<?php
 require_once('connect.php');
$student= "";
 if(isset($_POST['STUDENTS_ID'])){
$student = $_POST['STUDENTS_ID'];
 }
 $firstname = "";
 if(isset($_POST['FIRST_NAME'])){
 $firstname= $_POST['FIRST_NAME'];
 }
 $middlename= "";
 if(isset($_POST['MIDDLE_NAME'])){
 $middlename = $_POST['MIDDLE_NAME'];
 }
 $lastname= "";
 if(isset($_POST['LAST_NAME'])){
 $lastname= $_POST['LAST_NAME'];
 }
$email= "";
 if(isset($_POST['EMAIL'])){
 $email= $_POST['EMAIL'];
 }
 $password= "";
 if(isset($_POST['PASSWORD'])){
 $password= $_POST['PASSWORD'];
 }

 $admin= "";
 if(isset($_POST['ADMIN_ID'])){
 $admin= $_POST['ADMIN_ID'];
 }


 $sql = "INSERT INTO student (STUDENT_ID,FIRST_NAME,MIDDLE_NAME,LAST_NAME,EMAIL,PASSWORD,ADMIN_ID) 
 VALUES ('$student','$firstname','$middlename','$lastname','$email ','$password','$admin')";



 if(mysqli_query($conn,$sql)){
      $result['success']="1";
      $result['message']='Student registered successfully';
      echo json_encode($result);
    mysqli_close($conn);
 }
 else {
      $result['success']='0';
      $result['message']='Request failed please try again';
          echo json_encode($result);
          mysqli_close($conn);
 }
   ?>
