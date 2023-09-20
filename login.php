<?php
require_once('connect.php');
$id = "";
if(isset($_POST['EMAIL'])){
$id = $_POST['EMAIL'];
}
$password = "";
if(isset($_POST['PASSWORD'])){
$password = $_POST['PASSWORD'];
}
$sql = "SELECT EMAIL,PASSWORD FROM student WHERE EMAIL=('$id') and BINARY PASSWORD=('$password')";
$retval = mysqli_query($conn,$sql);
if(! $retval ) {
   die('Could not get data: ' . mysqli_error($conn));
}
if($row = mysqli_fetch_array($retval)) {
  $result['success']="1";
  $result['message']='Login succesfull';
      echo json_encode($result);
    }else {
      $result['success']='0';
      $result['message']='Invalid login credentials';
          echo json_encode($result);
    }
?>
