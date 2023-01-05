<?php

// 1°) Construire une structure de données (tableaux) qui va stocker les informations de plusieurs étudiants.
// Pour chaque étudiant, on veut stocker : 
// - prénom
// - nom
// - date de naissance
// - email
// - plusieurs notes
// 
// 2°) Calculer la moyenne de chaque étudiant et l'enregistrer dans la structure de données


$student = [
        [
                "prénom" => "Angel",
                "nom" => "P",
                "dateDeNaissance" => "22/04",
                "email" => "ap@gmail.com",
                "notes" => [15,18,12,14,16] // $student[0]['note']
                // 12.6
        ],
        [
                "prénom" => "Manon",
                "nom" => "P",
                "dateDeNaissance" => "16/02",
                "email" => "mp@gmail.com",
                "notes" => [17,20,15,19,16] // $student[1]['note']
                // 12.2
        ],
        [
                "prénom" => "Rod",
                "nom" => "P",
                "dateDeNaissance" => "28/11",
                "email" => "rp@gmail.com",
                "notes" => [18,15,13,17,20] // $student[2]['note']
                // 11.2
        ]
];
        
        for ($i=0 ; $i < count($student) ; $i++) {
                $result[$i] = array_sum($student[$i]['notes'])/strlen('notes'); // result[0] -> result[1] -> result[2]
                $student[$i][$i] = $result[$i];

                echo 'La moyenne de '.$student[$i]['prénom']. ' est '.$student[$i][$i].'<br>';
        };





// foreach ($tabStudent as $key => $value) { // $key = variable clé - $value = variable valeur
//     echo "<p>$key: $value</p>"; // !!! double quote !!!
// }
    







// Inclusion du fichier de template (ne pas fermer la balise php)
include 'index.phtml';



