
<?php 
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>group 8 public site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./homePage.css">
    <link rel="stylesheet" type="text/css" href="./nav.css">
    <link rel="stylesheet" type = "text/css" href="table.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="nav">
	<h1 id="title">Declining Xchange<h1>
        <div id="userDropdown"  style="display:inline-block">
    	    <button class='dropButton'>Menu</button> 
            <div class="dropdown-content" id = "userDropContent">
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/signOut.php'">Sign Out</p>
		<p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/userListings.php'">Your Listings</p>
		<p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/history.php'">History</p>
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
		<p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/compltedTransactionsLogs.php'"></p>
            </div>
        </div>
	<button class="dropButton" id="searchButton" onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/listingSearch.php'">Search</button>
    </div>
<div id="wrapper">
	<div id="listings">
		<table>
		<h3 class="boxHeader">Listings</h3>
        	<tr>
            		<th>Item Name</th>
			<th>Item ID</th>
			<th>Student Name</th>
            		<th>Requested Declining</th>
        	</tr>
        <?php
                $conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
                if($conn-> connect_errno){
                    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                }

                $listingSql = "select ItemName, ItemID, StudentName, RequestedDeclining from (listings natural join product natural join user);";
                $result  = $conn->query($listingSql);

                if($result->num_rows > 0){
                    while($row =  mysqli_fetch_assoc($result)){

                        echo "<tr align='center'><td>{$row['ItemName']}</td><td>{$row['ItemID']}</td><td>{$row['StudentName']}</td><td>{$row['RequestedDeclining']}</td></tr>";
                    }
                }

                $conn-> close();
            ?>
    		</table>
	</div>

	<div id="Bids">
                <table>
                <h3 class="boxHeader">Active Bids</h3>
                <tr>
                        <th>Item Name</th>
                        <th>Item ID</th>
                        <th>Bidder Name</th>
                        <th>Requested Declining</th>
			<th>Bid</th>
                </tr>
        <?php
                $conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
                if($conn-> connect_errno){
                    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                }

                $listingSql = "select ItemName, listings.ItemID, StudentName, RequestedDeclining, Bid from (listings natural join product natural join user) join biddingOn on listings.ItemID = biddingOn.ItemID;";
                $result  = $conn->query($listingSql);

                if($result->num_rows > 0){
                    while($row =  mysqli_fetch_assoc($result)){

                        echo "<tr align='center'><td>{$row['ItemName']}</td><td>{$row['ItemID']}</td><td>{$row['StudentName']}</td><td>{$row['RequestedDeclining']}</td><td>{$row['Bid']}</td></tr>";
                    }
                }

                $conn-> close();
            ?>
                </table>
        </div>
</div>
</body>

</html>
