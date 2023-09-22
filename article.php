<?php
// $articles=[
//     [
//         "title"=>"First Post",
//         "content"=>"This is the first of many posts"
//     ],
//     [
//         "title"=>"Another Post",
//         "content"=>"Yet another fasinating post:"
//     ],
//     [
//         "title"=>"Read this!",
//         "content"=>"You must read this now,it's essential reading"
//     ],
//     [
//         "title"=>"The latest news",
//         "content"=>"Here's the latest news,read it now"
//     ]
// ];
?>
<?php

require "requires/database.php";

$conn=getDB();

if(isset($_GET['ID']) && is_numeric($_GET['ID'])){
    //Creating a sql query
    $sql="SELECT *FROM ARTICLES WHERE ID=".$_GET['ID'];


    //Sending sql query to database
    $results=mysqli_query($conn,$sql);


    //Checking
    if($results===false)
        echo mysqli_error($conn);
    else
    {
        //Fetches one row
        $article=mysqli_fetch_assoc($results);
    }
}
else
{
    $article=null;
}
?>
<?php require "requires/header.php";?>
    <main>
        
        <?php if ($article===NULL):?>
            <h2>No articles found.</h2>
        <?php else:?>
            <ul>
                        <article>
                            <h2><?=$article['TITLE'];?></h2>
                            <p><?=$article['CONTENT'];?></p>
                        </article>
            </ul>
        <?php endif;?>

<?php require "requires/footer.php"?>
