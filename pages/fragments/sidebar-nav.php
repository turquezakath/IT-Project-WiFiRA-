<!-- /. NAV SIDE  -->

<?php
    require_once 'connection.php'; 
    
    $query = $pdo->prepare("SELECT * FROM user WHERE username='".$_SESSION['username']."';");
    $query->execute();
    $print = $query->fetch();
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">		
    </head>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

        <li style ="font-family:Cinzel Decorative; font-size:18px">
            <a href=index.php><i class="fa fa-tachometer"></i> Dashboard<span class="fa arrow"></span></a>
        </li>
        <li style ="font-family: Cinzel Decorative; font-size:18px">
            <a href="sales.php"><i class="fa fa-question-circle"></i> Sales<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                 <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-daily.php"><i class="fa fa-question-circle"></i>Daily</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-weekly.php"><i class="fa fa-question-circle"></i>Weekly</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-monthly.php"><i class="fa fa-question-circle"></i>Monthly</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-yearly.php"><i class="fa fa-question-circle"></i>Yearly</a>
                </li>
            </ul>				
        </li>

        <li style ="font-family: Cinzel Decorative; font-size:18px">
            <a href="kiosk.php"><i class="fa fa-comments"></i>Kiosks<span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
            	<li style ="font-family: Cinzel Decorative;">
                    <a  href="kiosk-manage.php"><i class="fa fa-comments"></i>Manage Kiosks</a>
                </li>
				<li style ="font-family: Cinzel Decorative;">
                    <a  href="kiosk-add.php"><i class="fa fa-comments"></i>Add Kiosk</a>
                </li>
            </ul>
        </li>
        <li  style ="font-family: Cinzel Decorative;">
            <a href="#"  style ="font-family: Cinzel Decorative; font-size:18px"><i class="fa fa-user" ></i> Accounts<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="view-profile.php"><i class="fa fa-user fa-3x"></i> View Profile</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                                    <a  href="view-profile.php"><i class="fa fa-user fa-3x"></i>Manage Staff Accounts</a>
                                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a href="edit-profile.php"><i class="fa fa-pencil-square fa-3x"></i> Edit Profile</a>
                </li>
            </ul>            
        </li>
        <li style ="font-family: Cinzel Decorative;">
            
        </li>			
        </ul>
    </div>
</nav> 
</html>