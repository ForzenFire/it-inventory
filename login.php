<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php"); 
            exit();
        } else {
            echo "<script>
            alert('Invalid Email or Password');
            window.location.href = 'index.html';
            </script>";
        }
    } else {
        echo "<script>
        alert('User not found!');
        window.location.href = 'index.html';
        </script>";
    }
}
?>
