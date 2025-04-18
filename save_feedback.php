<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'], $_POST['topic'])) {
    $feedback = htmlspecialchars($_POST['feedback']);
    $topic = htmlspecialchars($_POST['topic']);

    // Insert feedback into the database
    $stmt = $conn->prepare("INSERT INTO ai_feedback (topic, feedback) VALUES (?, ?)");
    $stmt->bind_param("ss", $topic, $feedback);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href='education_ai.php';</script>";
    } else {
        echo "<script>alert('Error saving feedback.'); window.location.href='education_ai.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='education_ai.php';</script>";
}
?>