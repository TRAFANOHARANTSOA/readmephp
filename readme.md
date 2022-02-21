# PHP 
## Introduction 
C’est un langage serveur (qui ne peut être lu que par une machine ayant les caractéristiques d’un serveur) qui sert à créer des pages web dynamiques. 

Il est donc nécessaire de transformer sa machine personnelle en serveur. Nous utiliserons Appache qui sont est un serveur web statique. Cela signifie qu’il ne gère que du HTML et du CSS. Il faut le combiner avec PHP pour pouvoir rendre notre site web dynamique. PHP reçoit les requêtes de HTML et les transmets au serveur, prépare les pages et génère les pages HTML à afficher par Appache. Il nous faut également associer un système de base de données, MySQL à cet environnement pour stocker et utiliser les données. Le langage qui nous permet de communiquer avec la base de données est SQL.

Bien qu'il soit possible d'installer ces outils séparément, il est plus simple pour nous d'installer un paquetage tout prêt : WAMP, MAMP sous Windows et macOS, ou XAMPP sous Linux.
La virtualisation se fait par installation de ces composants. Windows gère les ressources allouées à chaque composant. 
Il est existe d’autres langages serveurs comme Ruby, Python, Java etc..

PHP embarque un serveur web interne (pas besoins d’Appache) pour les petits travaux en local. Il faut utiliser PHP en ligne de commande pour provoquer l’exécution du script et le rendu de page.

## Utilisations 
La syntaxe pour utiliser du PHP, on utilise la balise ` <?php /* Le code source PHP est ici /*  ?>` . C'est à l'intérieur que l'on mettra du code PHP. Il existe d'autres balises pour utiliser du PHP ; par exemple : ` `<? ?>` , `<% %>` , `<?= ?>`
Cette balise peut être placée n’importe ou dans le code. 
Exemple : 
```
 <!DOCTYPE html>
<html>
    <head>
        <title>Ceci est une page de test <?php /* Code PHP */ ?></title>
        <meta charset="utf-8" />
    </head>
```
## Fonctionnement 
Tout langage de programmation contient une instruction. Elle se terminent toutes par un ` ; `. 
Exemple : 
```
<?php echo "Ceci est du texte"; ?>

<!-- Ou bien, avec des parenthèses -->
<?php echo("Ceci est du texte"); ?>

```
PHP peut afficher des balises à l’intérieur de la sienne. Je prends un exemple, ` <?php echo "Ceci est du <strong>texte</strong>"; ?>` affichera le mot  texte en gras grâce à la balise `<strong>`  Pour afficher des guillemets, il faut le précéder d’un antislash  ` \ `.

Exemple : ` <?php echo "Cette ligne a été écrite \"uniquement\" en PHP."; ?>`

La vocation de PHP n’est pas d’afficher des textes statiques, au contraire, sa puissance réside la récupération dynamique et la réactualisation des données. 

Exemple :  Ce code affiche la date et heure, et s’actualise à chaque rafraichissement de la fenêtre.
```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
    </head>
    <body>
        <h1>Ma page web</h1>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
    </body>
</html>

```

Pour commenter en PHP on utilise : 
-	un double slash ` //` au début pour un commentaire monolignes ;

```
<?php
echo "J'habite en Chine."; `// le commentaire` Cette ligne indique où j'habite
// La ligne suivante indique mon âge
echo "J'ai 92 ans.";
?>
```
-	un slash et une étoile `/* le commentaire */ ` au début et à la fin du commentaire pour un commentaire multilignes.

```
<?php
/* La ligne suivante indique mon âge
Si vous ne me croyez pas...
... vous avez raison ;o) */
echo "J'ai 92 ans.";
?>
```


## Configurer PHP pour afficher les erreurs :
### Localisez votre fichier de configuration PHP du serveur Web. Pour connaître l'ensemble des informations relatives au PHP utilisé par le serveur web, il existe une commande PHP, `phpinfo()`.

Créer une page info.php, et insérez le code `< ?php phpinfo() ; ?>`. Enregistrez le dans la racine de votre serveur ‘www’ (htdocs pour Mamp). Lancez la page dans votre navigateur.

Notez que vous pouvez aussi accéder au phpinfo depuis le menu "Outils/PHPINFO" en bas de la page d'accueil de WAMP.
Retrouvez la ligne "Loaded Configuration File" (ce qui signifie "fichier de configuration chargé", en anglais), et regardez la valeur. C’est le chemin du fichier `C:\wamp64\bin\apache\apache2.4.46\bin\php.ini`. Ce qui signifie que le fichier de configuration de PHP est `php.ini`.

### Modifier le fichier de configuration PHP. 
Allez dans le fichier et chercher par mot clé les valeurs à changer ci-dessous. Assurez-vous de les modifier si ils ne sont pas configurer correctement.
-	la clé de configuration `error_reporting` a la valeur `E_ALL`
-	la clé de configuration  `display_errors` a la valeur `On`
Faite un test, enlevez la parenthèse du code dans `info.php` comme ceci,  `phpinfo( ;`. Lancer la page, une `parse error` devrait s’afficher.

## Déclarer des variables 
Les variables sont des informations qui restent stockées en mémoire le temps du chargement de la page. Quand la page est chargée elles disparaissent de la mémoire. Ce ne sont pas des fichiers stockés.

On donne un **nom** et une **valeur** aux variables. Il faut signaler que **la valeur est modifiable**, on peut faire des opérations dessus, etc.
Exemple :  `<?php  $userAge = 17; ?>`

Notez qu'on ne peut pas mettre d'espace dans un nom de variable. On utilise donc une majuscule pour "détacher" visuellement les mots et les rendre plus lisibles. C'est ce que l'on appelle la convention camelCase (cela fait référence aux bosses d'un chameau).

Là, le serveur a juste créé la variable temporairement en mémoire, mais il n'a rien fait d'autre. Rien ne s'affiche tant que vous n'utilisez pas  `echo`  .

### Découvrez les différents types de variables
Il existe plusieurs **types** de variables. A noter, `NULL`  n’est pas un type mais l’absence de type.

![Capture d’écrans de l’image d’une variable](https://i.ibb.co/TKhGfyG/variables.png)






### Utilisations des types de données : 
1-	Le type `string`  (chaîne de caractères) : Ce type permet de stocker du texte.
Pour cela, vous devez entourer votre texte de :
-	guillemets doubles  ""  ;
-	ou de guillemets simples ' '  (attention, ce sont des apostrophes).
```
<?php
$fullname = "Mon Nom";
$email = 'monemail.contact@exemple.com';
?>
```
	Nb : Attention, petit piège : si vous voulez insérer un guillemet simple alors que le texte est entouré de guillemets simples, il faut l'échapper en insérant un antislash devant. Il en va de même pour les guillemets doubles. 

```
<?php
$variable = "Mon \"nom\" est Nom";
$variable = 'Je m\'appelle Nom';
?>
```

En effet, si vous oubliez de mettre un antislash, PHP va croire que c'est la fin de la chaîne et il ne comprendra pas le texte qui suivra (et vous aurez en fait un message Parse error).
Vous pouvez en revanche insérer sans problème des guillemets simples au milieu de guillemets doubles, et inversement :

```
<?php
$variable = 'Mon "nom" est MonNom`;
$variable = "Je m'appelle MonNom";
?>
```
2-	Le type `Int` (nombre entier) :
Il suffit tout simplement d'écrire le nombre (entiers relatifs compris : -1, -2 , etc) que vous voulez stocker, sans guillemets :
```
<?php
$userAge = 17;
?>
```
3-	Le type `float` (nombre décimal) :
Vous devez écrire votre nombre avec un point au lieu d'une virgule. C'est la notation anglaise.
```
<?php
$price = 57.3;
?>
```
4-	Le type `bool` (booléen) :
Pour dire si une variable vaut vrai ou faux, vous devez écrire le mot true  ou false  sans guillemets autour (ce n'est pas une chaîne de caractères !) :

```
<?php
$isAuthor = true;
$isAdministrator = false;
?>
```
5-	Une variable vide avec `NULL` :
Si vous voulez créer une variable qui ne contient rien, vous devez lui passer le mot-clé NULL  (vous pouvez aussi l'écrire en minuscules :  null  ).

```
<?php
$noValue = NULL;
?>
```
### Afficher le contenu d’une variable :  
Pour afficher une variable, on se sert de l’instruction `echo`.

```
<?php
$fullname = Prénom Nom';
echo $fullname;
```
### Concaténez  le contenu d’une variable :  
Il y a deux méthodes :
-	Avec des guillemets simples : 
```
<?php
$fullname = Prénom Nom';
echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !'; // OK
?>
```


-	Ou avec guillemets doubles : 

```
<?php
$fullname = "Prénom Nom";
echo "Bonjour $fullname et bienvenue sur le site !";
?>
```


## Les conditions en PHP :
C’est ce qui nous permet de créer une application réellement dynamique. Les conditions sont écrites sous différentes formes en PHP, ce qui nous amène aux structures conditionnelles.
 
### Structures conditionnelles : 
La principale à connaître est la structure `if … else..` :

![Capture d’écrans de l’image d’une condition](https://i.ibb.co/wJ5wGTC/Conditions.png)

#### Commençons par les opérateurs de comparaisons : 
![Capture d’écrans de l’image d’une condition](https://i.ibb.co/3Fh2S8H/op-rateurscomparaisons.png)

A la première ligne, le double égal sert à tester l'égalité, à dire « Si c'est égal à… ». Dans les conditions, on utilisera toujours le double égal ( `==`  ). A ne pas confondre avec un simple `=` quand on déclare une variable.

#### Utilisation de la structure `if … else…` : 
Tout de suite un exemple :
```
<?php
$isEnabled = true; // La condition d'accès

if ($isEnabled == true) {
//instruction à exécuter si condition remplie
    echo "Vous êtes autorisé(e) à accéder au site :white_check_mark:";
}else{
//instruction à exécuter si la condition n’est pas remplie
echo "Vous n’êtes pas autorisé(e) à accéder au site :no_entry:";
}
?>
```
Pour élever un peu le niveau : 
```
<?php
$isAllowedToEnter = "Oui";
// SI on a l'autorisation d'entrer
if ($isAllowedToEnter == "Oui") {
    // instructions à exécuter quand on est autorisé à entrer
} // SINON SI on n'a pas l'autorisation d'entrer
elseif ($isAllowedToEnter == "Non") {
    // instructions à exécuter quand on n'est pas autorisé à entrer
} // SINON (la variable ne contient ni Oui ni Non, on ne peut pas agir)
else {
    echo "Euh, je ne comprends pas ton choix, tu peux me le rappeler s'il te plaît ?";
}
?>
```
#### Cas des variables booléens : 
Puisque notre variable sera de type booléen, c-à-d soit `true` soit `false`, il est inutile de tester la condition avec (`== true`) puisque notre variable a déjà une valeur `true`. Illustrons !

Si on reprend l’exemple précédent, on aurait ceci :
```
<?php
$isAllowedToEnter = true;

if ($isAllowedToEnter) {
    echo "Bienvenue petit nouveau. :o)";
}
else {
    echo "T'as pas le droit d'entrer !";
}
?>
```
L’avantage, le code est plus lisible :satisfied:. Le problème c’est de gérer la valeur `false`. Et bien il suffit d`utiliser la syntaxe ` !` devant la variable quand on la passe en condition. Comme ceci :
```
<?php
$isAllowedToEnter = true;
// Si pas autorisé
if (! $isAllowedToEnter) {
}
?>
```
#### Conditions multiples : 
Les mots clés pour poser plusieurs conditions à la fois.

![Capture d’écrans de l’image d’une condition]( https://i.ibb.co/dPcHJVG/Motsclesconditionsmultiples.png)

```
<?php
$isEnabled = true;
$isOwner = false;
$isAdmin = true;

if (($isEnabled && $isOwner) || $isAdmin) {
    echo 'Accès à la recette validé :white_check_mark:';
} else {
    echo 'Accès à la recette interdit ! :no_entry:';
}
```
Si l'utilisateur est actif et qu'il est l'auteur, ou l'utilisateur concerné est un administrateur, il peut accéder à la recette validée. Sinon, il verra s'afficher un message de refus.

BONUS :
Comment afficher le code sans utiliser `echo` :smiley:
```
<?php $chickenRecipesEnabled = true; ?>
<?php if ($chickenRecipesEnabled): ?> <!-- Ne pas oublier le ":" -->
<h1>Liste des recettes à base de poulet</h1>
<?php endif; ?><!-- Ni le ";" après le endif -->
```

#### Utilisation de la condition `switch` :
Un des avantages c’est d’avoir un code lisible avec un seul accolade au début et à la fin de la condition. Il n’y a pas besoin d’écrire `==` pour tester une égalité. La mention `case` suffit. 
**L’inconvénient c’est qu’il est limité au seul test d’égalité**. Les autres opérateurs de comparaisons ne sont pas pris en charges. 
Les deux codes affichent les mêmes résultats. On voit le nombre d’accolades avec `if`. On répète le test plusieurs fois avec `==`. On indique au début la variable à travailler. On utilise des `case` pour l’analyser. Le mot clé `default` est le message qui s’affiche quelque soit la valeur de notre variable.

Voyons tout cela :

![Capture d’écrans de l’image ifvsswitch1]( https://i.ibb.co/7kjdSbC/ifvsswitch1.png)
 
 
![Capture d’écrans de l’image ifvsswitch1]( https://i.ibb.co/g6HBLcT/ifvsswitch2.png)

PHP analyse chaque cas et continue l’opération jusqu’à ce qu’il rencontre la condition et l’instruction `break`. Sans cela, il continuera son analyse et affichera le reste de touts les cas.

#### Utilisation des conditions ternaires.
Cette une structure conditionnelle assez condensée.  Elle test la valeur d’une variable et lui affecte une autre valeur selon que la condition est vraie ou non.

```
< ?php 
$myAge = 24;

// avec if else 
If ($myAge >= 18){
$imAdult = true;
} else{
$imAdult=false;
}

// avec une ternaire
$imAdult=($myAge>=18) ? true : false;
// ou tout simplement
$imAdult=($myAge>=18);
?>
```
## Les BOUCLES
Ce chapitre traite des boucles, mais nous prendrons les tableaux comme structure de travail. En vrai, boucler sur un tableau c’est fréquent. Ce sont des structures qui gardent en mémoire des éléments qu’on peut parcourir et afficher grâce aux boucles. Je donne un exemple si dessous avec l’affichage des élément contenus à l’intérieur du tableau `$user`.
```
<?php
$user1= ['Prénom Nom, 'email', 'mdp', 34];
echo $user1[0]; // "Prénom Nom"
echo $user1[1]; // "email"
echo $user1[3]; // 37
```
On aurait pu déclaré une variable pour chaque élément et les affichés un par un, mais on perdra trop de temps. Avec la structure du tableau les éléments sont réunis dans une seule et même variable grâce aux `[  ]`. Ils sont numérotés de 0 à n éléments, ce sont les `indices`.  

On peut construire des tableaux de tableaux. Imaginons que dans `$user` pour le moment on a qu’un seul utilisateur. On peut créer une variable `$users` qui contiendra le tableau de tous les joueurs.

```
<?php
$users = [$user1, $user2, $user3];
//affichage email $user1
echo $users[0][1] ;
```
C’est bien mais quel rapport avec les boucles ? Imaginons que c’un tableau de recettes de cuisine. On veut toutes les affichées. C’est là que les boucles montrent son utilité.

### Utilisation d’une boucle simple : `while`

Elle fonctionne sur le même principe que les conditions. Une boucle permet de répéter des instructions. Il faut une condition d’exécution sinon l’instruction s’exécute en boucle infinie. Tant que la condition est remplie on boucle, sinon on arrête l’instruction et on sort de la boucle :dizzy_face: :dizzy: :dizzy:. 


```
< ?php 
While($isValid){
//insctructions
}
?>

//Exemple 
<?php
$lines = 1;

while ($lines <= 100)
{
    echo 'Ceci est la ligne n°' . $lines . '<br />';
    $lines++;
}
/*
Ceci est la ligne n°1
Ceci est la ligne n°2
*/
```
Dans cette boucle, `echo` permet d'afficher du texte en PHP et la valeur de `$lines`. La balise HTML <br />  pour aller à la ligne. Et $lines++; incrémente sa valeur ($line = $line + 1).

### Utilisation d’une boucle plus complexe : `for` .

La boucle, `for` est un autre type de boucle. Elle a une forme un peu plus condensée et plus commode à écrire. Elle est donc fréquemment utilisée. 
Pour illustrer on va continuer avec l’exemple nos $users en partant de `while`, mais avec un tableau de tableaux :
```
<?php
//avec while
$lines = 3; // nombre d'utilisateurs dans le tableau
$counter = 0;

while ($counter < $lines) {
    echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
    $counter++; // Ne surtout pas oublier la condition de sortie !
} 

//avec for
<?php
for ($lines = 0; $lines <= 2; $lines++)
{
    echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br />';
}
?>
```
Les deux donnent le même résultat. Analysons ce qui se passe avec `for`, c’est ce qui nous intéresse içi!

Après le mot for  , il y a des parenthèses qui contiennent trois éléments, séparés par des points-virgules ;  :

Le premier sert à **l'initialisation**. C'est la valeur que l'on donne au départ à la variable (ici, elle vaut 0).

Le second, c'est **la condition**. Comme pour le `while` : tant que la condition est remplie, la boucle est réexécutée. Dès que la condition ne l'est plus, on en sort.

Enfin, le troisième c'est **l'incrémentation**. Cela permet d'ajouter 1 à la variable à chaque tour de boucle. Elle est la condition de sortie.

A ce niveau de connaissance, pour décider entre les deux, on peut se dire que la boucle `for` est adaptée si on sait à l’avance le nombre de fois que l’on veut répéter les instructions. Ici on sait que ce sera trois fois. En revanche si ce n’est pas le cas, on utilisera plutôt `while`.

## LES TABLEAUX `ARRAYS` :
Les tableaux sont indispensables en PHP. Ce sont des variables à valeurs multiples. Leur compréhension n’étant pas toujours facile. Il en existe deux types : 
### Tableaux numérotés 
Pour construire un tableau numéroté en PHP, on peut soit lister les valeurs dans un crochet `[  ]` soit utiliser la fonction `array() ;`.
```
<?php
//numérotation par les crochets
$recipes = ['Cassoulet', 'Couscous', 'Escalope Milanaise', 'Salade César',];

// La fonction array permet aussi de créer un array
$recipes = array('Cassoulet', 'Couscous', 'Escalope Milanaise');
?>
//ou encore 
<?php
$recipes[0] = 'Cassoulet';
$recipes[1] = 'Couscous';
$recipes[2] = 'Escalope Milanaise';
?>
//ou aussi
<?php
$recipes[] = 'Cassoulet'; // Créera $recipes[0]
$recipes[] = 'Couscous'; // Créera $recipes[1]
$recipes[] = 'Escalope Milanaise'; // Créera $recipes[2]
?>
```
Dans un array numéroté, chaque « case » est identifiée par un numéro appelé `clé`. Le premier élément porte le n° 0. C’est cette clé qui indique la position de la case de l’élément dans le tableau. Il sert à l’appeler pour l’afficher.
```
<?php
echo $recipes[1]; // Cela affichera : Couscous
?>
``` 

### Tableaux associatifs
Dans un tableau associatif, chaque `clé` est une propriété de la variable tableau `array`. 
Construire un tableau associatif `$recipe`
Exemple : 
 ```
<?php
// Une bien meilleure façon de stocker une recette !
$recipe = [
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
    'author' => 'john.doe@exemple.com',
    'enabled' => true,
];
?>
``` 
La `propriété` est associé à sa valeur par le signe `=>`. Içi la propriété `title` est associé à la valeur `cassoulet`.

### Parcourir un tableau
Il existe trois moyens pour parcourir un tableau : 

1.	Boucle `for`
2.	Boucle `foreach`
3.	Fonction Print_r() : pour le débogage

On a vu dans le chapitre sur les boucles comment explorer un tableau avec `for`. 

Avec la boucle `foreach`, chaque ligne parcourue du tableau est placée temporairement dans une variable `$rows`.

```
<?php

// Déclaration du tableau des recettes
$recipes = [
    ['Cassoulet','[...]','prénom.nom@exemple.com',true,],
    ['Couscous','[...]','prénom.nom@exemple.com',false,],
];

foreach ($recipes as $rows) {
    echo $rows[0]; // Affichera Cassoulet, puis Couscous
}
``` 
Utilisation avec un tableau associatif :
```
<?php
$recipe = [
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
    'author' => 'prénom.nom@exemple.com',
    'enabled' => true,
];

foreach ($recipe as $value) {
    echo $value;
}

/**
 * AFFICHE
 * CassouletEtape 1 : des flageolets, Etape 2 : ...prénom.nom@exemple.com1
 */
``` 
Utilisation avec un tableau de tableaux : 
 ```
<?php

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => false,
    ],
];

foreach($recipes as $recipe) {
    echo $recipe['title'] . ' contribué(e) par : ' . $recipe['author'] . PHP_EOL; 
}
``` 
Pour récupérer la clé de l’élément et sa valeur  : `<?php foreach($recipe as $property => $propertyValue) ?>` 

```
<?php
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'prénom.nom@exemple.com',
];

foreach($recipe as $property => $propertyValue)
{
    echo '[' . $property . '] vaut ' . $propertyValue . PHP_EOL;
}

/*affiche : 
[title] vaut Salade Romaine
[recipe] vaut Etape 1 : Lavez la salde ; Etap 2 : euh …
[author] vaut prénom.nom@exemple.com
``` 

### Afficher un tableau
Pour le débogage, on a besoin de savoir rapidement sans mise en forme ce que contient un tableau, on utilise la fonction `print_r()`. Il est similaire au `echo` pour une variable simple.

```
<?php
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'prénom.nom@exemple.com',
        'is_enabled' => false,
    ],
];
echo '<pre>';
print_r($recipes);
echo '</pre>';
``` 
### Rechercher dans un tableau
#### Vérifier si une clé existe dans un tableau avec `array_key_exists` :
Cette fonction va parcourir le tableau et vérifier si le nom de la clé existe. Il est combiné avec la condition `if`.
Il renvoi un type booléen :
1.	`true` si la clé est dans le tableau
2.	`false` si la clé ne se trouve pas dans le tableau

```
<?php
$recipe = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
];

if (array_key_exists('title', $recipe))
{
    echo 'La clé "title" se trouve dans la recette !';
}

if (array_key_exists('commentaires', $recipe))
{
    echo 'La clé "commentaires" se trouve dans la recette !';
}
``` 
Seule la première condition est vraie, l’autre ne fait rien.

#### Vérifier si une valeur existe dans un tableau avec `in_array ` :
Cette fonction va parcourir le tableau et vérifie les valeur. Il est combiné avec la condition `if`.
Il renvoi un type booléen :
1.	`true` si la valeur est dans le tableau
2.	`false` si la valeur ne se trouve pas dans le tableau

```
<?php
$users = [
    'John Doe',
    'James Doe',
    'Jack Doe',
];

if (in_array('John Doe', $users))
{
    echo John fait bien partie des utilisateurs enregistrés !';
}

if (in_array('Jhonny Depp', $users))
{
    echo 'Johnny fait bien partie des utilisateurs enregistrés !';
}
``` 
Seule la première condition est vraie, l’autre ne fait rien.

#### Récupérer la clé d’une valeur dans un tableau avec `array_search` :
Cette fonction travail aussi avec les valeurs. 
-	Si la valeur est trouvée, la clé correspondante est renvoyée
-	Sinon, elle renvoie false ;

```
<?php
$users = [
    'John Doe',
    'James Doe',
    'Jack Doe',
];

$positionJohn = array_search('John Doe', $users);
echo '"John" se trouve en position ' . $positionJohn . PHP_EOL;

$positionJack = array_search('Jack Doe', $users);
echo '"Jack" se trouve en position ' . $positionJack. PHP_EOL;

``` 
Pour finir sur les tableaux, voyons une application de ce qu'on a vu. L'exercice consiste à afficher des recettes de cuisines suivant leur statuts, `$is_enabled` pour dire en cours de rédaction et que nous n'allons pas afficher.

        ```
        <?php

        $recipes = [
            [
                'title' => 'Cassoulet',
                'recipe' => 'Etape 1 : des flageolets !',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' => true,
            ],
            [
                'title' => 'Couscous',
                'recipe' => 'Etape 1 : de la semoule',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' => false,
            ],
            [
                'title' => 'Escalope milanaise',
                'recipe' => 'Etape 1 : prenez une belle escalope',
                'author' => 'mathieu.nebra@exemple.com',
                'is_enabled' => true,
            ],
        ];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Affichage des recettes</title>
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
                rel="stylesheet"
            >
        </head>
        <body>
            <div class="container">
                <h1>Affichage des recettes</h1>
                <!-- Boucle sur les recettes -->
                <?php foreach($recipes as $recipe) : ?>
                    <!-- si la clé existe et a pour valeur "vrai", on affiche -->
                    <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] == true): ?>

                        <article>
                            <h3><?php echo $recipe['title']; ?></h3>
                            <div><?php echo $recipe['recipe']; ?></div>
                            <i><?php echo $recipe['author']; ?></i>
                        </article>

                    <?php endif; ?>
                <?php endforeach ?>
            </div>   
        </body>
        </html>
        ```


## LES FONCTIONS :
Une fonction est une série d'instructions qui effectue des actions et qui retourne une valeur. Il existe des fonctions prêtes à l'emploi sur PHP ce qui veut dire qu'au lieu d'en créer on vérifie si le calcul que l'on souhaite réaliser n'est pas déjà gérer par une fonction existante, sinon on en fabrique. 

A la différence d'une boucle, une fonction est adaptable à souhait. Il automatise de très grands calculs et nous évite la répétition.
Dans l'exemple précédent, nous avons affichés les recettes selons uniquement leurs status avec des conditions et des boucles. 

Mais imaginons que les conditions d'affichage s'allourdissent au fur et à mesure que l'on avance dans son développement :

1. La clé is_enabled est true  .

2. L'utilisateur doit être connecté.

3. L'utilisateur doit avoir un rôle administrateur.

4. L'utilisateur doit être majeur.

5. Etc.

Cela devient assez vite pénible de se rappeller des calculs mais surtout de devoir se répéter. Et bien on peut faire appel à des petits robots qui automatisent tout ce processus sui sont les fonctions.

### Fonctionnement et appel d'une fonction
Les fonctions sont souples et prennent diverses informations (nombre, chaine de caractère, un booléen) en `entrée`, c'est ce qu'on appel un `paramètre`. Elle fait ses calculs sur celui ci et donne en `sortie` le résultat `true` ou `false`. Les fonctions permettent de récupérer des informations, de chiffrer des données, de faire des recherche dans du texte, d'envoyer de emails et pleins d'autres choses.

        ```
        <?php

        $recipe = [
            'title' => 'Escalope milanaise',
            'recipe' => '',
            'author' => 'prénom.nom@exemple.com',
            'is_enabled' => true,
        ];

        function allowRecipe(array $recipe): bool{
            if(array_key_exists('author', $recipe) && $recipe['author'] =='john.doe@exemple.com'){
                return $recipe['title'].' concoctée par John Doe';
            }

        }; // création de la fonction

        $is_allowed = allowRecipe($recipe); // appel et técupération du résultat dans une variable;

        echo $is_allowed; //affichage de la variable qui contient le résultat de la fonction

        ```
    Ici le prefix `array` défini le type de variable attendue. Il est de bon usage de le faire.  Une autre bonne pratique, le typage selon la valeur de retour attendue de notre fonction avec `bool`.
        
### Fonctions prêtes à l'emploi de PHP
Il existe des centaines de fonction proposées par PHP. Impossible de les voirs toutes. Mais si on arrive à en comprendre le fonctionnement général en étudiant quelques une, toutes les autres ne devraient pas nous poser problèmes. Comme dit précédement, les fonctions accèptent en paramètre (donnée d'entrée) plusieurs type. Cela signifie qu'on peut travailler sur du texte par exmple ou des nombres etc.. C'est précisément ce que nous allons voir içi.
#### Manipulez du texte avec les fonctions
Si on reprend l'exemple de l'affichage des recettes, nous allons essayé de travailler des fonctions qui exécutent les opérations suivantes :

1. Vérifier si la recette est valide.

                ```
                <?php

                    function isValidRecipe(array $recipe) : bool
                    {
                        if (array_key_exists('is_enabled', $recipe)) {
                            $isEnabled = $recipe['is_enabled'];
                        } else {
                            $isEnabled = false;
                        }

                        return $isEnabled;
                    }

                    echo isValidRecipe($recipe). ' ==> c\'est la valeur retournée par isValidRecipe';
                ```
    Application avec des tableaux de recettes : 
            ```
            <?php

        // 2 exemples
        $romanSalad = [
            'title' => 'Salade Romaine',
            'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => true,
        ];

        $sushis = [
            'title' => 'Sushis',
            'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => false,
        ];


        // Répond true !
        $isRomandSaladValid = isValidRecipe($romanSalad);

        // Répond false !
        $isSushisValid = isValidRecipe($sushis);
            ```
   
2. Récupérer des recettes à afficher (seulement celles qui sont valident).

    ```
        $recipes = [...]; // Les recettes
        
        // AVANT

        foreach ($recipes as $recipe) {
            if ($recipe['is_enabled']) {
                // echo $recipe['title'] ..
            }
        }

        // APRES

        function getRecipes(array $recipes) : array
        {
            $validRecipes = [];

            foreach($recipes as $recipe) {
                if (isValidRecipe($recipe)) {
                    $validRecipes[] = $recipe;
                }
            }

            return $validRecipes;
        }

        // construire l'affichage HTML des recettes
        foreach(getRecipes($recipes) as $recipe) {
            echo $recipe['title'], $recipe['recipe'], $recipe['author']. '<br/>'; 
        }

        ```
    Ici, la fonction contient le code nécessaire à la récupération des recettes valides. Comme précédemment, on boucle et on ne conserve que les recettes valides identifiées grâce à la fonction  `isValidRecipe`. Il n'est pas nécessaire d'assigner le résultat d'une fonction à une variable ! Nous voyons ici que nous passons directement la fonction `getRecipes` dans la boucle (nous savons que c'est un tableau parce que nous avons défini le type de retour).

3. Récupérer le nom d'un utilisateur en fonction de l'e-mail associé à la création d'une recette.
    Cette fois, la problématique est de relier l'e-mail associé à un compte utilisateur à l'e-mail utilisé pour la contribution d'une recette :sweat:.

    Voyons cela  : 

        ```
                function displayAuthor(array $recipes, array $users) : array
            {   $displayAuthorInfo = [];
                
                for ($i = 0; $i < count($users); $i++) {
                    $author = $users[$i];
                    foreach(getRecipes($recipes) as $recipe){
                        if ($recipe['author'] === $author['email']) {
                            $displayAuthorInfo[] = [$recipe['title'], $author['name'], $author['role'], $author['email']];
                        } 
                    } 
                } return $displayAuthorInfo;  
            }

            //var_dump(displayAuthor($recipes,$users));

            foreach(displayAuthor($recipes,$users) as $recipe) {
            echo '<h1>Recette: '.$recipe[0].'</h1>'; 
            echo '<h3>Auteur: '.$recipe[1].'</h3>'; 
            echo '<h4>Statut: '.$recipe[2].'</h4>'; 
            echo '<h4>Mail: '.$recipe[3].'</h4>'; 
            }
        ```
