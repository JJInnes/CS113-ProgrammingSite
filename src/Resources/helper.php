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

    function addPost($title,$author,$category,$content){
        include 'Components/PHP/ConnectionConfig.php';

        $previousRowCountQuery = "SELECT * FROM CS113Proj_Posts;";
        $previousRowCount = $conn->query($previousRowCountQuery);
        $rowCountBefore = $previousRowCount->num_rows;

        $sql = "INSERT INTO `CS113Proj_Posts` (`post_id`, `post_title`, `post_author`, `post_category`, `post_content`) VALUES (NULL, '$title', '$author', '$category', '$content');";

        $result = $conn->query($sql);

        $rowCountAfter = $conn->query($previousRowCountQuery);
        $rowCountAfter = $rowCountAfter->num_rows;

        if ($rowCountAfter > $rowCountBefore) {
            echo "Row successfully inserted.";
        } else {
            echo "Something went wrong, no rows have been inserted";
        }
        $conn->close();

    }
?>