
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pfe24', 'root', '');
    $conn = $pdo;
} catch (PDOException $e) {
    echo "<p>Erreur: " . $e->getMessage();
    die();
}