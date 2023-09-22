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
//Creating a sql query
$sql="SELECT *FROM ARTICLES ORDER BY ID;";


//Sending sql query to database
$results=mysqli_query($conn,$sql);


//Checking
if($results===false)
    echo mysqli_error($conn);
else
{
    //Fetches results in assoc array and stored it in articles
    $articles=mysqli_fetch_all($results,MYSQLI_ASSOC);  
}
?>

<?php require "requires/header.php";?>
    <main>
        <?php if (empty($articles)):?>
            <h2>No articles found.</h2>
        <?php else:?>
            <ul>
                <?php foreach ($articles as $article):?>
                    <li>
                        <article>
                            <h2><a href="article.php?ID=<?=$article['ID'];?>"><?=$article['TITLE'];?></h2>
                            <p><?=$article['CONTENT'];?></p>
                        </article>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
<?php require "requires/footer.php"; ?>
