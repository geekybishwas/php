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

<?php if(!empty($errors)):?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?php endforeach;?>
    </ul>
<?php endif ;?>

<form method="post">
    <div>
        <label for="number">ID</label>
        <input type="number" id="number" name="ID">
    </div>
    <div>
        <label for="text">Title</label>  
        <!--
        htmlspecialchars funtions is to avoid XSS attack
        -->
        <input type="text" name='TITLE' placeholder="Article Title" value="<?=htmlspecialchars($title1);?>">
    </div>
    <div>
        <label for="text">Content</label>
        <textarea name="CONTENT" id="content" cols="30" rows="10"><?=htmlspecialchars($content1);?></textarea>
    </div>
    <div>
        <label for="date">Date and time of Published Article</label>
        <!-- <input type="datetime-local" name="PUBLISHED" id="date"> -->
        <input type="text" name="PUBLISHED" id='dateTime' value="<?=htmlspecialchars($publish);?>">
    </div>

    <input type="submit" value="Submit" name="submit" id="submit">
</form>


<?php require "requires/footer.php"; ?>