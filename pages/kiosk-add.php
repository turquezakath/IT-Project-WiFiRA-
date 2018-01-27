<!DOCTYPE html>
<?php
    require '../classes/UserAccount.php';
    session_start();
    $sessionUserAccount = $_SESSION["userAccount"];
?>
<html lang="en">
<head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">		
    </head>
<?php
    include 'fragments/head.php';
?>

    <body>
           

           <?php
            //Start your session

            if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                echo "You are logged in as, " . $_SESSION['username'] . "!";
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
                <?php include 'fragments/sidebar-nav.php'; ?>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style = "font-family: special elite; color:#000000">Add Kiosk</h1>
                    <?php
                        
                        $user = $_SESSION["userAccount"];
                        $user_id = $user->getAccountId();
                        
                        $qry = $pdo->prepare("select * accounts where accounts.accountNo = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch();     
                        
                    ?> 
            <form role="form" method="post" action="" autocomplete="off">

                <div class="form-group">
                    <input type="text" name="kioskname" id="kioskName" class="form-control input-lg" placeholder="Kiosk Name" value="<?php if(isset($error)){ echo $_POST['kioskName']; } ?>" tabindex="1">
                </div>
                <div class="form-group">
                    <input type="number" name="kioskId" id="KioskID" class="form-control input-lg" placeholder="Kiosk ID" value="<?php if(isset($error)){ echo $_POST['kioskId']; } ?>" tabindex="2">
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="float" name="ipadd" id="ipaddress" class="form-control input-lg" placeholder="IP Address" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
                </div>
                

            </form>
                </div>
            </div>
        </div>
    </body>
</html>    
