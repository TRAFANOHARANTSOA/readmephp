<?php session_start();?>
<?php include_once ('db_connect.php')?>
<?php include_once ('variables.php')?>
<?php include_once ('functions.php')?>
<?php include_once ('index.php')?>
<?php include_once ('header.php')?>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="text" class="form-label">Titre de la recette</label>
        <input type="text" name="title" value='Ecrivez le titre de votre recette' class="form-control">
    </div>
    <div>
        <label for="text" class="form-label">Recette</label>
         <textarea placeholder="Exprimez votre recette içi" name="recipe" class="form-control"></textarea>
    </div>
    <div>
        <label for="text" class="form-label">Votre mail</label>
        <input type="text" name="author" value='Tapez votre mail içi' class="form-control">
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


<?php
if(             isset($_POST) && !empty($_POST)
                && isset($_POST['title']) && !empty($_POST['title'])
                && isset($_POST['recipe']) && !empty($_POST['recipe'])
                && isset($_POST['author']) && !empty($_POST['author'])
                && isset($_POST['is_enabled']) && !empty($_POST['is_enabled'])
                ){
                                    // Ecriture de la requête
                    $sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';
            
                    // Préparation
                    $insertRecipe = $mysqlConnection->prepare($sqlQuery);
            
                    // Exécution ! La recette est maintenant en base de données
                    $insertRecipe->execute([
                        'title' => $_POST['title'],
                        'recipe' => $_POST['recipe'],
                        'author' => $_POST['author'],
                        'is_enabled' => $_POST['is_enabled'], // 1 = true, 0 = false
                    ]);
                    require_once("db-disconnect.php");

                    }

?>


<?php include ('footer.php')?>