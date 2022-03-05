<?php include_once ('db_connect.php')?>
        <?php include_once ('variables.php')?>
        <?php include_once ('functions.php')?>
        <?php include_once ('index.php')?>
        <?php include_once ('header.php')?>
       
       <?php  
        if(isset($_GET['id']) && !empty($_GET['id'])){
       $connexionSucceed = 'Vous etes connectez';
        // Si tout va bien, on peut continuer

        // On récupère tout le contenu de la table recipes
        $sqlQuery =  "DELETE FROM `recipes` WHERE `recipe_id` = ?";
        $recipesStatement = $mysqlConnection->prepare($sqlQuery);
        $recipesStatement->execute([$_GET['id']]);  
        require_once("db-disconnect.php");
        header('Location: myrecipes.php');
        }
        ?> 