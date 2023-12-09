<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include("configurations.php");

$pokemonList = array(
    "bulbasaur" => array(
        "number" => "001",
        "name" => "Bulbasaur",
        "type" => "Grass/Poison"
    ),
    "ivysaur" => array(
        "number" => "002",
        "name" => "Ivysaur",
        "type" => "Grass/Poison"
    ),
    "venusaur" => array(
        "number" => "003",
        "name" => "Venusaur",
        "type" => "Grass/Poison"
    ),
    "charmander" => array(
        "number" => "004",
        "name" => "Charmander",
        "type" => "Fire"
    ),
    "charmeleon" => array(
        "number" => "005",
        "name" => "Charmeleon",
        "type" => "Fire"
    ),
    "charizard" => array(
        "number" => "006",
        "name" => "Charizard",
        "type" => "Fire/Flying"
    ),
    "squirtle" => array(
        "number" => "007",
        "name" => "Squirtle",
        "type" => "Water"
    ),
    "wartortle" => array(
        "number" => "008",
        "name" => "Wartortle",
        "type" => "Water"
    ),
    "blastoise" => array(
        "number" => "009",
        "name" => "Blastoise",
        "type" => "Water"
    )
);

$cardsPerRow = 3; 
$cardCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pokedex</title>
</head>
<body style="background: url('pokedexbg.jpg') center/cover no-repeat;">

    <h1 class="welcome-text">Welcome to the Pokedex, <?php echo $_SESSION["username"]; ?>!</h1>

    <div class="logout-container">
        <p><a href="logout.php" class="logout-button">Logout</a></p>
    </div>

    <div class="pokemon-container">
    <?php
        foreach ($pokemonList as $pokemon => $details) {
            if ($cardCount % $cardsPerRow == 0) {
                echo '<div class="pokemon-row">';
            }
            echo '<div class="pokemon-card">';
            echo '<img src="images/' . $pokemon . '.jpg" alt="' . $details["name"] . '">';
            echo '<h2>' . $details["name"] . '</h2>';
            echo '<p>Number: ' . $details["number"] . '</p>';

            $types = explode('/', $details["type"]);
            echo '<p>Type: ';
            foreach ($types as $type) {
                echo '<span class="type-' . strtolower($type) . '">' . $type . '</span> ';
            }
            echo '</p>';
            
            echo '</div>';
            if (($cardCount + 1) % $cardsPerRow == 0 || $cardCount == count($pokemonList) - 1) {
                echo '</div>';
            }
            $cardCount++;
}
    ?>
    </div>
</body>
</html>
