<?php
// Inclusion de la connexion avec la base
include "connexion.php";

// Lire les données des étudiantes depuis la base de données
$stmt = $db->prepare("SELECT * FROM `client` ;");
$stmt->execute([]);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Liste des client</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">

		* {
			box-sizing: border-box;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		body {
			background-color: #f1f1f1;
		}

		.menu {
			background-color: #2d3436;
			color: #fff;
			position: fixed;
			height: 100%;
			top: 0;
			left: 0;
			width: 200px;
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
			font-weight: bold;
			font-size: 18px;
			padding: 10px 20px;
			border-radius: 5px;
			transition: background-color 0.2s ease-in-out;
			text-decoration: none;
		}

		.menu a:hover {
			background-color: #1e272e;
		}

		.content {
			margin-left: 200px;
			padding: 1px 16px;
			min-height: 100vh;
		}

		h1 {
			margin-top: 20px;
			margin-bottom: 10px;
			font-size: 32px;
			text-align: center;
		}
		h2 {
		    margin-top: 20px;
			margin-bottom: 10px;
			font-size: 25px;
		    text-align: right;
		}

		table {
			margin: 50px auto;
			width: 60%;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
		}

		th, td {
			height: 50px;
			border: 1px solid black;
			padding: 10px;
		}

		th {
			background-color: #ddd;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		@media screen and (max-width: 600px) {
			.menu {
				width: 100%;
			}

			.content {
				margin-left: 0;
			}
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
<br>
<h2>Welcome admin</h2>
<h1 >Liste des client</h1>
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