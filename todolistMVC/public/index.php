<?php

/**
 * Ce fihiers index.php est l'unique fichier PHP accessible directement par les internautes (le client). C'est pour cela qu'il est dans le dossier "public"
 * C'est ce qu'on appelle le "front controller". C'est lui qui va recevoir les requêtes HTTP pour toutes les pages du site.
 * On va principalement retrouver ici le "routing" : c'est le choix du contrôleur à appeler en fonction de la route (URL).
 * 
 * Autre avantage à regrouper toutes les requêtes HTTP vers ce même fichier : on ne va plus répéter les mêmes traitements sur toutes les pages.
 */


// Inclusion de l'autoloader de composer 
require '../vendor/autoload.php';

// Démarrage de la session
session_start();

// Inclusion des dépendances
require '../app/config.php';
require '../src/lib/functions.php';

/**
 * Routing : analyse de l'URL pour savoir sur quelle page on se trouve 
 * et quel ontrôleur appeler
 * 
 * // http://localhost/cours-php/todolist/public/index.php?page=home
 * // http://localhost/cours-php/todolist/public/index.php?page=add-task
 * 
 * Travail sur les URLs :
 * - on veut faire disparaître l'index.php
 * - on ne veut pas voir le chemin physique des dossiers du site
 * - on veut de "jolies" URLs de type monsite.fr/ma-page
 * 
 * Avec Apache, pour faire ça on va utiliser :
 *      -> la réécriture d'URLs (URL rewriting) avec le fichier .htaccess 
 *      -> un "virtual host" (hôte virtuel), une sorte de faux domaine (virtuel)
 * 
 * Il existe une alternative : au lieu de passer par Apache en local, (phase développement)
 * on va utiliser le serveur web interne de PHP (PHP built-in web server).
 * 
 * Pour démarrer le serveur de PHP, dans le terminal, on se place dans le dossier du projet,
 * on lance la commande : 
 *                          php -S localhost:8000 -t public
 */

// echo 'coucou';

/**
 * Définir des URLs (le path ou la route) pour chaque page du site
 * - Page d'accueil : /
 * - Page création d'une tâche : /add-task
 */

// dump($_SERVER['REQUEST_URI']);
// dump($_SERVER['PATH_INFO']);

// Inclusion du fichier de routes
$routes = require '../app/routes.php';

// On récupère le path de l'URL
$path = '/';
if (array_key_exists('PATH_INFO', $_SERVER)) {
    $path = $_SERVER['PATH_INFO'];
} 

// dump($path);

// On va chercher la route correspondant à la page sur laquelle on se trouve
$controller = null;
foreach ($routes as $route) {
    if ($route['path'] == $path) {
        $controller = $route['controller'];
        break;
    }
}

// Si $controller est null, la route n'existe pas => 404
if ($controller == null) {
    http_response_code(404);
    echo 'Page introuvable';
    exit;
}

// dump($controller);
/**
 * localhost:8000 => 'home.php'
 * localhost:8000/add-task => 'addTask.php
 * localhost:8000/toto => 'Page introuvalbe'
 */

 // Inclusion du fichier de contrôleur
 require '../src/controllers/' . $controller;