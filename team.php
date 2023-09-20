<?php
//  require_once('connect.php');

// $coach= "";
//  if(isset($_POST['coach'])){
// $coach = $_POST['coach'];
//  }
//  $team  = "";
//  if(isset($_POST['team'])){
//  $team = $_POST['team'];
//  }
 
// $team2 = "";
//  if(isset($_POST['points'])){
//  $team2 = $_POST['points'];
//  }
//  $team3= "";
//  if(isset($_POST['position'])){
//  $team3 = $_POST['position'];
//  }
//  $admin= "";
//  if(isset($_POST['adminID'])){
//  $admin = $_POST['adminID'];
//  }
//  $goal= "";
//  if(isset($_POST['goals'])){
//  $goal =  $_POST['goals'];
//  }

//  if(!empty($coach) && !empty($team) && !empty($admin)){

//    $sql = "INSERT INTO teams (team,coach,points,position,goals,adminID) 
//     VALUES ('$team','$coach','$team2','$team3','$goal','$admin')";
  
//    if(mysqli_query($conn,$sql)){
//         $result['success']='1';
//     $result['message']='successful';
//         echo json_encode($result);
//       mysqli_close($conn);
//    }
//    else {
//         $result['success']='0';
//         $result['message']='error';
//             echo json_encode($result);
//             mysqli_close($conn);
//    }
//  }
//  else {
//   $result['success']='0';
//   $result['message']='All inputs are required';
//       echo json_encode($result);
//  }


   ?>

<?php
require_once('connect.php');

$coach = $_POST['coach'] ?? "";
$team = $_POST['team'] ?? "";
$team2 = $_POST['points'] ?? 0; // Ensure it's numeric
$team3 = $_POST['position'] ?? 0; // Ensure it's numeric
$admin = $_POST['adminID'] ?? "";
$goal = $_POST['goals'] ?? 0; // Ensure it's numeric

if (!empty($coach) && !empty($team) && !empty($admin)) {
    $stmt = $conn->prepare("INSERT INTO teams (team, coach, points, position, goals, adminID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiis", $team, $coach, $team2, $team3, $goal, $admin);
    
    if ($stmt->execute()) {
        $result['success'] = '1';
        $result['message'] = 'Successfully registered the team.';
        echo json_encode($result);
    } else {
        $result['success'] = '0';
        $result['message'] = 'Error registering the team.';
        echo json_encode($result);
    }
    $stmt->close();
} else {
    $result['success'] = '0';
    $result['message'] = 'All inputs are required.';
    echo json_encode($result);
}
?>
