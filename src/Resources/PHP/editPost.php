<?php
include './Helpers/renderHelper.php';

if(isset($_POST['submit'])){

$postID = $_POST['postID'];    
$title = strip_tags($_POST['postTitle']);
$author = strip_tags($_POST['postAuthor']);
$category = strip_tags($_POST['postCategory']);
$content = strip_tags($_POST['postContent']);

updatePost($postID,$title,$author,$category,$content);
}

?>