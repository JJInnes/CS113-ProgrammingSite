<?php
    include 'Resources/PHP//Helpers/renderHelper.php';


    if(isset($_POST['submit'])){
        $title = strip_tags($_POST['postTitle']);
        $author = strip_tags($_POST['postAuthor']);
        $category = strip_tags($_POST['postCategory']);
        $content = strip_tags($_POST['postContent']);

        addPost($title,$author,$category,$content);
    }

    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");

    $body = getComponent("./Resources/Components/createPost.html");

    $footer = getComponent("./Resources/Components/Shared/footer.html");
    
    $pageHead = str_replace("__PLACEHOLDER__", "LearnWebDev", $pageHead);

    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>


