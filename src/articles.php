<?php
    include "./Resources/PHP//Helpers/renderHelper.php";
    include "./Resources/PHP//Helpers/authHelper.php";
    include "./Resources/PHP/ConnectionConfig.php";
    
    //Set up variables
    $topic = "";
    $article = "";
    if (isset($_GET['topic']) and isset($_GET['article'])) {
        $topic = $_GET['topic'];
        $article = $_GET['article'];
    } else {
        throw new Exception("No ARTICLE OR TOPIC PROVIDED");
    }

    if(isset($_COOKIE["authToken"])){
        if(verifyTokenUntampered($_COOKIE["authToken"])){
            $userToken = json_decode(decodeToken($_COOKIE["authToken"]));
            
            $sql = "SELECT completed FROM `CS113Proj_UserProgress` WHERE userID = '$userToken->id' AND category = '$topic';";
            $result = $conn->query($sql);
            $progresses = $result->fetch_all(); 

            $completedArticles = array();
            for ($i=0; $i < sizeof($progresses); $i++){
                array_push($completedArticles, $progresses[$i][0]);
            }

            if(!in_array($article, $completedArticles)){
                $guid = createGUID();
                $sql = "INSERT INTO CS113Proj_UserProgress (Id, userID, category, completed) VALUES ('$guid', '$userToken->id', '$topic', $article);";
                $result = $conn->query($sql);
            }
        }
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
        case "Javascript":
                $title = "JavaScript";
                $accentColor = "#FF6B6B";
                $secondaryColor = "#FFB8B8";
            break;
        case "Client Server Model":
                $title = "The Client Server Model";
                $accentColor = "#ffdf6a";
                $secondaryColor = "#FFF0B8";
                break;
        default:
            break;
      }

    $sql = "SELECT * FROM `CS113Proj_Posts` WHERE post_category  = '$topic'";
    $result = $conn->query($sql);

    $articles = $result->fetch_all(); 

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");

    $subNavItem = getComponent("./Resources/Components/Shared/progressNavElement.html");
    $subNavItems = "";
    
    for ($i=0; $i < sizeof($articles); $i++) {
        $currentNavItem = str_replace("__REDIRECT__", "articles.php?topic=$topic&article=$i", $subNavItem);
        $currentNavItem = ($i == $article) ? str_replace("__SECONDARYCOLOR__", 'white', $currentNavItem) : str_replace("__SECONDARYCOLOR__", $secondaryColor, $currentNavItem);
        if(isset($completedArticles)){
            $currentNavItem = in_array($i, $completedArticles) ? str_replace("__INTERNAL__", "&#10004;", $currentNavItem): str_replace("__INTERNAL__", "", $currentNavItem);
        } else{
            $currentNavItem = str_replace("__INTERNAL__", "", $currentNavItem);
        }
        $subNavItems = $subNavItems . $currentNavItem . "\n";
    }
 
    $content = $articles[$article][4];
    $postID= $articles[$article][0];

    $body = getComponent("./Resources/Components/articleBody.html");
    $body = str_replace("_TITLE_", $title, $body);
    $body = str_replace("__NAVELEMENTS__", $subNavItems, $body);
    $body = str_replace("_CONTENT_", $content, $body);
    $body = str_replace("_ACCENTCOLOR_", $accentColor, $body);
    $body = str_replace("_POSTID_", $postID, $body);

    $footer = getComponent("./Resources/Components/Shared/footer.html");

    $pageHead = str_replace("__PLACEHOLDER__", $title, $pageHead);


    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>