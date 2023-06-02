<?php
    function getComponent($url){
        $file = fopen($url, "r");
        $result = fread($file, filesize($url));
        fclose($file);
        return $result;
    }

    function returnPage($pageHead, $header, $body, $footer){
        echo "<!DOCTYPE html>";
        
        echo '<html lang="en">';

            echo $pageHead;

            echo "<body>";
                echo $header;

                echo $body;

                echo $footer;
            echo "</body>";

        echo "</html>";
    }
?>