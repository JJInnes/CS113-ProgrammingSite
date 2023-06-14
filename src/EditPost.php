<?php


$titleFromDB= "Learning Web Development";
$authorFromDB= "Reece Laiolo";
$categoryFromDB= "HTML";
$contentFromDB= "This is an example article to edit.";
?>
<head>
    <link rel="stylesheet" href="Resources/style.css">
</head>
<main>
    <section>
        <h1 style="font-family: Arial">Learn Web Dev</h1>
    </section>
    <section style="background-color: #5E6CFF; color: white;">
        <nav>
            <a href="index.php">Home</a>
            <a href="articles.php?topic=HTML&article=0">HTML</a>
            <a href="articles.php?topic=css&article=0">CSS</a>
            <a href="articles.php?topic=javascript&article=0">JavaScript</a>
            <a href="articles.php?topic=Client_Server_Model&article=0">Client Server Model</a>
        </nav>

    </section>






</main>

            <div class="createPostPage">
            <h2 style="font-family: Arial;color: #292f36">Edit Post</h2>
            <form action="index.php" method="post" >
<!--                style="font-family: Arial;color: #292f36"-->
                <label for ="postTitle">Title of Post</label>
                <input type="text" id="postTitle" name = "postTitle" value="<?php echo $titleFromDB;?>" required>

                <label for ="postAuthor">Author of Post</label>
                <input type = "text" id="postAuthor" name="postAuthor" value="<?php echo $authorFromDB;?>" required>

                <label for ="postCategory">Category of Post</label>
                <input type="text" id="postCategory" name="postCategory" value="<?php echo $categoryFromDB;?>" required>

                <label for ="postContent">Content of Post</label>
                <textarea id="postContent" name="postContent" required><?php echo $contentFromDB;?></textarea>

                <button type="submit" name="submit" class="postsubmitButton">Create</button>
            </form>
            </div>


