<?php
include('db.php');

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error retrieving users: " . mysqli_error($conn));
}

echo "Users in database:<br>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . ", Email: " . $row['email'] . "<br>";
}
?>