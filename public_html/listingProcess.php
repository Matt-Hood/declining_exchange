

<?php
$conn = new mysqli("127.0.0.1","tkaizer", "dwnvs7Xp", "tkaizer_1");
if($conn-> connect_errno){
        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
session_start();
?>
<?php
        
        $student_id = $_SESSION['student_id'];
        $item_name = $_POST['itemName'];
        $declining = $_POST['requestedDeclining'];
	$item_id = mt_rand(100000000, 999999999);

        $sql = "INSERT INTO listings VALUES ('$student_id','$item_id','$declining', NOW())";
	$sql_second = "INSERT INTO product VALUES ('$item_name', '$item_id')";
	$result_second = $conn->query($sql_second);
        $result = $conn->query($sql);

        if(mysqli_affected_rows($conn) > 0){
                echo '<p>User Added</p>';
                echo '<a href="addListing.php">Go back</a>';
                echo '<br>';
                echo '<a href="listings.php">Check the updated listing table</a>';
		echo '<br>';
		echo '<a href = "product.php">Check the updated product table</a>';
		header("Location: http://betaweb.csug.rochester.edu/~tkaizer/userListings.php");
        }
        else{
                echo '<p>Listing not added. There was a problem.</p>';
                echo mysqli_error($conn);
        }
?>
