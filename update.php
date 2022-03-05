<?php include_once ('db_connect.php')?>
        <?php include_once ('variables.php')?>
        <?php include_once ('functions.php')?>
        <?php include_once ('index.php')?>
        <?php include_once ('header.php')?>
        <?php
            if(    isset($_POST) && !empty($_POST)
                && isset($_POST['title']) && !empty($_POST['title'])
                && isset($_POST['recipe']) && !empty($_POST['recipe'])
                && isset($_POST['author']) && !empty($_POST['author'])
                && isset($_POST['is_enabled']) && !empty($_POST['is_enabled'])
                && isset($_POST['recipe_id']) && !empty($_POST['recipe_id'])
                ){
                    // je nettoie les informations reçues de POST
                    $id = strip_tags($_POST['recipe_id']);
                    $title = strip_tags($_POST['title']);
                    $recipe = strip_tags($_POST['recipe']);
                    $author = strip_tags($_POST['author']);
                    $isenabled = strip_tags($_POST['is_enabled']);
                                    // Ecriture de la requête
                    $sqlQuery = 'UPDATE `recipes` SET `title`= :title, `recipe`= :recipe, `author`= :author, `is_enabled`= :is_enabled WHERE `recipe_id` = :recipe_id;';
            
                    // Préparation
                    $insertRecipe = $mysqlConnection->prepare($sqlQuery);

                    // On va utiliser bindValue pour associer les valeurs aux champs
                    $insertRecipe->bindValue(':title',$title , PDO::PARAM_STR);
                    $insertRecipe->bindValue(':recipe',$recipe , PDO::PARAM_STR);
                    $insertRecipe->bindValue(':author',$author , PDO::PARAM_STR);
                    $insertRecipe->bindValue(':is_enabled', $isenabled , PDO::PARAM_INT);
                    $insertRecipe->bindValue(':recipe_id',$id, PDO::PARAM_INT);
                    // Exécution ! La recette est maintenant en base de données
                    $insertRecipe->execute();

                    }
        ?>
        <?php   
        if(isset($_GET['id']) && !empty($_GET['id'])){
       $connexionSucceed = 'Vous etes connectez';
        // Si tout va bien, on peut continuer

        // On récupère tout le contenu de la table recipes
        $sqlQuery =  "SELECT * FROM `recipes` WHERE `recipe_id` = ?";
        $recipesStatement = $mysqlConnection->prepare($sqlQuery);
        $recipesStatement->execute([$_GET['id']]);
        $recipes = $recipesStatement->fetchAll();      
        require_once("db-disconnect.php");
        }
        ?> 

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name = 'recipe_id' value="<?= $recipes[0]['recipe_id'] ?>" >
    <div>
        <label for="text" class="form-label">Titre de la recette</label>
        <input type="text" name="title" value="<?php echo $recipes[0]['title'] ?>" class="form-control">
    </div>
    <div>
        <label for="text" class="form-label">Recette</label>
         <input type="text" value="<?php echo $recipes[0]['recipe'] ?>"  name="recipe" class="form-control"></input>
    </div>
    <div>
        <label for="text" class="form-label">Votre mail</label>
        <input type="text" name="author" value="<?php echo $recipes[0]['author'] ?>" class="form-control">
    </div>
    <div>
    <label for="text" class="form-label">Visibilité</label>
    <select class="form-select form-control" aria-label="Default select example" name='is_enabled'>
        <option value="1">Afficher la recette</option>
        <option value="0">Cacher la recette</option>
    </select>
    <button type="submit" class="btn btn-primary ">Envoyer</button>
    <a href ="myrecipes.php" class="btn btn-primary ">Mes recettes</a>
</form>

        <?php include_once ('footer.php')?>