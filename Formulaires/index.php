<?php

// Exercice : créer un formulaire avec un champ de type text "Prénom". Lorsqu'on soumet le formulaire, la page va afficher "Bonjour <prénom>"
// Remarque : à partir de maintenant on va systématiquement séparer le code en 2 fichiers : 
// - le fichier PHP avec uniquement du code PHP (traitements), index.php
// - le fichier de template .phtml avec le code HTML index.phtml
// Créez bien un nouveau dossier pour chaque exercice !

// Initialisation de la variable $firstname
$firstname = null;

// if (array_key_exists('firstame', $_GET)) { // est-ce que la clé 'firstname' existe dans le tableau $_GET
// if (isset($_GET['firstname'])) { // est-ce que la valeur $_GET['firstname'] est définie et non null
if (!empty($_GET)) { // si le tableau $_GET n'est pas vide...
    $firstname = $_GET['firstname'];
}
// else {
//     $firstname = null;
// }


// echo "<p>Salut $firstname !</p>"; // PAS D'AffiCHAGE DANS LE index.php -> index.phtml


// AFFICHAGE - Inclusion du fichier de template (ne pas fermer la balise php)
include 'index.phtml';



$notes = [10, 15, 12, 8];

var_dump($notes[2]); 
// Affiche dans la console : 12, la valeur associé à l'indice 2

$notes = [
    'math' => [10, 15, 12, 8],
    'français' => [18, 19, 17, 18],
    'physique' => [13, 12, 12, 14]
];

/*
 * si chaque tableau représente les notes d'un élève dans une matière,
 * et que je veux afficher la 2ème note de français
 */
var_dump($notes['français'][1]); // Affichera dans la console : 12
/*
 * ['français'] permet ici d'aller chercher les notes du 3ème élève
 * [1] permet ensuite de prendre sa 2ème note
 */