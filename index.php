<?php
session_start();

if(isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] == 1)
{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LMU Health Centre App</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class = 'container'>
    <br/>
    <br/>
    <div class="jumbotron mainn">
    <div class = 'row'>
    <div class = 'col-sm-4 left-panel'>
    <div class="thumbnail">
        <img src="img/logo.png" alt="Landmark University Health Centre" class="" width = '150' height = '150'>
        <div class="caption">
                <h3 class = 'text-success'>LUHCM</h3>
                <p><?php echo $_SESSION['NAME']; ?></p>
                <div> <b><i><?php echo $_SESSION['EMAIL']; ?></i></b> <br/> <a href="logout.php" class="btn btn-default" role="button"> Logout <span class = 'glyphicon glyphicon-log-out'> </span></a></div>
                <br/>

                <ul class="nav nav-pills nav-stacked list-group" role="tablist">

                <?php
                $user_name = "root";
                $pass_word = "";
                $database = "luhcm";
                $server = "localhost";
                $db_handle = mysqli_connect($server, $user_name, $pass_word);
                $db_found = mysqli_select_db($db_handle, $database);

                $recipient = $_SESSION['USER'];
                $sql = "SELECT * FROM users WHERE ID != $recipient ORDER BY NAME ASC";
                    $sqlq = mysqli_query($db_handle, $sql);
                    if($sqlq)
                    {
                  
                      if(mysqli_num_rows($sqlq) > 0)
                      {
                         
                        while($sqlr = mysqli_fetch_array($sqlq))
                        {
                          echo "<li role='presentation'><a href='#' class=''> {$sqlr['NAME']} <span class='badge'>+1</span></a></li>";
                        }
                          
                    
                      }
                      
                    }
                    ?>

                </ul>
              </div>

            </div>
            
    </div>
    <div class = 'col-sm-8'>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Messages</h3>
      </div>
      <div class="panel-body">
      <div class = 'message-area'>
          
          
      </div>

    <div class = 'col-sm-12'>
    <form class = 'sendform'>
      <div class="input-group">
            <input type="text" class="form-control message" placeholder="Type Message"  name = 'message' required>
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success" type="button">Send <span class = 'glyphicon glyphicon-triangle-right'> </span></button>
            </span>
          </div>
          </form>
          </div>
      </div>
    </div>
    

    </div>
    </div>
    </div>
    </div>

    

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php

}
else
{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LMU Health Centre App</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class = 'container'>
    <br/>
    <br/>
    <div class="jumbotron mainn">
    <div class = 'row'>
    <div class = 'col-sm-4 left-panel'>
    <div class="thumbnail">
        <img src="img/logo.png" alt="Landmark University Health Centre" class="" width = '150' height = '150'>
        <div class="caption">
                <h3 class = 'text-success'>LUHCM</h3>
                
              </div>

            </div>
            
    </div>
    <div class = 'col-sm-8'>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
      </div>
      <div class="panel-body">
     <br/>
     <br/>
      <form class = 'logform'>
        <div class="form-group">
          <label for="exampleInputEmail1">Email Address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name = 'email' required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = 'password' required>
        </div>
        
        
        <button type="submit" class="btn btn-default">Login <span class = 'glyphicon glyphicon-log-in'> </span></button>
      </form>
          </div>
      </div>
    </div>
    

    </div>
    </div>
    </div>
    </div>

    

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php

}

?>