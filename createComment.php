<?php
include 'db.php';
$postId = $_POST['post_id'];
if (!empty($_POST['author']) && !empty($_POST['message'])) {
    $author = $_POST['author'];
    $text = $_POST['message'];
    $sql = "INSERT INTO comments (Author, Text, Post_id) VALUES ('$author', '$text', $postId);";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("Location: http://localhost:8080/single-post.php?post_id=$postId");
} else {
    header("Location: http://localhost:8080/single-post.php?post_id=$postId&error=required");
}
?>