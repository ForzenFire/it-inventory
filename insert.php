<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipment_name = trim($_POST['equipment_name']);
    $serial_number = trim($_POST['serial_number']);
    $model = trim($_POST['model']);
    $department = trim($_POST['department']);
    $location = trim($_POST['location']);

    $stmt = $conn->prepare("INSERT INTO inventory (equipment_name, serial_number, model, department, location) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $equipment_name, $serial_number, $model, $department, $location);

    if($stmt->execute()) {
        echo "<script> 
        alert('Equipment added successfully! ');
        window.location.href = 'home.php';
        </script>";
    } else {
        echo "<script>
        alert ('Error: Could not add quipment!');
        window.location.href = 'home.php';
        </script>";
    }
}
?>
