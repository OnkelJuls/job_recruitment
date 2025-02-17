let currentQuestion = 1;
const totalQuestions = 5;
let selectedButtons = {};
let qualified = true;

let userResponses = {}; // Object to store answers

function updateHiddenFields() {
    for (let i = 1; i <= 4; i++) {
        const input = document.querySelector(`input[name="answer${i}"]`);
        if (input && userResponses[i]) {
            input.value = userResponses[i];
        }
    }
}

function nextQuestion(questionNumber, button, isQualified) {
    if (selectedButtons[questionNumber]) {
        selectedButtons[questionNumber].classList.remove('selected');
    }
    selectedButtons[questionNumber] = button;
    button.classList.add('selected');

    let answerText = button.textContent; // Get the button text (answer)
    userResponses[questionNumber] = answerText; // Store response
    updateHiddenFields();

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

    if (questionNumber === totalQuestions) {
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            submitForm();
        });
    }
}

function submitForm() {
    const form = document.getElementById('questionnaire');
    
    if (currentQuestion === totalQuestions) {
        const name = document.querySelector('input[name="name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const datenschutz = document.querySelector('input[name="datenschutz"]').checked;

        if (!name || !email || !phone || !datenschutz) {
            alert('Bitte füllen Sie alle Pflichtfelder aus.');
            return;
        }

        updateHiddenFields();
        form.submit();
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