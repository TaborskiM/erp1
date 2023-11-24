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
?>
