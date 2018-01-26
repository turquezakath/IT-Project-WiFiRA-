<?php
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">		
    </head>
<?php
    include 'fragments/head.php';
    ?>
<body id="index">
<?php 
    session_start();
    
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

        if ($current_file_name == $requestUri)
            echo 'class="active-menu"';
    }
    
    $user = $_SESSION["userAccount"];
    $user_id = $user->getAccountId();

?>
    <div id="wrapper">
        <?php include 'fragments/page-head.php'; ?>
           <!-- /. NAV TOP  -->
        <?php include 'fragments/sidebar-nav.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style = "font-family: special elite; color:#000000">Dashboard</h2>
                        <h5>Welcome 
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/> 

                           <div class="row">    
                <div class="col-md-3 col-sm-6 col-xs-6" >           
                    <div class="panel panel-back noti-box ">
                        <div class="text-box">
                            <h4 align="center">
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT * FROM sales");
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    echo count($result);                                          

                                    ?> Current Day Earnings
                                </strong>
                            </h4>
                        </div>

                     </div>
                 </div>
              

           
                <div class="col-md-3 col-sm-6 col-xs-6">      

                    <div class="panel panel-back noti-box">
                        <div class="text-box" >
                            <h4 align="center">
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT * FROM sales "); 
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    echo count($result);                                          

                                    ?> Yesterday Earnings
                                </strong>
                            </h4>
                        </div>

                     </div>
                 </div>
            






                          
                
        </div>


                    
                        <div class="text-box" >
                            <h4 align="left">

<input type="submit" name='submit' class="btn btn-warning" value="Daily" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
                        <input type="submit" name='submit' class="btn btn-warning" value="Weekly" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
<input type="submit" name='submit' class="btn btn-warning" value="Monthly" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
                        <input type="submit" name='submit' class="btn btn-warning" value="Yearly" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />
                                <img src="assets\img\chart.png"><br>
                            </h4>
                        </div>

                     </div>
                 </div>
        </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
   
</body>
</html>

