<?php
session_start();

// Quiz data
$questions = [
    [
        'question' => "1. He was an HONEST man",
        'options' => ["A) liar", "B) good", "C) bad", "D) truthful", "E) wonderful"],
        'answer' => "D"
    ],
    [
        'question' => "2. The climate of Great Britain is MILD",
        'options' => ["A) difficult", "B) strong", "C) severe", "D) bad", "E) good"],
        'answer' => "E"
    ],
    // Add more questions here...
];

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Initialize score
if (!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
}

// Check if all questions have been answered
if (isset($_POST['answer'])) {
    // Check answer
    $userAnswer = $_POST['answer'];
    $currentQuestionIndex = $_POST['questionIndex'];
    $correctAnswer = $questions[$currentQuestionIndex]['answer'];

    if ($userAnswer === $correctAnswer) {
        $_SESSION["score"]++;
    }
}

// Check if quiz completed
if (isset($_SESSION['questionIndex']) && $_SESSION['questionIndex'] >= count($questions)) {
    echo "<h2>Quiz completed!</h2>";
    echo "<p>Your score: {$_SESSION['score']} out of " . count($questions) . "</p>";
    echo "<p><a href='logout.php'>Logout</a></p>";
    // Clear session variables
    unset($_SESSION['questionIndex']);
    unset($_SESSION['score']);
    exit;
}

// Display current question
$questionIndex = isset($_SESSION['questionIndex']) ? $_SESSION['questionIndex'] : 0;
$currentQuestion = $questions[$questionIndex];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Quiz</h2>
    <!--<form action="quiz.php" method="post">
        <div id="question"><?php echo $currentQuestion['question']; ?></div>
        <div id="options">
            <?php foreach ($currentQuestion['options'] as $index => $option) : ?>
                <input type="radio" id="option<?php echo $index + 1; ?>" name="answer" value="<?php echo $option; ?>">
                <label for="option<?php echo $index + 1; ?>"><?php echo $option; ?></label><br>
            <?php endforeach; ?>
        </div>
        <input type="hidden" name="questionIndex" value="<?php echo $questionIndex; ?>">
        <button type="submit">Next</button>
    </form>-->

    <div id="question"></div>

<div id="options" class="options">
        <button id="option1" onclick="checkAnswer('A')" class="optiuni">A</button>
        <button id="option2" onclick="checkAnswer('B')" class="optiuni">B</button>
        <button id="option3" onclick="checkAnswer('C')" class="optiuni">C</button>
        <button id="option4" onclick="checkAnswer('D')" class="optiuni">D</button>
        <button id="option5" onclick="checkAnswer('E')" class="optiuni">E</button>
</div>

<div id="result"></div>


    <script src="script.js"></script>
</body>
</html>
