<?php 

// Sélections de la liste des tâches
$tasks = getAllTasks();

// dump($tasks); // ATTENTION le dump envoie du code au client (toujours le désactiver ou supprimer)

// Récupération du message flash le cas échéant
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'home';
include '../templates/base.phtml';
