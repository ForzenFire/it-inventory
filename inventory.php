<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="inventory.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <a class="nav-item nav-link active" href="inventory.php">Inventory</a>
            <a class="nav-item nav-link" href="register.html">Register</a>
            <a class="nav-item nav-link disabled" href="#">Profile</a>
          </div>
        </div>
      </nav>

      <!-- Tabel -->
<div class="container mt-3">
  <h2>Inventory Items</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Equipment Name</th>
        <th>Serial Number</th>
        <th>Model</th>
        <th>Department</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include('db.php');

      $query = "SELECT equipment_name, serial_number, model, department, location FROM inventory";
      $result = $conn->query($query);


      if($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()){
          echo "<tr>
                  <td>".htmlspecialchars($row['equipment_name'])."</td>
                  <td>".htmlspecialchars($row['serial_number'])."</td>
                  <td>".htmlspecialchars($row['model'])."</td>
                  <td>".htmlspecialchars($row['department'])."</td>
                  <td>".htmlspecialchars($row['location'])."</td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
