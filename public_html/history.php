<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./nav.css">
<link rel="stylesheet" type="text/css" href="./table.css">
<link rel="stylesheet" type="text/css" href="./style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div id="nav">
        <h1 id="title" onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/homePage.php'">Declining Xchange<h1>
        <div id="userDropdown"  style="display:inline-block">
            <button class='dropButton'>Menu</button> 
            <div class="dropdown-content" id = "userDropContent">
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/signOut.php'">Sign Out</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/userListings.php'">Your Listings</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/homePage.php'">Home</p>
            </div>
	</div>
	<div class="dataDropdown" style="display: inline-block">
            <button class="dropButton">data tables</button>
            <div class="dropdown-content" id="dataDropContent">
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/user.php'">user</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/product.php'">product</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/listings.php'">listings</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/has.php'">has</p>
                <p
                    onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/completedTransactions.php'">
                    completed transactions</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/biddingOn.php'">bidding on
                </p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/are.php'">are</p>
            </div>
        </div>
    </div>
<div id="container">
    <table>
        <tr>
            <th>Item ID</th>
            <th>Requested Declining</th>
            <th>Action</th>
	    <th>Date</th>
        </tr>
        <?php
                $conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
                if($conn-> connect_errno){
                    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                }

                $sql = "select ItemID, RequestedDeclining, action, cdate from listingslogs where StudentID = ". $_SESSION["student_id"];
                $result  = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row =  mysqli_fetch_assoc($result)){

                        echo "<tr align='center'><td>{$row['ItemID']}</td><td>{$row['RequestedDeclining']}</td><td>{$row['action']}</td><td>{$row['cdate']}</td></tr>";
                    }
                }

                $conn-> close();
            ?>
    </table>
</div>
</body>
</html>
