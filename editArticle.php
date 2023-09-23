<?php

require "requires/database.php";

$conn=getDB();
if(isset($_GET['ID']))
{
    $id=$_GET['ID'];
    $sql="SELECT *FROM ARTICLES WHERE ID=?";

    $stmt=mysqli_prepare($conn,$sql);

    if($stmt===false)
    {
        echo mysqli_error();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,'i',$id);

        $article=mysqli_fetch_assoc($stmt);

        // $id1=$article['ID'];
        $title1=$article['TITLE'];
        $content1=$article['CONTENT'];
        $publish=$article['PUBLISHED'];
    }
}
?>
<?php require "requires/header.php"; ?>

<h1>Editing Article</h1>
<?php require "requires/articleForm.php";?>


<?php require "requires/footer.php"; ?>
