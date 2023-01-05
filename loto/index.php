<?php

// Exercice Loto : générer un tirage de loto
// Générer 6 nombres entiers aléatoires distincts (tous différents) entre 1 et 49
// Créer une fonction randomTirage() qui va générer un tirage et les retourner dans un tableau.
// Appeler ensuite la fonction pour générer un tirage et afficher ce tirage en HTML
// Créez un dossier à part pour l'exercice, loto par exemple et à l'intérieur vous pouvez créer un fichier index.php.
// Notions de l'exercice : boucles, tableaux, fonctions
// Commencez par générer 1 nombre aléatoire entre 1 et 49. 
// Puis générer 6 nombres.
// Puis faites en sorte qu'il n'y ait pas 2 fois le même nombre.
// Allez-y pas à pas et testez à chaque étape votre code !
// Indication :
// Fonctions PHP qui peuvent vous êtes utiles pour l'exercice Loto : rand() ou mt_rand(), in_array()
//Remarque : la règle d'or en développement : DRY (Don't Repeat Yourself)
// Si vous faites un copier/coller 6 fois de la même chose, il y a certainement un moyen de le faire avec une boucle !


function randomTirage() {
    $result = array();
    for ($i = 0 ; $i <= 6 ; $i++) {
        $random = rand(1, 49);
        while (in_array($random, $result)) {
            $random = rand(1, 49);                       
        }
        $result[] = $random;  
    }
    echo print_r($result);  
};

randomTirage();

// Correction

function randomTirage0()
{
    $tirage = [];

    for ($i = 0 ; $i < 6; $i++) {
        $randomNumber = mt_rand(1,49);
        while (in_array($randomNumber, $tirage)) {
            $randomNumber = mt_rand(1,49);
        }
        $tirage[] = $randomNumber;
    }

    return $tirage;
}

$tirage = randomTirage0();

var_dump($tirage);

// Correction 2

function randomTirage1()
{
    $tirage = [];

    for ($i = 0 ; $i < 6; $i++) {
        do {
            $randomNumber = mt_rand(1,49);
        }
        while (in_array($randomNumber, $tirage));
        $tirage[] = $randomNumber;
        }   
    
    return $tirage;
}

$tirage = randomTirage1();

var_dump($tirage);

// Correction 3

function randomTirage2()
{
    $tirage = [];

    while (count($tirage) < 6) {
        $randomNumber = mt_rand(1,49);
        if(in_array($randomNumber, $tirage)) {
            continue; // je passe au tour de boucle suivant directement
        }
        array_push($tirage, $randomNumber);
    }

    return $tirage;
}

$tirage = randomTirage2();

// AFFICHAGE
// echo '<ul>';

// foreach ($tirage as $number) {
//     echo '<li>'.$number.'</li>';
// }

// echo '</ul>';


// Exercice bonus pour le loto : 
// refaire la fonction randomTirage() sans utiliser de boucle.
// Fonctions intéressantes : range(), shuffle(), array_rand(), array_slice(), array_flip()








// Inclusion du fichier de template (ne pas fermer la balise php)
include 'index.phtml';



