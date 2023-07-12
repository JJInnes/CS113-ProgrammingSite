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
                <input type="text" id="postTitle" name = "postTitle" value="" placeholder="<?php echo $titleFromDB;?>" required>
                <br>
                <label for ="postAuthor">Author of Post</label>
                <input type = "text" id="postAuthor" name="postAuthor" value="" placeholder="<?php echo $authorFromDB;?>" required>
                <br>
                <label for ="postCategory">Category of Post</label>
                <select name="postCategory" id="postCategory">
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="Javascript">Javascript</option>
                    <option value="Client Server Model">Client Server Model</option>
                </select>
                <br>
                <label for ="postContent" >Content of Post</label>
                <textarea id="postContent" name="postContent" required class = "editContentTextbox" placeholder="<?php echo $contentFromDB;?>"></textarea>
                <br>
                <button type="submit" name="submit" class="postsubmitButton">Edit Post</button>
            </form>
            </div>