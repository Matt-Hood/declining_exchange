

<?php
$conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
if($conn-> connect_errno){
        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
session_start();
?>
<?php
	
        $item_id = $_POST['itemID'];
        $sql = "Delete from `listings` where ItemID = $item_id";
        $sql_second = "Delete from `product` where ItemID = $item_id";
	$sql_check = "Select `StudentID` from `listings` where ItemID = $item_id";
	$result_check=$conn->query($sql_check);
	$row =  mysqli_fetch_assoc($result_check);
	if(implode(", ",$row) == (string)$_SESSION["student_id"]){
       		$result_second = $conn->query($sql_second);
        	$result = $conn->query($sql);

        	if(mysqli_affected_rows($conn) > 0){
                	echo '<p>Item Removed</p>';
                	echo '<a href="userListings.php">Go back</a>';
               		echo '<br>';
                	echo '<a href="listings.php">Check the updated listing table</a>';
                	echo '<br>';
                	echo '<a href = "product.php">Check the updated product table</a>';
                	header("Location: http://betaweb.csug.rochester.edu/~tkaizer/userListings.php");
        	}
        	else{
                	echo '<p>Item not removed. There was a problem.</p>';
                	echo mysqli_error($conn);
			//header("Location: http://betaweb.csug.rochester.edu/~tkaizer/removeListing.php/?failed=true");
        	}
	}
	else{
		header("Location: http://betaweb.csug.rochester.edu/~tkaizer/removeListing.php?failed=true");
	}
?>
