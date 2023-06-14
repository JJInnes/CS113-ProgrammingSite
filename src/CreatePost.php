<?php
include 'Resources/helper.php';

$title = $_POST['postTitle'];
$author = $_POST['postAuthor'];
$category = $_POST['postCategory'];
$content = $_POST['postContent'];

//echo $title;
//echo "<br>";
//echo $author;
//echo "<br>";
//echo $category;
//echo "<br>";
//echo $content;
//echo "<br>";


addPost($title,$author,$category,$content);

header("Location: index.php");
exit();


?>