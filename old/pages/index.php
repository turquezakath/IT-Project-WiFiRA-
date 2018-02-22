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
                                <i class="fa fa-flag fa-2x pull-left"></i>
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Sold' ");
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    echo count($result);                                          

                                    ?> Vouchers Sold Today
                                </strong>
                            </h4>
                        </div>

                     </div>
                 </div>
              

           
                <div class="col-md-3 col-sm-6 col-xs-6">      

                    <div class="panel panel-back noti-box">
                        <div class="text-box" >
                            <h4 align="center">
                                <i class="fa fa-barcode fa-2x pull-left"></i>
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT * FROM `kiosk machine` WHERE kioskStatus='Enable' "); 
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    echo count($result);                                          

                                    ?> Kiosks Enabled
                                </strong>
                            </h4>
                        </div>

                     </div>
                 </div>

                 <div class="col-md-3 col-sm-6 col-xs-6"> 

                        <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Print Voucher</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Voucher</h4>
        </div>
        <div class="modal-body">
            <div class="jumbotron">
           <form class="form-horizontal" action="" method="post">
                          <fieldset>
                             
                            <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;">Create</label>
                                <div class="col-lg-10">
                                <input type="text" class="form-control" name="" placeholder="">
                                </div>
        
                            </div>                                                     

                                <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;">Quota</label>
                                <div class="col-lg-10">
                                <input type="text" class="form-control" name="" placeholder="">
                                </div>
        
                            </div>        
                                <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;">Expiration Time (hrs)</label>
                                <div class="col-lg-10">
                                <input type="text" class="form-control" name="" placeholder="">
                                </div>
        
                            </div>              
                           
                                <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;">Notes</label>
                                      <div class="col-lg-10">
                                <input type="text" class="form-control" name="" placeholder="">
                                    </div>
                              
                            </div>

                     
                              <?php
                                include 'draft.php';
                              ?>
                                   <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="saveprofile" class="btn btn-primary" id="saveprofile" value="submit">Confirm</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                 </div>

                 <div class="col-md-3 col-sm-6 col-xs-6"> 
                    <a class="btn btn-lg btn-primary" href="#">

                        <div class="text-box" >

                            <h4 align="center">
                                <i class="fa fa-plus fa-2x pull-left"></i>
                                <strong>
                                     Add Kiosk
                                </strong>
                            </h4>
                        </div>
                     </a>
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

