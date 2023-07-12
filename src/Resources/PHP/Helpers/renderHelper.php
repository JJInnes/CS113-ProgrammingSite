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

        $registerGUID = createGUID();
        $sql = "INSERT INTO `CS113Proj_Users`(`Id`, `Username`, `Password`, `EmailAddress`) VALUES ('$registerGUID','$registerusername','$registerpassword','$registeremailaddress')";

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
    function viewProfileGetFieldToVariable($loggedinGUID, $fieldOfInterest){
        // include './Resources/PHP/ConnectionConfig.php';

        // $getUsernameQuery = "SELECT $fieldOfInterest FROM `CS113Proj_Users` WHERE Id = '$loggedinGUID';";
        // $result = $conn->query($getUsernameQuery);
        // $usernamevalue = mysqli_fetch_assoc($result);
        // $username= $usernamevalue[$fieldOfInterest];
        // return $username;
        include './Resources/PHP/ConnectionConfig.php';

        $getFieldQuery = "SELECT $fieldOfInterest FROM `CS113Proj_Users` WHERE Id = '$loggedinGUID';";
        $result = $conn->query($getFieldQuery);
        $fieldValue = mysqli_fetch_assoc($result);
        $field= $fieldValue[$fieldOfInterest];
        return $field;
    }

    function editPostGetPostTitle($postID, $callLocation){
        if($callLocation==1){
            include './Resources/PHP/ConnectionConfig.php';
        }if($callLocation==2){
            include '../PHP/ConnectionConfig.php';
        }

        $getFieldQuery = "SELECT post_title FROM `CS113Proj_Posts` WHERE post_id = '$postID';";
        $result = $conn->query($getFieldQuery);
        $fieldValue = mysqli_fetch_assoc($result);
        $field= $fieldValue['post_title'];
        return $field;
    }
    function editPostGetPostAuthor($postID,$callLocation){
        if($callLocation==1){
            include './Resources/PHP/ConnectionConfig.php';
        }if($callLocation==2){
            include '../PHP/ConnectionConfig.php';
        }

        $getFieldQuery = "SELECT post_author FROM `CS113Proj_Posts` WHERE post_id = '$postID';";
        $result = $conn->query($getFieldQuery);
        $fieldValue = mysqli_fetch_assoc($result);
        $field= $fieldValue['post_author'];
        return $field;
    }
    function editPostGetPostCategory($postID,$callLocation){
        if($callLocation==1){
            include './Resources/PHP/ConnectionConfig.php';
        }if($callLocation==2){
            include '../PHP/ConnectionConfig.php';
        }

        $getFieldQuery = "SELECT post_category FROM `CS113Proj_Posts` WHERE post_id = '$postID';";
        $result = $conn->query($getFieldQuery);
        $fieldValue = mysqli_fetch_assoc($result);
        $field= $fieldValue['post_category'];
        return $field;
    }

    function editPostGetPostContent($postID,$callLocation){
        if($callLocation==1){
            include './Resources/PHP/ConnectionConfig.php';
        }if($callLocation==2){
            include '../PHP/ConnectionConfig.php';
        }

        $getFieldQuery = "SELECT post_content FROM `CS113Proj_Posts` WHERE post_id = '$postID';";
        $result = $conn->query($getFieldQuery);
        $fieldValue = mysqli_fetch_assoc($result);
        $field= $fieldValue['post_content'];
        return $field;
    }

    
    function updatePost($postID,$title,$author,$category,$content){
        include '../PHP/ConnectionConfig.php';

        $sql = "UPDATE `CS113Proj_Posts` SET `post_title`='$title',`post_author`='$author',`post_category`='$category',`post_content`='$content' where post_id = $postID";
        
        $result = $conn->query($sql);

        $currentTitle = editPostGetPostTitle($postID,2);
        $currentAuthor = editPostGetPostAuthor($postID,2);
        $currentCategory = editPostGetPostCategory($postID,2);
        $currentContent = editPostGetPostContent($postID,2);

        if($title==$currentTitle && $author==$currentAuthor && $category==$currentCategory && $content==$currentContent){
            echo '<script type="text/javascript">';
            echo ' alert("Post successfully updated!")';
            echo '</script>';
            header('Refresh: 0; URL=../../index.php');
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("Failed")';
            echo '</script>';
            header('Refresh: 0; URL=../../index.php');
        }

        $conn->close();
    }
?>