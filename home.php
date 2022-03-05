<?php session_start();?>
<body>
        <?php include_once ('db_connect.php')?>
        <?php include_once ('variables.php')?>
        <?php include_once ('functions.php')?>
        <?php include_once ('index.php')?>
        <?php include_once ('header.php')?>
        <?php   
       $connexionSucceed = 'Vous etes connectez';
        // On récupère tout le contenu de la table recipes
        // $sqlQuery = ' SELECT title, recipe, author FROM recipes WHERE is_enabled = TRUE;';
        $sqlQuery = ' SELECT recipe_id, title, recipe, author FROM recipes';
        $recipesStatement = $mysqlConnection->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();      
        ?> 
        <div class="row justify-content-center">
                <?php foreach(displayAuthor($recipes,$users) as $recipe) : ?>
                        <div class="col-lg-4 bg-light mx-auto" style="width: 18rem;">                  
                            <div class='card-body  cardbody'>
                                <h2> <?php echo $recipe[0]; ?></h2>
                                <p>Auteur : <?php echo $recipe[1]; ?></p>
                                <p>Rôle : <?php echo $recipe[2]; ?></p>
                                <p>Mail : <?php echo $recipe[3]; ?></p>
                                <a href='edit.php' class="btn btn-primary ">Lire la recette</a>
                                <a href ="delete.php?id=<?php echo $recipe[5] ?>" class="btn btn-primary ">Supprimer</a>
                        </div>
                        </div>
                <?php endforeach ?>
        </div>
        <form action="addrecipe.php" class="d-flex justify-content-center " >
        <div><button type="submit" class="btn btn-primary ">Ajouter une recette</button>
        </div>
        </form>
        <form action="myrecipes.php" class="d-flex justify-content-center " >
        <div><button type="submit" class="btn btn-primary ">Mes recettes</button>
        </div>
        </form>
        <?php include_once ('footer.php')?>
       