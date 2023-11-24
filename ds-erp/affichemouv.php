<html>
<head>
	<title>Mouvements</title>
	<style>
 body {
    font-family: Arial, sans-serif;
    text-align: center;
  }

  h1 {
    font-size: 36px;
    margin-top: 50px;
    margin-bottom: 20px;
  }

  table {
    border-collapse: collapse;
    margin: 0 auto;
    margin-top: 50px;
    width: 60%;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }

  th, td {
    padding: 12px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-transform: uppercase;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
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
	<h1>Liste Les Agence</h1>
	<table>
  <thead>
        <tr>
        <th>CODAG</th>
        <th>Libelle_AG</th>
        <th>ADRS_AG</th>
        </tr>
    </thead>
  <tbody>
		<?php
			$servername = "project.csmwwgagsvxt.us-east-1.rds.amazonaws.com";
			$username = "main";
			$password = "malek20736798";
			$dbname = "project";
			
			// Connect to the database
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
      
            // Select data from the table
            $sql = "SELECT * FROM agence";
            $result = mysqli_query($conn, $sql);
      
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>".$row['CODAG']."</td>";
              echo "<td>".$row['Libelle_AG']."</td>";
              echo "<td>".$row['ADRS_AG']."</td>";
              echo "</tr>";
            }
      
            mysqli_close($conn);
          ?>
        </tbody>
	</table>
</body>
</html>
