<?php

// Documentation officielle : php.net (backend)

// Variables : pas de déclaration
$firstname = 'Alfred';

// Constantes : pas de $, nom en MAJ et _ (underscore)
const MA_CONSTANTE = 'value';

// ou bien avec la fonction define()
define('UNE_AUTRE_CONSTANTE', 10);

// Types de données (string, number, booleen)

// string : chaînes de caractères
$hello = "hello $firstname"; // avec les doubles "" je peux insérer directement une variable
$message = 'hello ' . $firstname; // Opérateur de concaténation : .

$lenght = strlen($message); // Récupérer la longueur d'une chaîne de caractères

// Nombres : entiers (int) et les flottants (float)
// Opérateurs arithmétiques : +-/*%
// Opérateurs d'incrémentation : ++ --


// Booléen (bool) : true / false

// Debugger uen variable en PHP
var_dump($lenght);

// Tableaux
$tab = [1,2,3];
$tab2 = array('titi', 'toto', 'tata');

var_dump('La première valeur du tableau $tab est : ' . $tab[0]);

// Ajouter des éléments dans un tableau
array_push($tab, 4, 5);
var_dump($tab);

// Autre syntaxe pour ajouter UN SEUL élément à la fin d'un tableau
$tab[] = 6;

// Taille d'un tableau
var_dump(count($tab));

// Objets



// Conditions (if, else, elseif)
if ($firstname == 'Alfred') {
    echo 'Bonjour Alfred';
}

if ($firstname == 'Alfred') {
    echo 'Bonjour Alfred';
}
else {
    echo "Ce n'est pas Alfred";
}

switch($firstname) {
    case 'Alfred' :
        // ...
        break;

    case 'Robert' :
        //...
        break;

    default:
        // ...
}


// Boucles

// Boucle for (limite le nb de tour de boucle)
for ($i = 1 ; $i <= 10 ; $i++) {
    echo '<p>Tour de boucle n°'.$i.'</p>';
}

// Boucle while (on ne connaît pas le nb de tour de boucle)
$j = 1;
while ($j <= 10) {
    echo '<p>Tour de boucle n°'.$j.'</p>';
    $j++;
} 

// Boucle do...while (on fait au moins 1 tour de boucle)
$k = 1;
do {
    echo '<p>Tour de boucle n°' .$k.'</p>';
    $k++;
} while ($k <= 10);


// Parcourir un tableau
$persons = ['Alfred', 'Sarah', 'Killian'];

// Avec la boucle for
for ($i = 0; $i < count($persons) ; $i++) {
    echo '<p>'.$persons[$i].'</p>';
}

// foreach (l'équivalent de la boucle for...of en Javascript)
foreach ($persons as $index => $person) {
    echo '<p>Indice n°'.$index. ' : '.$person.'</p>';
}


// Tableaux associatifs 
// -> les  valeurs ne sont pas associées à un indice numérique mais à une chaîne de caractères (clé)
$recettes = [
    // CLE => VALEUR
    'couscous' => 'Ma recette de couscous',
    'tajine' => 'Ma super reette de tajine'
];

$recettes['taboulé'] = 'Ma super recette de taboulé';

$customer = [
    'firstname' => 'Alfred',
    'lastname' => 'Dupont',
    'email' => 'ad@gmail.com',
    'phone' => '0754218495'
];

echo $customer['email'] . '<br>';

foreach ($customer as $key => $value) { // $key = variable clé - $value = variable valeur
    echo "<p>$key: $value</p>"; // !!! double quote !!!
}

// Imbrication de tableaux
$customer = [
    [
        'firstname' => 'Alfred',
        'lastname' => 'Dupont',
        'email' => 'ad@gmail.com',
        'phone' => '0754218495'   
    ],
    [
        'firstname' => 'Sylvie',
        'lastname' => 'Durant',
        'email' => 'sd@gmail.com',
        'phone' => '0695847432'
    ]
];

foreach ($customer as $c) {
    echo '<p>'.$c['firstname'].'</p>';
}

// Fonctions

//Définition de la fonction sayHello
function sayHello(string $name = 'world'):string //typage du retour
{
    $result = '<p>Hello '.$name.' !! ^^</p>';
    return $result;
}

// Exécution de la fonction sayHello : valeur obligatoire
echo sayHello('Alfred'); // Hello Alfred !
$message = sayHello('Sarah'); // Hello Sarah !
echo sayHello(); // Hello world !


// echo rappelle et affiche sur la page
// return fait sortir d=le résultat de la fonction
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP</title>
</head>
<body>
    <header>        
        <h1><?php echo "Bonjour PHP !! ^^"; ?></h1>
    </header>
    <main>

    </main>
        
    
</body>
</html>