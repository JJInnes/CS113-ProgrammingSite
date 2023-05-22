<?php
    //Set up variables
    $topic = "";
    $article = "";
    if (isset($_GET['topic']) and isset($_GET['article'])) {
        $topic = $_GET['topic'];
        $article = $_GET['article'];
    } else {
        //throw new Exception("No ARTICLE OR TOPIC PROVIDED");
    }

    //Return Page
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';

        readfile("./Resources/Components/pagehead.html");

        echo "<body>";
            readfile("./Resources/Components/header.html");
            readfile("./Resources/Components/footer.html");
        echo "</body>";

    echo "</html>";
?>