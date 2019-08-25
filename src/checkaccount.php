<html>
<body>

<?php

$username = $_POST["username"];
$password = $_POST["password"];

$dbserver = "localhost";
$dbusername = "test";
$dbpassword = "p@ssw0rd";
$db = "test";

$conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// print account details
$sql = "SELECT * FROM users_data WHERE username = '" . $username . "' AND password = '" . $password . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	// print heading
	echo "<H1>Your Account</H1>";
	echo "<p>Welcome, your account details are:</p>";

	while($row = $result->fetch_assoc()) {
        echo " <p>Name: " . $row["lastname"]. ", " . $row["firstname"]. " <BR>Address: " . $row["address"]. "<br>Phone number: " . $row["phone"] . "</p>";
    }
}
else
{
echo "<p><b>Login failed</b></p>";
}

$conn->close();


//echo "<p><BR><font color=\"red\">" . $sql . "</font></p>";


//https://www.w3schools.com/php/php_mysql_select.asp

?>

</body>
</html>
