<?php
session_start();

if (!isset($_SESSION['score'])) {
    header('Location: index.php'); // Redirige si la session n'est pas correcte
    exit;
}

$score = $_SESSION['score'];
$total_questions = count($_SESSION['questions']);

// Réinitialise la session pour un nouveau quiz
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats du Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Résultats du Quiz</h2>
        <p>Votre score est de <?php echo $score; ?> sur <?php echo $total_questions; ?> questions.</p>
        <p>Merci d'avoir participé!</p>
        <a href="index.php">Retour à l'accueil</a>
    </div>
</body>
</html>
