<!DOCTYPE html>
<html lang="en">
<head>

<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
  }
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Ace Healthcare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="inventory.php">Inventory <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="register.html">Register</a>
            <a class="nav-item nav-link disabled" href="#">Profile</a>
          </div>
        </div>
      </nav>

      <!-- Form -->
    <div class="container">
        <h1>IT Equipment Inventory System</h1>
        <form action="insert.php" method="POST">
            <label for="equipment-name">Equipment Name:</label>
            <input type="text" id="equipment_name" name="equipment_name" required>
        
            <label for="serial-number">Serial Number:</label>
            <input type="text" id="serial_number" name="serial_number" required>
        
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required>
        
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
        
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
        
            <button type="submit">Add Equipment</button><br><br>
            <button type="reset" id="clear-button">Clear</button>
        </form>
</body>
</html>