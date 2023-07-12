<?php
    include "./Resources/PHP/Helpers/renderHelper.php";


    //Set up variables
    $postID="";

    if(isset($_POST['postID'])){
        $postID = $_POST['postID'];
    } else {
        throw new Exception("No POST PROVIDED");
    }

    $titleFromDB = editPostGetPostTitle($postID,1);
    $authorFromDB = editPostGetPostAuthor($postID,1);
    $categoryFromDB = editPostGetPostCategory($postID,1);
    $contentFromDB = editPostGetPostContent($postID,1);
    
    $defaultTopicSelectionHTML="";
    $defaultTopicSelectionCSS="";
    $defaultTopicSelectionJavaScript="";
    $defaultTopicSelectionCSM="";



    switch ($categoryFromDB) {
        case "HTML":
            $defaultTopicSelectionHTML='selected="selected"';
            break;
        case "CSS":
            $defaultTopicSelectionCSS='selected="selected"';
            break;
        case "Javascript":
            $defaultTopicSelectionJavaScript='selected="selected"';
            break;
        case "Client Server Model":
            $defaultTopicSelectionCSM='selected="selected"';
            break;
        default:
            break;
      }

    


?>
<head>
    <link rel="stylesheet" href="Resources/style.css">
</head>
<main>
    <section>
        <h1 style="font-family: Arial">Learn Web Dev</h1>
    </section>
</main>

<div class="createPost">
            <h2 style="font-family: Arial;color: #292f36">Edit Post</h2>
            <form action="./Resources/PHP/editPost.php" method="post" >
<!--                style="font-family: Arial;color: #292f36"-->
                <input type="hidden" id="postID" name="postID" value="<?php echo $postID;?>">
                <label for ="postTitle">Title of Post</label>
                <input type="text" id="postTitle" name = "postTitle" value="<?php echo $titleFromDB;?>" required>
                <br>
                <label for ="postAuthor">Author of Post</label>
                <input type = "text" id="postAuthor" name="postAuthor" value="<?php echo $authorFromDB;?>"  required>
                <br>
                <label for ="postCategory">Category of Post</label>
                <select name="postCategory" id="postCategory">
                    <option <?php echo $defaultTopicSelectionHTML;?>value="HTML">HTML</option>
                    <option <?php echo $defaultTopicSelectionCSS;?>value="CSS">CSS</option>
                    <option <?php echo $defaultTopicSelectionJavaScript;?>value="Javascript">Javascript</option>
                    <option <?php echo $defaultTopicSelectionCSM;?>value="Client Server Model">Client Server Model</option>
                </select>
                <br>
                <label for ="postContent" >Content of Post</label>
                <textarea id="postContent" name="postContent" required class = "editContentTextbox" ><?php echo $contentFromDB;?></textarea>
                <br>
                <button type="submit" name="submit" class="postsubmitButton">Edit Post</button>
            </form>
            </div>