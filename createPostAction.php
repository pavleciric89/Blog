<?php
include 'db.php';
if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['body'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $sql = "INSERT INTO posts (Title, Body, Author) VALUES ('$title', '$body', '$author');";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("Location: http://localhost:8080/index.php");
} else {
    header("Location: http://localhost:8080/createPost.php?error=required");
}
?>