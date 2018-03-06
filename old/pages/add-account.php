<!DOCTYPE html>

<?php
    require '../classes/UserAccount.php';
    session_start();
    $sessionUserAccount = $_SESSION["userAccount"];
?>

<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />

      <link rel="stylesheet" type="text/css" href="pages/assets/css/style.css"/>
      <link rel="stylesheet" type="text/css" href="pages/assets/css/style2.css"/>
</head>
    
<?php
    include 'fragments/head.php';
?>

<body>
           
           <?php
            //Start your session

            if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
               
            } else {
                header("location: login.php");
            }
            function echoActiveClassIfRequestMatches($requestUri){
                $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
                if ($current_file_name == $requestUri)
                    echo 'class="active-menu"';
            }
            ?>

            <div id="wrapper">
                <?php include 'fragments/page-head.php'; ?>
                <!-- /. NAV TOP  -->
                <?php
                if(isset($_POST['saveprofile'])){
                    $account = $_SESSION["userAccount"];
                    $accountNo = $account->getAccountId();


                    $username = $_POST['inputUsername'];
                    $password = $_POST['inputPassword'];
                    $rePassword = $_POST['inputRePassword'];
                    $address = $_POST['inputAddress'];
                    $name = $_POST['inputname'];
                    //$selfinfo = $_POST['selfinfo'];
                    //$yearexp = $_POST['inputExp'];

                    include "fragments/connection.php";

                    if($password == $rePassword && $password != ''){
                        $updateWithPass = "update user_account set username=:username, password=:password, address=:address, name=:name where accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
                        $sql->execute();

                        $accountStatus = $account->getStatus();
                        $roleId = $account->getRoleId();
                        $image = $account->getUserPicture();

                        $_SESSION["userAccount"] = new UserAccount($accountNo, $username, '', $address, $name,
                            $accountStatus, $roleId, $image);
                        header('view-profile.php');

                    }else{
                        $updateWithoutPass = "update user_account set username=:username, password=:password, address=:address, name=:name where accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithoutPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
                        $sql->execute();

                        $accountStatus = $account->getStatus();
                        $roleId = $account->getRoleId();
                        $image = $account->getUserPicture();

                        $_SESSION["userAccount"] = new UserAccount($accountNo, $username, '', $address, $name,
                            $accountStatus, $roleId, $image);

                        header('view-profile.php');
                    }
                }

                ?>
                <?php include 'fragments/sidebar-nav.php'; ?>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                    <?php
                        
                        $user = $_SESSION["userAccount"];
                        $user_id = $user->getAccountId();
                        
                        $qry = $pdo->prepare("select * accounts where accounts.accountNo = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch();     
                        
                    ?> 
                    <div class="row">
                        <div class="col-md-12">
                        <h2 style = "font-family: Cinzel Decorative; color:#000000">Add Account</h2>   
                        </div>    
                    </div>
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post">
                          <fieldset>
                            <legend style = "font-family: special elite;">New Account</legend>

                             <div class="form-group">
                              <label for="inputAddress" class="col-lg-2 control-label" style = "font-size: 110%;">Enter new username </label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputUsername" placeholder="<?php echo $profileqry['address'] ?>">
                              </div>
                            </div>    
                              
                              
                                  
                             <div class="form-group">
                              <label for="inputname" class="col-lg-2 control-label" style = "font-size: 110%;">Name</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputname" placeholder="<?php echo $profileqry['username'] ?>">
                              </div>
                              </div>     

                            <div class="form-group">
                              <label for="inputAddress" class="col-lg-2 control-label" style = "font-size: 110%;">Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputAddress" placeholder="<?php echo $profileqry['password'] ?>" value="">
                              </div>
                            </div>  
                              
                            <div class="form-group">
                            <label for="roleId" class="col-lg-2 control-label" style = "font-size: 110%;">Account Type</label>
                            <div class="col-lg-10">
                            <select name="user">
                                <option value="">Account Type</option>
                                <option value="">Staff</option>
                                <option value="">Admin</option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label" style = "font-size: 110%;">Password</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputPassword" placeholder="<?php echo $profileqry['password'] ?>" value="">
                              </div>
                            </div>

                              <div class="form-group">
                                  <label for="inputRePassword" class="col-lg-2 control-label" style = "font-size: 110%;">Re-enter Password</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="inputRePassword" placeholder="<?php echo $profileqry['password'] ?>" value="">
                                  </div>
                            </div>
                              
                              <?php
                                include 'draft.php';
                              ?>
                              
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="createaccount" class="btn btn-primary" id="createaccount" value="submit">Create Account</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                        
                </div>
            </div>
        </div>
    </body>

</html>