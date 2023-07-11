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

        include './Resources/PHP/ConnectionConfig.php';

        $previousRowCountQuery = "SELECT * FROM CS113Proj_Posts;";
        $previousRowCount = $conn->query($previousRowCountQuery);
        $rowCountBefore = $previousRowCount->num_rows;

        $sql = "INSERT INTO `CS113Proj_Posts` (`post_id`, `post_title`, `post_author`, `post_category`, `post_content`) VALUES (NULL, '$title', '$author', '$category', '$content');";

        $result = $conn->query($sql);

        $rowCountAfter = $conn->query($previousRowCountQuery);
        $rowCountAfter = $rowCountAfter->num_rows;

        if ($rowCountAfter > $rowCountBefore) {
            echo '<script type="text/javascript">';
            echo ' alert("New Post added to the database!")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("There was a problem the post was not added to the database.")';
            echo '</script>';
        }
        $conn->close();

    }
    function editPost(){
        echo index.php;
    }
    function checkRegisterDetails($registerusername, $registeremailaddress){
        include '../PHP/ConnectionConfig.php';

        $detailsAvailable = false;
        $counter = 0;

        $RowCountQuery = "SELECT * FROM `CS113Proj_Users` WHERE Username = '$registerusername';";
        $previousRowCount = $conn->query($RowCountQuery);
        $rowCountBefore = $previousRowCount->num_rows;

        // echo $rowCountBefore;
        // echo $registerusername;

        if ($rowCountBefore > 0) {

        } else {
            $counter++;
        }

        $RowCountQuery = "SELECT * FROM `CS113Proj_Users` WHERE EmailAddress = '$registeremailaddress';";
        $previousRowCount = $conn->query($RowCountQuery);
        $rowCountBefore = $previousRowCount->num_rows;

        if ($rowCountBefore > 0) {

        } else {
            $counter++;
        }

        if($counter==2){
            $detailsAvailable=true;
        }

        $conn->close();
        return $detailsAvailable;
        
    }
    function createNewUser($registerusername,$registeremailaddress,$registerpassword){
        include '../PHP/ConnectionConfig.php';

        $previousRowCountQuery = "SELECT * FROM CS113Proj_Users;";
        $previousRowCount = $conn->query($previousRowCountQuery);
        $rowCountBefore = $previousRowCount->num_rows;

        $sql = "INSERT INTO `CS113Proj_Users`(`Id`, `EmailAddress`, `Username`, `Password`) VALUES (NULL,'$registeremailaddress','$registerusername','$registerpassword')";

        $result = $conn->query($sql);

        $rowCountAfter = $conn->query($previousRowCountQuery);
        $rowCountAfter = $rowCountAfter->num_rows;

        $successmessage = "";
        if ($rowCountAfter > $rowCountBefore) {
            $successmessage = "New account added to the database!";
        } else {
            $successmessage = "There was a problem creating your user.";
        }
        $conn->close();
    }
?>