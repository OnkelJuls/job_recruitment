<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "Not Provided";
    $email = isset($_POST['email']) ? $_POST['email'] : "Not Provided";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "Not Provided";

    // Retrieve answers from POST data
    $answer1 = isset($_POST['answer1']) ? $_POST['answer1'] : "Not Answered";
    $answer2 = isset($_POST['answer2']) ? $_POST['answer2'] : "Not Answered";
    $answer3 = isset($_POST['answer3']) ? $_POST['answer3'] : "Not Answered";
    $answer4 = isset($_POST['answer4']) ? $_POST['answer4'] : "Not Answered";

    // Debugging: Log the answers to ensure they are retrieved correctly
    error_log("Answer 1: " . $answer1);
    error_log("Answer 2: " . $answer2);
    error_log("Answer 3: " . $answer3);
    error_log("Answer 4: " . $answer4);

    // Construct the email message
    $to = "julian.carstens@tornau-motoren.de"; // Change this to the recipient email
    $subject = "New Quiz Submission from " . $name;
    $message = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    \n
    Quiz Answers:\n
    1. $answer1\n
    2. $answer2\n
    3. $answer3\n
    4. $answer4\n
    ";

    $headers = "From: info@atm-jobs.de" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>
