<?php
require 'classes/UserAccount.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />

      <link rel="stylesheet" href="pages/assets/css/style.css">

      <style type="text/css">
      body {
        background-image: url("pages/assets/img/bg.jpg");
        background-repeat: no-repeat;
        background-size: 600px;
		background-position: center;
        background-color: #ffffff;; /* Black fallback color */
      background-color: #ffffff;; /* Black w/opacity */
      }
      </style>

</head>
<body>
  <div align="left">
    <div style="width:310px; border: solid 5px #686667; " align="left">
      <?php
        if(isset($errMsg)){
          echo '<div style="color:black;text-align:center;font-size:120px;">'.$errMsg.'</div>';
        }
      ?>
      <div style="background-color:#686667; color:#FFFFFF; padding:15px;text-align:center; font-family:life savers; font-size:30px;"><b>WiFiRA Login</b></div>
      <div style="margin:30px">
          <form action="" method="post">
          <label style="color:#000000; text-align: center; font-family:life savers; font-size:18px;"><b> Username: </b></label><input type="text" name="username" class="box"/><br /><br />
          <label style="color:	#000000; text-align: center ;font-family:life savers; font-size:18px;"><b>Password:</b></label><input type="password" name="password" class="box" /><br/><br />
          <input type="submit" name='submit' class="btn btn-warning" value="Submit" class="col s6" class='submit' style="background-color:#686667; font-family:life savers; font-size:18px;"/><br />
          </form>
          <form action="signup.php" method="post">
          <input type="submit" value="Add Account" name="signup" class="btn btn-warning" style="background-color:#686667; font-family:life savers; font-size:18px;"/>
      </div>
    </div>
  </div>
    <?php
    $errMsg = "";
  if(isset($_POST['submit'])){
    //username and password sent from Form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username == '')
      $errMsg .= 'You must enter your Username<br>';

    if($password == '')
      $errMsg .= 'You must enter your Password<br>';

    //if($errMsg == ''){
        if($username && $password){
            require "pages/fragments/connection.php";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and accountStatus='Enable' ";
            $queryFail = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and 
              accountStatus='Enable' ";
            $records = $pdo->query($queryLogin);
            $records->execute();
            $counter = $records->rowCount();
            
            $record = $pdo->query($queryFail);
            $record->execute();
            $counters = $record->rowCount();

            if ($counters >= 1) {
                while($rows = $record->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];
                    if($username == $dbuser && $password == $dbpass ) {
                           $message = "Your Account has not yet been approved. Please contact your system Administrator";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
            }
            if($counter != 0){
                while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];
                    if($username == $dbuser && $password == $dbpass ) {
                        session_start();

                        /*
                         * The whole userAccount information pack into an object and place inside the user session for further usage
                         * */
                        $accountNo = $rows["accountNo"];
                        $roleId = $rows["roleId"];
                        $name = $rows["name"];
                        $address = $rows["address"];
                        $username = $rows["username"];
                        $password = $rows["password"];
                        $accountStatus = $rows["accountStatus"];
                        $image = $rows["image"];

                        $userAccount = new UserAccount($accountNo, $dbuser, '', $roleId, $name,
                            $address, $accountStatus, $image);

                        $_SESSION["userAccount"] = $userAccount;


                        $_SESSION["username"]=$dbuser;
                        header('location:pages/index.php');

                    }else{
                       $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

    }

  }

?>
    <?php
    $errMsg = "";
    if(isset($_GET['submit'])){
        //username and password sent from Form
        $username = trim($_GET['username']);
        $password = trim($_GET['password']);

        if($username == '')
            $errMsg .= 'You must enter your Username<br>';

        if($password == '')
            $errMsg .= 'You must enter your Password<br>';

        //if($errMsg == ''){
        if($username && $password){
            require "pages/fragments/connection.php";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' ";

            $records = $pdo->query($queryLogin);
            $records->execute();
            $counter = $records->rowCount();


            if($counter != 0){
                while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];
                    if($username == $dbuser && $password == $dbpass ) {
                        session_start();

                        /*
                         * The whole userAccount information pack into an object and place inside the user session for further usage
                         * */
                        $accountNo = $rows["accountNo"];
                        $roleId = $rows["roleId"];
                        $name = $rows["name"];
                        $address = $rows["address"];
                        $username = $rows["username"];
                        $password = $rows["password"];
                        $accountStatus = $rows["accountStatus"];
                        $image = $rows["image"];

                        $userAccount = new UserAccount($accountNo, $dbuser, '', $roleId, $name,
                            $address, $accountStatus, $image);

                        $_SESSION["userAccount"] = $userAccount;


                        $_SESSION["username"]=$dbuser;
                        header('location:pages/index.php');

                    }else{
                        $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

        }

    }

    ?>


    </body>

</html>
