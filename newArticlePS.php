<?php

require "requires/database.php";

$errors=[];
$id='';
$title='';
$content='';
$publishedDataTime='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id=$_POST['ID'];
    $title=$_POST['TITLE'];
    $content=$_POST['CONTENT'];
    $publishedDataTime=$_POST["PUBLISHED"];
    if($title==""){
        $errors[]="Title is required";
    }
    if($content==""){
        $errors[]="Content is required";
    }
    if(empty($errors))
        {
        $conn=getDB();
        // var_dump($_POST);

        //Creating a sql query
        $sql="INSERT INTO ARTICLES VALUES(?,?,?,?)";

        //Prepare it for execution using preapre function
        $stmt=mysqli_prepare($conn,$sql);


        //Checking
        if($stmt===false)
            echo mysqli_error($conn);
        else
        {
            //Binding
            mysqli_stmt_bind_param($stmt,"isss",$id,$title,$content,$publishedDataTime);

            //Execute the preapredStatement using execute Funtion,when we call this function the database server inserts the values into the sql
            // If this function return true, then it works
            if(mysqli_stmt_execute($stmt)){
                echo "Inserted record with id: $id ";
            }
            else
            {
                //To get the id of the inserted article
                // $id=mysqli_insert_id($conn);
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}

?>
<?php require "requires/header.php"; ?>

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
        <input type="text" name='TITLE' placeholder="Article Title" value="<?=$title;?>">
    </div>
    <div>
        <label for="text">Content</label>
        <textarea name="CONTENT" id="content" cols="30" rows="10"><?=$content;?></textarea>
    </div>
    <div>
        <label for="date">Date and time of Published Article</label>
        <!-- <input type="datetime-local" name="PUBLISHED" id="date"> -->
        <input type="text" name="PUBLISHED" id='dateTime' value="<?=$publishedDataTime;?>">
    </div>

    <input type="submit" value="Submit" name="submit" id="submit">
</form>


<?php require "requires/footer.php"; ?>