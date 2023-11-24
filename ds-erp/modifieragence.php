<?php
// Database connection
$servername = "project.csmwwgagsvxt.us-east-1.rds.amazonaws.com";
$username = "main";
$password = "malek20736798";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Modify agence table
if (isset($_POST['submit'])) {
  $codag = $_POST['codag'];
  $libelle = $_POST['libelle'];
  $adresse = $_POST['adresse'];

  $sql = "UPDATE agence SET Libelle_AG='$libelle', ADRS_AG='$adresse' WHERE CODAG='$codag'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Get agence table data
$sql = "SELECT * FROM agence";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Modify Agence Table</title>
  <style>
/* Center table */
table {
  margin: auto;
  width: 50%;
  margin-top: 6%;
  border-collapse: collapse;
}
table th, table td {
  padding: 8px;
  text-align: left;
}
table th {
  background-color: #eee;
}
table tr:nth-child(even) {
  background-color: #f2f2f2;
}
table tr:hover {
  background-color: #ddd;
}

/* Form */
.form {
  margin-top: 6%;
  text-align: center;
}
.form label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}
.form input[type=text] {
  padding: 8px;
  margin-bottom: 15px;
  border-radius: 4px;
  box-sizing: border-box;
  width: 40%;
}
.form input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 20px;
}
.form input[type=submit]:hover {
  background-color: #45a049;
}
h2 {
    text-align: center;
}
.menu {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  background-color: #2d3436;
  color: #fff;
  padding: 10px;
}

.menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.menu li {
  margin-bottom: 15px;
}

.menu a {
  display: block;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.2s ease-in-out;
}

.menu a:hover {
  background-color: #1e272e;
}
  </style>
</head>
<body>
<div class="menu">
		<ul>
            <li><a href="dash.php">Dashboard</a></li>
            <li><a href="affiche.php">afficher les clients</a></li>
            <li><a href="ajouter.php">Ajouter un client</a></li>
            <li><a href="modifier.php">Modifier un client</a></li>
            <li><a href="ajoutercpt.php">Ajouter un compte</a></li>
            <li><a href="delete.php">Supprimer un compte</a></li>
            <li><a href="affichemouv.php">Affiche Agence</a></li>
            <li><a href="modifieragence.php">Modifier Agence</a></li>
            <li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
  <h2>Modify Agence Table</h2>
  <table border="1">
    <tr>
      <th>CODAG</th>
      <th>Libelle_AG</th>
      <th>ADRS_AG</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row["CODAG"]; ?></td>
          <td><?php echo $row["Libelle_AG"]; ?></td>
          <td><?php echo $row["ADRS_AG"]; ?></td>
        </tr>
        <?php
      }
    } else {
      echo "0 results";
    }
    ?>
  </table>

  <h2>Update Agence Table</h2>
  <form class="form" method="POST">
    <label for="codag">CODAG:</label>
    <input type="text" name="codag" required>
    <br>
    <label for="libelle">Libelle_AG:</label>
    <input type="text" name="libelle" required>
    <br>
    <label for="adresse">ADRS_AG:</label>
    <input type="text" name="adresse" required>
    <br>
    <input type="submit" name="submit" value="Update">
  </form>
</body>
</html>

<?php
$conn->close();
?>
