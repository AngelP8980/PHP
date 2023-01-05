<?php

// Exercice Formulaire d'abonnement à une newsletter
// Créer une page avec un formulaire d'abonnement avec dans un premier temps uniquement un champ email et un bouton de soumission.
// Les emails des abonnés seront enregistrés dans un fichier au format JSON.
// On va valider le formulaire côté serveur en PHP : est-ce que les champs sont bien remplis ?
// * Est-ce que l'email est un email valide ?
// * Est-ce que l'email n'existe pas déjà dans la liste des abonnés
// => récupérer les données du formulaire
// => valider les données et stocker des messages d'erreurs
// => si pas d'erreur ALORS on enregistre l'email dans le fichier JSON
// => si erreurs, on reste sur la formulaire et on affiche les messages d'erreurs, et on pré rempli le formulaire avec ce qu'avait écrit l'internaute
// Indication : on essaiera de découper le code en fonctions
// En Bonus : ajouter des champs prénom, nom qui doivent être obligatoirement remplis, et des cases à cocher pour choisir ses thèmes favoris !
// Conseil : initialisez toutes les variables qui seraient définies dans un if par exemple, en dehors du if.
// Remarque : on peut faire de la validation côté client (HTML et JS) et côté serveur (PHP)
// On verra que les deux sont utiles. Mais pour tester la validation serveur, il ne faut pas qu'il y ait de validation client. 
// En l'occurrence un champ de type "email" va d'emblée vérifier que c'est bien une adresse email valide. Donc pour tester la validation serveur, on mettra pour le moment un champ de type "text"
// Bonus 1 : découper le code en créant des fonctions
// - loadSubscribers() : charge le tableau d'abonnés du fichier JSON
// - saveSubscribers() : enregistre le tableau d'abonnés dans le fichier JSON
// - addSubscriber() : ajoute un nouvel abonné
// - validateEmail() : valide l'email (retourne un message d'erreur ou null si pas d'erreur)
// Bonus 2 : ajouter des champs nom et prénom dans le formulaire...

//@TODO réécrire l'adresse email en cas d'erreur

// Inclusion des dépendances
include 'functions.php';

// Initialisations
const FILENAME = 'subscribers.json';
$error = null;
$email = "";

// Si le formulaire a été soumis par l'internaute (si je reçois des données) ...
if (!empty($_POST)) {

    // 1. Récupérer les données du formulaire
    $email = $_POST['email'];


    // 2. Validation des données
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Adresse email invalide';
    }

    //////////////////////////////////////////////
    // ETAPE #1 : on récupère le tableau d'abonnés

    // Initialisation du tableau d'abonnés
    $subscribers = [];

    // Récupération des abonnés existants
    if (file_exists(FILENAME)) {

        $jsonData = file_get_contents(FILENAME);

        // Désérialisation des données JSON
        $subscribers = json_decode($jsonData);
    }

    // Vérification de l'existance de l'email dans le tableau d'abonnés // function emailExists
    if (in_array($email, $subscribers)) {
        $error = 'Vous êtes déjà abonné à la newsletter !';
    }
    

    // 3. Enregistrement de l'email si pas d'erreur
    if ($error == null) {

        //////////////////////////////////////////////
        // ETAPE #2 : on ajoute le nouvel abonné
        
        // Ajout de l'email au tableau des abonnés
        $subscribers[] = $email;

        // Sérialisation du tableau d'abonnés au format JSON
        $jsonData = json_encode($subscribers);

        // Enregistrement du tableau d'abonnés dans le fichier JSON
        file_put_contents(FILENAME, $jsonData); // le fichier JSON est créé automatiquement s'il n'existe pas

        //////////////////////////////////////////////
        // ETAPE #3 : redirection de l'internaute
        // pour éviter l'envoi multiple du formulaire 
        // en cas de rafraichissement de la page par l'internaute
        header('Location: confirmation.html');
        exit;
    }

}

// Affichage : inclusion du template
include 'index.phtml';