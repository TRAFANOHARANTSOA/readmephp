<?php

// function isValidRecipe(array $recipe) : bool // cette fonction est caduque car nous avons maintenant le tableau des recettes valides par requête SQL
// {
//     if (array_key_exists('is_enabled', $recipe)) {
//         $isEnabled = $recipe['is_enabled'];
//     } else {
//         $isEnabled = false;
//     }

//     return $isEnabled;
// }


// // liste des recettes valides par utilisation de fonctions

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        // if (isValidRecipe($recipe)) plus besoin de cette condition maintenant qu'on a le tableau des recettes valides par requête SQL
        // { 
            $validRecipes[] = $recipe;
        // }
    }

    return $validRecipes;
}


function displayAuthor(array $recipes, array $users) : array
{   $displayAuthorInfo = [];
    
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        foreach(getRecipes($recipes) as $recipe){
            if ($recipe['author'] === $author['email']) {
                $displayAuthorInfo[] = [$recipe['title'], $author['name'], $author['role'], $author['email'], $author['password'], $recipe['recipe_id']];
            } 
        } 
    } return $displayAuthorInfo;  
}


