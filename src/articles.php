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
        case "Client_Server_Model":
                $title = "The Client Server Model";
                $accentColor = "#ffdf6a";
                break;
        default:
            break;
      }

    // $title = topicNameToTitle($topic);
    // $accentColor = topicNameToAccentColor($topic);

    $articles = scandir("./Resources/Articles/$topic");

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");
 
    $articleURLend = $articles[$article + 2];
    $content = getComponent("./Resources/Articles/$topic/$articleURLend");

    $body = getComponent("./Resources/Components/articleBody.html");
    $body = str_replace("_TITLE_", $title, $body);
    $body = str_replace("_CONTENT_", $content, $body);
    $body = str_replace("_ACCENTCOLOR_", $accentColor, $body);

    $footer = getComponent("./Resources/Components/Shared/footer.html");


    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>