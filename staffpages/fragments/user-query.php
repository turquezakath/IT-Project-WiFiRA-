<?php
    $user= $_SESSION['userAccount'];
    $usr = $_SESSION['username'];
    $user_id = $user->getAccountId();
    $query = $pdo->prepare("SELECT roleId,name,address, accountStatus from accounts");
    $query->execute();
    $result = $query->fetchAll();

    echo "<tr>";
    echo "<th>Voucher Code</th>";
    echo "<th>Voucher Type</th>";
    echo "<th>Amount </th>";
    echo "<th>Date</th>";
    echo "</tr>";

    foreach($result as $query){
        $rid = $query['name'];
        echo "<tr>";
        echo "<td>" . $query['roleId'] . "</td>";
        echo "<td>" . $query['name'] . "</td>";
        echo "<td>" . $query['address'] . "</td>";
        echo "<td>" . $query['accountStatus'] . "</td>";

        echo "</td>";
        echo "</tr>";
        
    }
?>