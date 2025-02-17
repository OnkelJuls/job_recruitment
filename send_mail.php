<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "julian.carstens@tornau-motoren.de"; // Replace with your email
    $subject = "Neue Bewerbung KFZ Mechatroniker";
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    
    $message = "Neue Bewerbung:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Telefon: $phone\n\n";
    $message .= "Antworten:\n";
    $message .= "1. Qualifikation: $answer1\n";
    $message .= "2. Berufserfahrung: $answer2\n";
    $message .= "3. Wichtig im Unternehmen: $answer3\n";
    $message .= "4. Verfügbarkeit: $answer4\n";
    
    $headers = "From: noreply@atm-jobs.de\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>