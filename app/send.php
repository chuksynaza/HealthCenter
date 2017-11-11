<?php
session_start();

if(isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] == 1)
{

$user_name = "root";
$pass_word = "";
$database = "luhcm";
$server = "localhost";
$db_handle = mysqli_connect($server, $user_name, $pass_word);
$db_found = mysqli_select_db($db_handle, $database);

$response['status'] = 0;
$sender = $_SESSION['USER'];
$message = "'" . $_POST['message']. "'";
$sql = "INSERT INTO messages (SENDER, MESSAGE) VALUES ($sender, $message)";
    $sqlq = mysqli_query($db_handle, $sql);
    if($sqlq)
    {
  

         
          $response['status'] = 1;
      
    }
echo json_encode($response);

}

?>