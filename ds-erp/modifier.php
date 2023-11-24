<?php
//inclusion de la connexion avec la base
include "connexion.php";
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
	<h1>Modifier un client </h1>
	<form method="post" action="modifier.php">
		<label for="CODCLT">CODCLT :</label>
		<input type="number" id="CODCLT" name="CODCLT" required>
		<br>
		<label for="Nom_CLT">Nom_CLT :</label>
		<input type="text" id="Nom_CLT" name="Nom_CLT" required>
		<br>
		<label for="ADRS_CLT">ADRS_CLT :</label>
		<input type="text" id="ADRS_CLT" name="ADRS_CLT" required>
		<input type="submit" value="Modifier">
	</form>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $CODCLT = $_POST["CODCLT"];
    $Nom_CLT = $_POST["Nom_CLT"];
    $ADRS_CLT = $_POST["ADRS_CLT"];

    //insertion dans la base de données
    $stmt = $db->prepare("UPDATE `client` SET `Nom_CLT`=?,`ADRS_CLT`=? WHERE `CODCLT`=?;");
    $stmt->execute([$Nom_CLT,$ADRS_CLT,$CODCLT]);
}
?>

</html>
