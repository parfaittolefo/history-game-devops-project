<?php
session_start();
require_once('functions.php');

if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['questions'] = get_questions(); // Fonction à implémenter dans functions.php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = $_POST['answer'];
    $correct_answer = $_SESSION['questions'][$_SESSION['current_question']]['correct_answer'];

    if ($user_answer == $correct_answer) {
        $_SESSION['score']++;
    }

    $_SESSION['current_question']++;

    if ($_SESSION['current_question'] >= count($_SESSION['questions'])) {
        // Fin du quiz
        header('Location: results.php');
        exit;
    }
}

$question = $_SESSION['questions'][$_SESSION['current_question']]['question'];
$options = $_SESSION['questions'][$_SESSION['current_question']]['options'];
shuffle($options);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz sur l'histoire du Bénin - Question <?php echo $_SESSION['current_question'] + 1; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Question <?php echo $_SESSION['current_question'] + 1; ?></h2>
        <p><?php echo $question; ?></p>
        <form method="post" action="quiz.php">
            <?php foreach ($options as $option) : ?>
                <label>
                    <input type="radio" name="answer" value="<?php echo $option; ?>" required>
                    <?php echo $option; ?>
                </label><br>
            <?php endforeach; ?>
            <button type="submit">Suivant</button>
        </form>
    </div>
</body>
</html>
