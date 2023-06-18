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
<?php
    include 'Resources/helper.php';

    if(isset($_POST['submit'])){
        $title = strip_tags($_POST['postTitle']);
        $author = strip_tags($_POST['postAuthor']);
        $category = strip_tags($_POST['postCategory']);
        $content = strip_tags($_POST['postContent']);

        addPost($title,$author,$category,$content);

//        echo '<script type="text/javascript">';
//        echo ' alert("New Post added to the database!")';
//        echo '</script>';

    }
?>
            <!--<div class="createPostPage">-->
            <h2 style="font-family: Arial;color: #292f36">Create new Post</h2>

            <form action="" method="post" >
<!--                style="font-family: Arial;color: #292f36"-->
                <label for ="postTitle">Title of Post</label>
                <input type="text" id="postTitle" name = "postTitle" required>

                <label for ="postAuthor">Author of Post</label>
                <input type = "text" id="postAuthor" name="postAuthor" required>

                <label for ="postCategory">Category of Post</label>
                <input type="text" id="postCategory" name="postCategory" required>

                <label for ="postContent">Content of Post</label>
                <textarea id="postContent" name="postContent" required></textarea>

                <button type="submit" name="submit" class="postsubmitButton">Create</button>
            </form>
            <!--</div>-->


