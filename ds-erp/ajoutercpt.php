<?php
$serveur = "project.csmwwgagsvxt.us-east-1.rds.amazonaws.com";
$base ="project";
$utilisateur="main";
$motdepasse="malek20736798";

// Connexion à la base de données
$connexion = new PDO("mysql:host=$serveur;dbname=$base;charset=utf8", $utilisateur, $motdepasse);
$sql = "SELECT CODCLT FROM client";
$result = $connexion->query($sql);

$sql1 = "SELECT CODAG FROM agence";
$result1 = $connexion->query($sql1);

$sql2 = "SELECT NUMCPTE FROM compte ORDER BY NUMCPTE DESC LIMIT 1";
$result2 = $connexion->query($sql2);
$lastNumCpte = $result2->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
		function generateRandom() {
  var randomNum = Math.floor(Math.random() * 100000000000);
  var numCpte = document.getElementById("NUMCPTE");
  numCpte.value = "TN 59 10 006 " + randomNum + " 31";
}
	</script>
    <meta charset="UTF-8">
    <title>Ajouter un compte</title>
    <style>
		form {
			margin: 0px auto;
			width: 50%;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}
        label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: bold;
		}
		input[type="text"],
		input[type="number"] {
			padding: 10px;
			margin: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 60%;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
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

select{
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 40%;
    font-size: 16px;
    background-color: #fff;
    cursor: pointer;
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
    <h1 style="text-align: center" >Ajouter un compte</h1>
    <form method="post">
    <label for="NUMCPTE">NUMCPTE :</label>
    <input type="text" id="NUMCPTE" name="NUMCPTE" value="TN 59 10 006 6428856484 31" readonly>
    <button onclick="generateRandom()">+</button>
        <br>
        <label for="Libelle_CPTE">Libellé :</label>
        <input type="text" id="Libelle_CPTE" name="Libelle_CPTE" required>
        <br>
        <label for="TOT_Debit">Total débit :</label>
        <input type="number" id="TOT_Debit" name="TOT_Debit" required>
        <br>
        <label for="TOT_Credit">Total crédit :</label>
        <input type="number" id="TOT_Credit" name="TOT_Credit" required>
        <br>
        <label for="Solde">Solde :</label>
        <input type="number" id="Solde" name="Solde" required>
        <br>
        <label for="CODAG">Code agence :</label>
        <?php
        // Generate HTML code for select element
        echo '<select id="CODAG" name="CODAG">';
        while($row = $result1->fetch()) {
        echo '<option>' . $row["CODAG"] . '</option>';
        }
        echo '</select>';
        ?>
        <br>
        <label for="CODCLT">Code client :</label>
        <?php
        // Generate HTML code for select element
        echo '<select id="CODCLT" name="CODCLT">';
        while($row = $result->fetch()) {
        echo '<option>' . $row["CODCLT"] . '</option>';
    }
    echo '</select>';
    ?>
    <br>
    <input type="submit" value="Ajouter">
    </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Récupération des données du formulaire
                $NUMCPTE =  $_POST['NUMCPTE'];
                $Libelle_CPTE = $_POST['Libelle_CPTE'];
                $TOT_Debit = $_POST['TOT_Debit'];
                $TOT_Credit = $_POST['TOT_Credit'];
                $Solde = $_POST['Solde'];
                $CODAG = $_POST['CODAG'];
                $CODCLT = $_POST['CODCLT'];
                // Insertion des données dans la base de données
                $requete = $connexion->prepare("INSERT INTO compte (NUMCPTE, Libelle_CPTE, TOT_Debit, TOT_Credit, Solde, CODAG, CODCLT) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $requete->execute([$NUMCPTE, $Libelle_CPTE, $TOT_Debit, $TOT_Credit, $Solde, $CODAG, $CODCLT]);
                $lastNumCpte = $NUMCPTE;
            }
        ?>
    </body>
    </html>