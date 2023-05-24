<?php
    //Set up variables
    // N.A.

    //Return Page
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';

        readfile("./Resources/Components/Shared/pagehead.html");

        echo "<body>";
            readfile("./Resources/Components/Shared/header.html");

            //Internal body goes here
            readfile("./Resources/Components/indexMain.html");

            readfile("./Resources/Components/Shared/footer.html");
        echo "</body>";

    echo "</html>";
?>