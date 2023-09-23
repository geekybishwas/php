<?php require "requires/header.php"; ?>

<?php require "requires/database.php"; ?>

<?php

$errors=[];
$title1='';
$content1='';
$publish='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{   
    $publish=$_POST['PUBLISHED'];
    $title1=$_POST['TITLE'];
    $content1=$_POST['CONTENT']; 
    if($_POST['TITLE']==""){
        $errors[]="Title is required";
    }
    if($_POST['CONTENT']==""){
        $errors[]="Content is required";
    }
    if(empty($errors))
    {
        $conn=getDB();
        // var_dump($_POST);
        $id=mysqli_escape_string($conn,$_POST['ID']); //Avoid sql injection
        $title=mysqli_escape_string($conn,$_POST['TITLE']);
        $content=mysqli_escape_string($conn,$_POST['CONTENT']);
        
        $publishedDataTime=mysqli_escape_string($conn,$_POST["PUBLISHED"]);

        //Creating a sql query
        $sql="INSERT INTO ARTICLES VALUES($id,'$title','$content','$publishedDataTime')";

        //Sending sql query to database
        $results=mysqli_query($conn,$sql);


        //Checking
        if($results===false)
            echo mysqli_error($conn);
        else
        {
            header("Location :article.php?ID=$ID");
            exit();
        }
    }
}

?>

<h1>New Article</h1>

<?php require "requires/articleForm.php";?>


<?php require "requires/footer.php"; ?>