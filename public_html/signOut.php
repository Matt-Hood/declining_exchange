<?php
	session_start();
?>
<html>
<head>
</head>
<body>
<?php
	$_SESSION = array();
	session_destroy();
	header("Location: http://betaweb.csug.rochester.edu/~tkaizer/welcome.html");
?>
</body>
</html>
