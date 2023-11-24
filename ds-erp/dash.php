<html>
<head>
	<title>Dashboard</title>
	<style type="text/css">      
		.container {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			margin: 50px auto;
			width: 80%;
			font-family: Arial, sans-serif;
            justify-content: center;
            align-items: center;
		}
		.card {
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 30px;
			border-radius: 20px;
			box-shadow: 5px 2px 4px rgba(0,0,0,0.2);
			background-color: #d1cece ;
			width: 40%;
            border-top: 20px;
		}
		.card h2 {
			font-size: 24px;
			margin-bottom: 10px;
		}
		.card p {
			font-size: 18px;
			margin-bottom: 5px;
		}
		.card span {
			font-weight: bold;
			font-size: 28px;
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
    .h1{
        margin-left: 43%;
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
	<?php
		$serveur = "project.csmwwgagsvxt.us-east-1.rds.amazonaws.com";
		$base ="project";
		$utilisateur="main";
		$motdepasse="malek20736798";

		// Connexion à la base de données
		$connexion = new PDO("mysql:host=$serveur;dbname=$base;charset=utf8", $utilisateur, $motdepasse);

		// Récupération du nombre de clients
		$requete_clients = $connexion->prepare("SELECT COUNT(*) FROM client");
		$requete_clients->execute();
		$nombre_clients = $requete_clients->fetchColumn();

        // Récupération du nombre de comptes
        $requete_compte = $connexion->prepare("SELECT COUNT(*) FROM compte");
		$requete_compte->execute();
		$nombre_compte = $requete_compte->fetchColumn();

		// Récupération du solde total
		$requete_solde = $connexion->prepare("SELECT SUM(Solde) FROM compte");
		$requete_solde->execute();
		$solde_total = $requete_solde->fetchColumn();

        // Récupération du debit total
		$requete_debit = $connexion->prepare("SELECT SUM(TOT_Debit) FROM compte");
		$requete_debit->execute();
		$debit_total = $requete_debit->fetchColumn();

        // Récupération du credit total
		$requete_credit = $connexion->prepare("SELECT SUM(TOT_Credit) FROM compte");
		$requete_credit->execute();
		$credit_total = $requete_credit->fetchColumn();
	?>
    <h1>Statistic de Bank</h1>
	<div class="container">
		<div class="card">
			<h2>Nombre de clients</h2>
			<span><?php echo $nombre_clients; ?></span>
		</div>
        <div class="card">
			<h2>Nombre de comptes</h2>
			<span><?php echo $nombre_compte; ?></span>
		</div>
        <div class="card">
			<h2>Débit total</h2>
			<p>(en TND)</p>
			<span><?php echo $debit_total; ?></span>
		</div>
        <div class="card">
			<h2>Crédit total</h2>
			<p>(en TND)</p>
			<span><?php echo $credit_total; ?></span>
		</div>
		<div class="card">
			<h2>Solde total</h2>
			<p>(en TND)</p>
			<span><?php echo $solde_total; ?></span>
		</div>
	</div>
</body>
</html>
