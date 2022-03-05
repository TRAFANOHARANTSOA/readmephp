<?php 

// $recipe = [
//     'title' => 'Escalope milanaise',
//     'recipe' => '',
//     'author' => 'john.doe@exemple.com',
//     'is_enabled' => true,
// ];

// $recipes = [
//     [
//         'title' => 'Cassoulet',
//         'recipe' => 'Etape 1 : des flageolets !',
//         'author' => 'John.nom@exemple.com',
//         'is_enabled' => false,
//     ],
//     [
//         'title' => 'Couscous',
//         'recipe' => 'Etape 1 : de la semoule',
//         'author' => 'Jack.nom@exemple.com',
//         'is_enabled' => true,
//     ],
//     [
//         'title' => 'Escalope milanaise',
//         'recipe' => 'Etape 1 : prenez une belle escalope',
//         'author' => 'Jim.nom@exemple.com',
//         'is_enabled' => true,
//     ],
// ];

$users = [
    [
        'name' => 'John DOE',
        'email'=> 'John.nom@exemple.com',
        'role' => 'administrateur',
        'password' => 'johndoe',
    
    ],
    [
        'name' => 'Jack DOE',
        'email'=> 'Jack.nom@exemple.com',
        'role' => 'administrateur',
        'password' =>'jackdoe',
    
    ],
    [
        'name' => 'Jim DOE',
        'email'=> 'Jim.nom@exemple.com',
        'role' => 'administrateur',
        'password' =>'jimdoe',
    
    ],
    ];

    $errorConnexion = '';
    $connexionSucceed= '';
    $errorId= '';
    $loggedUser = [ ];
    $recipes=[];
