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

$sql0 = "SELECT * FROM compte";
$result0 = $conn->query($sql0);
?>
<html>
<head>
	<title>Modifier dans la table</title>
	<style>
		form {
  margin: 50px auto;
  width: 50%;
  text-align: center;
  background-color: #f2f2f2;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

input[type="text"],
input[type="number"] {
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  border: none;
  width: 100%;
  font-size: 16px;
  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: all 0.2s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

h1 {
  text-align: center;
  font-size: 32px;
  margin-bottom: 30px;
}

label {
  display: block;
  text-align: left;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
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
h1 {
	text-align: center;
}
select {
    width: 80%;
    height: 4%;
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
            <li><a href="affichercpt.php">Afficher un compte</a></li>
            <li><a href="ajoutercpt.php">Ajouter un compte</a></li>
            <li><a href="modifiercpt.php">Modifier un compte</a></li>
            <li><a href="delete.php">Supprimer un compte</a></li>
            <li><a href="affichemouv.php">Affiche Agence</a></li>
			<li><a href="modifieragence.php">Modifier Agence</a></li>
            <li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
    <h1>Modifier un compte </h1>
    <form method="post" action="modifiercpt.php">
        <label for="NUMCPTE">NUMCPTE :</label>
        <?php
        // Generate HTML code for select element
        echo '<select id="NUMCPTE" name="NUMCPTE">';
        while($row = $result0->fetch_assoc()) {
            echo '<option>' . $row["NUMCPTE"] . '</option>';
        }
        echo '</select>';
        ?>
        <br>
        <label for="Libelle_CPTE">Libelle_CPTE :</label>
        <input type="text" id="Libelle_CPTE" name="Libelle_CPTE" required>
        <br>
        <label for="TOT_Debit">TOT_Debit :</label>
        <input type="number" id="TOT_Debit" name="TOT_Debit" required>
        <label for="TOT_Credit">TOT_Credit :</label>
        <input type="number" id="TOT_Credit" name="TOT_Credit" required>
        <label for="Solde">Solde :</label>
        <input type="number" id="Solde" name="Solde" required>
        <input type="submit" name="submit" value="Modifier">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $NUMCPTE = $_POST["NUMCPTE"];
        $TOT_Debit = $_POST["TOT_Debit"];
        $TOT_Credit = $_POST["TOT_Credit"];
        $Solde = $_POST["Solde"];
        $Libelle_CPTE = $_POST["Libelle_CPTE"];
        
        $sql = "UPDATE compte SET Libelle_CPTE='$Libelle_CPTE', TOT_Debit='$TOT_Debit', TOT_Credit='$TOT_Credit', Solde='$Solde' WHERE NUMCPTE='$NUMCPTE'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Modification effectuée avec succès.";
        } else {
            echo "Erreur lors de la modification: " . $conn->error;
        }
    }
    ?>
</body>
</html>
