# PHP :
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

