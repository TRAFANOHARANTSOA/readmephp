<?php session_start();?>
<body>
        <?php include_once ('db_connect.php')?>
        <?php include_once ('variables.php')?>
        <?php include_once ('functions.php')?>
        <?php include_once ('index.php')?>
        <?php include_once ('header.php')?>
        <?php   
       $connexionSucceed = 'Vous etes connectez';
        if(isset($_SESSION['LOGGED_USER'])){
            $sqlQuery = ' SELECT recipe_id, title, recipe, author FROM recipes WHERE author = :author AND is_enabled = :is_enabled';
            $recipesStatement = $mysqlConnection->prepare($sqlQuery);
            $recipesStatement->execute([
                    'author' => $_SESSION['LOGGED_USER'],
                    'is_enabled' => 1,
            ]);
            $recipes = $recipesStatement->fetchAll();
        }else{
            header('Location: login.php');
        }
        ?>    
        <div class="d-flex justify-content-around">
                <?php foreach(displayAuthor($recipes,$users) as $recipe) : ?>
                <div class=" col-lg-2 projectcards bg-light">
                        <div class="card-body cardbody  ">                  
                            <article>
                                <h2> <?php echo $recipe[0]; ?></h2>
                                <p>Auteur : <?php echo $recipe[1]; ?></p>
                                <p>Rôle : <?php echo $recipe[2]; ?></p>
                                <p>Mail : <?php echo $recipe[3]; ?></p>
                                <a href ="update.php?id=<?= $recipe[5] ?>" class="btn btn-primary ">Modifier</a> 
                                <a href ="delete.php?id=<?= $recipe[5] ?>" class="btn btn-primary ">Supprimer</a> 
                            </article>
                        </div>
                </div>          
                <?php endforeach ?>
        </div>
        <form action="addrecipe.php" class="d-flex justify-content-around " >
        <a href="addrecipe.php" class="btn btn-primary ">Ajouter une recette</a>    
        <a href="home.php" class="btn btn-primary ">Toutes les recettes</a>
        </form>
        <?php include_once ('footer.php')?>
     
    
        