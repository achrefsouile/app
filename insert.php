<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "user", "abc", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$query="select * from persons"; // Fetch all the records from the table address
$result=mysqli_query($link, $query);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>EMail</th>

</tr>";

 while($row=mysqli_fetch_array($result)) 
{
echo "<tr>";
echo "<td>" . $row["first_name"] . "</td>";
echo "<td>" . $row["last_name"] . "</td>";
echo "<td>" . $row["email"] . "</td>";
echo "</tr>";
}
echo "</table>";

// Close connection
mysqli_close($link);
?>
