<?php
 $serveur = "project.csmwwgagsvxt.us-east-1.rds.amazonaws.com";
 $base ="project";
 $utilisateur="main";
 $motdepasse="malek20736798";
 try{
       //création d'une instance de PDO
       $db = new PDO("mysql:host=$serveur;dbname=$base",$utilisateur,$motdepasse);
       $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $ex){
       echo "Echec de connexion :".$ex->getMessage();
 }
 $stmt = $db->prepare("SELECT * FROM `client` ;");
$stmt->execute([]);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
?>
<html>
<head>
    <title>Ajouter dans la table</title>
    <style>
        
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
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
  font-size: 36px;
  margin-bottom: 50px;
}

form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 50px auto;
  width: 100%;
  max-width: 600px;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

label {
  font-size: 20px;
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
  font-size: 18px;
  margin-top: 20px;
}

table {
    margin-top: 150px;
    margin-left: auto;
    margin-right: auto;
    width: 60%;
    border-collapse: collapse;
}

th {
    height: 50px;
    border: 1px solid black;
    padding: 10px;
    background-color: #ddd;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}

td {
    height: 50px;
    border: 1px solid black;
    padding: 10px;
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
    <h1 style="text-align: center" >Ajouter un client</h1>
    <form method="POST" action="ajouter.php">
        <label for="CODCLT">CODCLT :</label>
        <input type="number" id="CODCLT" name="CODCLT" required>
        <br>
        <label for="Nom_CLT">Nom_CLT :</label>
        <input type="text" id="Nom_CLT" name="Nom_CLT" required>
        <br>
        <label for="ADRS_CLT">ADRS_CLT :</label>
        <input type="text" id="ADRS_CLT" name="ADRS_CLT" required>
        <br>
        <input type="submit" value="Ajouter">
    </form>
    <?php
        //check if form has been submitted
        if(isset($_POST["CODCLT"], $_POST["Nom_CLT"], $_POST["ADRS_CLT"])){
			$CODCLT = $_POST["CODCLT"];
			$Nom_CLT = $_POST["Nom_CLT"];
			$ADRS_CLT = $_POST["ADRS_CLT"];
			try{
			//prepare the insert query
			$query = "INSERT INTO client (CODCLT, Nom_CLT, ADRS_CLT) VALUES (:CODCLT, :Nom_CLT, :ADRS_CLT)";
			$statement = $db->prepare($query);
			//bind the values
			$statement->bindParam(":CODCLT", $CODCLT);
			$statement->bindParam(":Nom_CLT", $Nom_CLT);
			$statement->bindParam(":ADRS_CLT", $ADRS_CLT);
			//execute the query
			$statement->execute();
			echo "<p style='text-align:center'>Client ajouté avec succès !</p>";
			}catch(PDOException $ex){
			echo "Erreur : ".$ex->getMessage();
		}
		}
	?>
	<table border="1" class='table'>
    <tr>
        <th>CODCLT</th>
        <th>Nom_CLT</th>
        <th>ADRS_CLT</th>
    </tr>
    <?php foreach($clients as $client){?>
        <tr>
            <td><?php echo $client["CODCLT"]; ?></td>
            <td><?php echo $client["Nom_CLT"]; ?></td>
            <td><?php echo $client["ADRS_CLT"]; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
