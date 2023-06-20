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
    $secondaryColor = "#FFFFFF";
    switch ($topic) {
        case "HTML":
            $title = "HTML";
            $accentColor = "#5E6CFF";
            $secondaryColor = "#ABB2FF";
            break;
        case "CSS":
            $title = "CSS";
            $accentColor = "#43fe78";
            $secondaryColor = "#8FFFAF";
            break;
        case "javascript":
                $title = "JavaScript";
                $accentColor = "#FF6B6B";
                $secondaryColor = "#FFB8B8";
            break;
        case "Client_Server_Model":
                $title = "The Client Server Model";
                $accentColor = "#ffdf6a";
                $secondaryColor = "#FFF0B8";
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

    $subNavItem = getComponent("./Resources/Components/Shared/progressNavElement.html");
    $subNavItems = "";
    for ($i=0; $i < sizeof($articles) - 2; $i++) { 
        $currentNavItem = str_replace("__REDIRECT__", "articles.php?topic=$topic&article=$i", $subNavItem);
        $currentNavItem = ($i == $article) ? str_replace("__SECONDARYCOLOR__", 'white', $currentNavItem) : str_replace("__SECONDARYCOLOR__", $secondaryColor, $currentNavItem);
        $subNavItems = $subNavItems . $currentNavItem . "\n";
    }
 
    $articleURLend = $articles[$article + 2];
    $content = getComponent("./Resources/Articles/$topic/$articleURLend");
    $body = getComponent("./Resources/Components/articleBody.html");
    $body = str_replace("_TITLE_", $title, $body);
    $body = str_replace("__NAVELEMENTS__", $subNavItems, $body);
    $body = str_replace("_CONTENT_", $content, $body);
    $body = str_replace("_ACCENTCOLOR_", $accentColor, $body);

    $footer = getComponent("./Resources/Components/Shared/footer.html");

    $pageHead = str_replace("__PLACEHOLDER__", $title, $pageHead);


    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>