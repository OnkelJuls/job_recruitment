let currentQuestion = 1;
const totalQuestions = 5;
let selectedButtons = {};
let qualified = true;

let userResponses = {}; // Object to store answers

function nextQuestion(questionNumber, button, isQualified) {
    if (selectedButtons[questionNumber]) {
        selectedButtons[questionNumber].classList.remove('selected');
    }
    selectedButtons[questionNumber] = button;
    button.classList.add('selected');

    let answerText = button.textContent; // Get the button text (answer)
    userResponses[questionNumber] = answerText; // Store response

    if (!isQualified) {
        qualified = false;
        showDisqualification();
        return;
    }

    document.getElementById(`q${questionNumber}`).classList.remove('active');
    if (questionNumber < totalQuestions) {
        document.getElementById(`q${questionNumber + 1}`).classList.add('active');
        updateProgressBar(questionNumber + 1);
        currentQuestion = questionNumber + 1;
    } else {
        document.getElementById(`q${questionNumber}`).classList.add("active");
        updateProgressBar(totalQuestions);
    }
}

function prevQuestion(questionNumber, previousQuestion) {
    document.getElementById(`q${questionNumber}`).classList.remove('active');
    document.getElementById(`q${previousQuestion}`).classList.add('active');
    updateProgressBar(previousQuestion);
    currentQuestion = previousQuestion;
    qualified = true; // Reset qualification check when going back
}

function showDisqualification() {
    document.querySelectorAll('.question-container').forEach(q => q.classList.remove('active'));
    document.getElementById("not-qualified").classList.add("active");
    updateProgressBar(totalQuestions);
}

function restartQuestionnaire() {
    qualified = true;
    currentQuestion = 1;
    selectedButtons = {}; // Reset selected buttons
    userResponses = {}; // Reset stored answers
    document.querySelectorAll('.question-container').forEach(q => q.classList.remove('active'));
    document.querySelectorAll('button').forEach(btn => btn.classList.remove('selected'));
    document.getElementById("q1").classList.add("active");
    updateProgressBar(1);
}

function updateProgressBar(questionNumber) {
    let progress = (questionNumber / totalQuestions) * 100;
    document.getElementById('progress-bar').style.width = progress + '%';
}