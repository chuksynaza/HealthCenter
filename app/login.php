<?php
session_start();

$user_name = "root";
$pass_word = "";
$database = "luhcm";
$server = "localhost";
$db_handle = mysqli_connect($server, $user_name, $pass_word);
$db_found = mysqli_select_db($db_handle, $database);

$response['status'] = 0;

$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE EMAILADDRESS = '$email' AND PWORD = '$password'";
    $sqlq = mysqli_query($db_handle, $sql);
    if($sqlq)
    {
  
      if(mysqli_num_rows($sqlq) == 1)
      {
         
        while($sqlr = mysqli_fetch_array($sqlq))
        {
          $_SESSION['LOGGED_IN'] = 1;
          $_SESSION['USER'] = $sqlr['ID'];
          $_SESSION['NAME'] = $sqlr['NAME'];
          $_SESSION['EMAIL'] = $sqlr['EMAILADDRESS'];
        }
          $response['status'] = 1;

    
      }
    }
echo json_encode($response);


?>