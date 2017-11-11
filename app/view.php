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
$response['message'] = '';
$lastmessage = $_GET['lastmessage'];
$recipient = $_SESSION['USER'];
$sql = "SELECT * FROM messages WHERE SENDER  AND ID > $lastmessage ORDER BY ID ASC";
    $sqlq = mysqli_query($db_handle, $sql);
    if($sqlq)
    {
  
      if(mysqli_num_rows($sqlq) > 0)
      {
         
        while($sqlr = mysqli_fetch_array($sqlq))
        {
          $message = $sqlr['MESSAGE'];
          $sender = $sqlr['SENDER'];
          if($sender == $recipient)
          {
            $response['message'] = $response['message'] . "<div class = 'row'> <div class = 'col-sm-2'></div><div class = 'col-sm-10'><div class='alert alert-info' role='alert'>". $message . "</div></div></div>";
          }
          else
          {
            $sqlu = "SELECT * FROM users WHERE ID = $sender";
                $sqlqu = mysqli_query($db_handle, $sqlu);
                if($sqlqu)
                {
              
                  if(mysqli_num_rows($sqlqu) > 0)
                  {
                     
                    while($sqlru = mysqli_fetch_array($sqlqu))
                    {
                      $name = $sqlru['NAME'];
                      $email = $sqlru['EMAILADDRESS'];
                    }
                  }
                }

            
            $response['message'] = $response['message'] . "<div class = 'row'><div class = 'col-sm-10'><div class='well well-sm'> <b>$name</b> <i> $email</i> <hr/> $message </div></div><div class = 'col-sm-2'></div></div>";


          }


          
          $response['lastmessage'] = $sqlr['ID'];
        }
          $response['status'] = 1;
    
      }
      
    }
echo json_encode($response);

}


?>