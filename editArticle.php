<?php

require "requires/database.php";

require "requires/articleFunction.php";
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

        if(mysqli_stmt_execute($stmt))
        {
            $result=mysqli_stmt_get_result($stmt);

            $article=mysqli_fetch_assoc($result);

            if($article){

                $id1=$article['ID'];
                $title1=$article['TITLE'];
                $content1=$article['CONTENT'];
                $publish=$article['PUBLISHED'];
            }
            else{
                die("Article not found");
            }
        }
    }
}
else
{
    die("ID not supplied, article not found");
}

//Editing the
$errors=[];
$id='';
$title='';
$content='';
$publishedDataTime='';
// echo $_SERVER['HTTPS'];  //Gives the server name
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id=$_POST['ID'];
    $title=$_POST['TITLE'];
    $content=$_POST['CONTENT'];
    $publishedDataTime=$_POST["PUBLISHED"];
    
    $errors=validateForm($title,$content,$publishedDataTime);

    if(empty($errors))
    {

        $sql="UPDATE ARTICLES SET TITLE=?,CONTENT=?,PUBLISHED=? WHERE ID=?";

        $stmt=mysqli_prepare($conn,$sql);

        if($stmt===false)
        {
            echo mysqli_error($conn);
        }
        else
        {
            if($publishedDataTime=="")
            {
                $publishedDataTime=null;
            }
            else
            {
                mysqli_stmt_bind_param($stmt,'isss',$id,$title,$content,$publishedDataTime);

                $result=mysqli_stmt_get_result($stmt);

                $article=mysqli_fetch_assoc($result);

                var_dump($article);

                exit;

                if(mysqli_stmt_execute($stmt)){
                
                    if((isset($_SERVER['HTTPS'])) && $_SERVER['HTTPS']!='off'){
                        $protocol='https';
                    }
                    else
                    {
                        $protocol='http';
                    }
                    header("Location: $protocol://" .$_SERVER['HTTP_HOST'] ."/article.php?ID=$id");
                    exit;
                }
                else
                {
                    echo mysqli_stmt_error($stmt);
                }
            }
        }

    }
}
?>
<?php require "requires/header.php"; ?>

<h1>Edit Article</h1>
<?php require "requires/articleForm.php";?>


<?php require "requires/footer.php"; ?>
