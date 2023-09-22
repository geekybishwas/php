<?php require "requires/header.php"; ?>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require "requires/database.php";
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
        echo "Inserted record with id: $id ";
    }
}

?>

<h1>New Article</h1>

<form method="post">
    <div>
        <label for="number">ID</label>
        <input type="number" id="number" name="ID">
    </div>
    <div>
        <label for="text">Title</label>
        <input type="text" name='TITLE' placeholder="Article Title">
    </div>
    <div>
        <label for="text">Content</label>
        <textarea name="CONTENT" id="content" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="date">Date and time of Published Article</label>
        <!-- <input type="datetime-local" name="PUBLISHED" id="date"> -->
        <input type="text" name="PUBLISHED" id='dateTime'>
    </div>

    <input type="submit" value="Submit" name="submit" id="submit">
</form>


<?php require "requires/footer.php"; ?>