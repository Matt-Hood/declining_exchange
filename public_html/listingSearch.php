
<!DOCTYPE html>
<html>
<head>
    <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./nav.css">
        <link rel="stylesheet" type = "text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="nav">
        <h1 id="title">Declining Xchange</h1>
        <div id="userDropdown"  style="display:inline-block">
            <button class='dropButton'>Menu</button> 
            <div class="dropdown-content" id = "userDropContent">
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/signOut.php'">Sign Out</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/userListings.php'">Your Listings</p>
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/history.php'">History</p>
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
                <p onclick="window.location.href='http://betaweb.csug.rochester.edu/~tkaizer/compltedTransactionsLogs.php'"></p>
            </div>
        </div>
<form action="searchFunctionality.php" method="post">
	<input id="searchBar" type="text" name="search" placeholder="Listing Value">
        <button class="dropButton" id="searchButton" name="submit-search">Search</button>
</form>
    </div>
<div id="container">
<table>
<tr>
	<th>Student Name</th>
	<th>Item Name</th>
	<th>Requested Declining</th>
</tr>
    <?php
 $conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
                if($conn-> connect_errno){
                    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                }
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM listings INNER JOIN product on listings.ItemID = product.ItemID INNER JOIN user on listings.StudentID = user.StudentID WHERE product.ItemName LIKE '%$search%' OR  product.ItemID LIKE '%$search%' OR  user.StudentName LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['StudentName']}</td><td>{$row['ItemName']}</td><td>{$row['RequestedDeclining']}</td></tr>";
        }
    }
    ?>
</div>
</body>
</html>
