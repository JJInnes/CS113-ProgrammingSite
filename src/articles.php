<?php
    include "./Resources/helper.php";
    
    //Set up variables
    $topic = "";
    $article = "";
    if (isset($_GET['topic']) and isset($_GET['article'])) {
        $topic = $_GET['topic'];
        $article = $_GET['article'];
    } else {
        throw new Exception("No ARTICLE OR TOPIC PROVIDED");
    }

    $title = "";
    $accentColor = "#FFFFFF";
    switch ($topic) {
        case "html":
            $title = "HTML";
            $accentColor = "#5E6CFF";
            break;
        case "css":
            $title = "CSS";
            $accentColor = "#43fe78";
            break;
        case "javascript":
                $title = "JavaScript";
                $accentColor = "#FF6B6B";
            break;
        case "clientservermodel":
                $title = "The Client Server Model";
                $accentColor = "#ffdf6a";
                break;
        default:
            break;
      }

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");

    $body = getComponent("./Resources/Components/articleBody.html");
    $body = str_replace("_TITLE_", $title, $body);
    $body = str_replace("_CONTENT_", $topic, $body);
    $body = str_replace("_ACCENTCOLOR_", $accentColor, $body);

    $footer = getComponent("./Resources/Components/Shared/footer.html");


    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>