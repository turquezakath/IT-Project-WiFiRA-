<?php
    $user= $_SESSION['userAccount'];
    $usr = $_SESSION['username'];
    $user_id = $user->getAccountId();
    $query = $pdo->prepare("SELECT * from kioskmachine;");
    $query->execute();
    $result = $query->fetchAll();

    echo "<tr>";
    echo "<th>Kiosk ID</th>";
    echo "<th>Kiosk Name</th>";
    echo "<th>Location </th>";
    echo "<th>IP Address</th>";
echo "<th>Kiosk Status</th>"; 
    echo "</tr>";

    foreach($result as $query){
        $rid = $query['kioskStatus'];
        echo "<tr>";
        echo "<td>" . $query['kioskId'] . "</td>";
        echo "<td>" . $query['kioskName'] . "</td>";
        echo "<td>" . $query['location'] . "</td>";
        echo "<td>" . $query['ipAddress'] . "</td>";
        echo "<td>" . $query['kioskStatus'] . "</td>";

        echo "</td>";
        echo "</tr>";
        
    }
?>