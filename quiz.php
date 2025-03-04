<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Jobs</title>
    <link rel="icon" href="./images/TORNAU MOTOREN Logo - klein.png">
    <link rel="stylesheet" href="./styles/quiz.css">
</head>
<body>
    <div class="logo-container">
        <a href="./index.html"><img src="./images/Logo.png" alt="Tornau Logo" width="300" height="auto"></a>
    <div class="container">
        <h2>KFZ Mechatroniker System- und Hochvolttechnik</h2>
        <div class="progress">
            <div class="progress-bar" id="progress-bar"></div>
        </div>
        <form id="questionnaire" action="send_mail.php" method="POST">
            <div class="question-container active" id="q1">
                <label>Welche Qualifikation bringst du mit?</label>
                <button type="button" onclick="nextQuestion(1, this, false)">Keine</button>
                <button type="button" onclick="nextQuestion(1, this, true)">Abgeschlossene Ausbildung KFZ Mechatroniker System- und Hochvolttechnik (m/w/d)</button>
                <button type="button" onclick="nextQuestion(1, this, true)">HV Schein 3S</button>
                <button type="button" onclick="nextQuestion(1, this, true)">KFZ Meister (m/w/d)</button>
                <button type="button" onclick="nextQuestion(1, this, true)">Vergleichbare Qualifikation</button>
            </div>
            <div class="question-container" id="q2">
                <label>Wie lange hast du bereits Berufserfahrung in dem Bereich?</label>
                <button type="button" onclick="nextQuestion(2, this, true)">Keine</button>
                <button type="button" onclick="nextQuestion(2, this, true)">Bis 2 Jahre</button>
                <button type="button" onclick="nextQuestion(2, this, true)">Bis 5 Jahre</button>
                <button type="button" onclick="nextQuestion(2, this, true)">Mehr als 5 Jahre</button>
                <div class="nav-buttons">
                    <button type="button" onclick="prevQuestion(2, 1)">Zurück</button>
                </div>
            </div>
            <div class="question-container" id="q3">
                <label>Was ist dir bei unserem Unternehmen besonders wichtig?</label>
                <button type="button" onclick="nextQuestion(3, this, true)">Kollegiales Team</button>
                <button type="button" onclick="nextQuestion(3, this, true)">Kreative spanende Projekte</button>
                <button type="button" onclick="nextQuestion(3, this, true)">Ein Chef, der mir zuhört</button>
                <div class="nav-buttons">
                    <button type="button" onclick="prevQuestion(3, 2)">Zurück</button>
                </div>
            </div>
            <div class="question-container" id="q4">
                <label>Wann kannst du anfangen?</label>
                <button type="button" onclick="nextQuestion(4, this, true)">Sofort!</button>
                <button type="button" onclick="nextQuestion(4, this, true)">Innerhalb der nächsten Wochen</button>
                <button type="button" onclick="nextQuestion(4, this, true)">In den nächsten Monaten</button>
                <button type="button" onclick="nextQuestion(4, this, true)">Weiß ich noch nicht genau</button>
                <div class="nav-buttons">
                    <button type="button" onclick="prevQuestion(4, 3)">Zurück</button>
                </div>
            </div>
            <div class="question-container" id="q5">
                <label>Name:</label>
                <input type="text" name="name" required>
            
                <label>Email:</label>
                <input type="email" name="email" required>

                <label>Telefonnummer:</label>
                <input type="tel" name="phone" required>
                
                <input type="hidden" name="answer1" id="answer1">
                <input type="hidden" name="answer2" id="answer2">
                <input type="hidden" name="answer3" id="answer3">
                <input type="hidden" name="answer4" id="answer4">

                <div id="datenschutz">
                <input type="checkbox" name="datenschutz" required>
                <label for="datenschutz">Hiermit akzeptire ich die Datenschutzbestimmungen</label>
                </div>

                <div class="nav-buttons">
                    <button type="button" onclick="prevQuestion(5, 4)">Zurück</button>
                    <button type="submit">Senden</button>
                </div>
            </div>
            
            <div class="question-container" id="not-qualified">
                <p>Vielen dank für dein Interesse, aber für die gesuchte Position bist du leider nicht geeignet, vielleicht ist hier etwas für dich dabei</p>
                    <button type="button" onclick="window.location.href='https://tornau-motoren.de/de/jobs-stellenangebote'">Stellenangebote</button>
                <button type="button" onclick="restartQuestionnaire()">Neustarten</button>
            </div>
        </form>
    </div>
</div>
    <script src="./scripts/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>