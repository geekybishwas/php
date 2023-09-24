<?php

require "requires/database.php";

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
            if($publishedDataTime=="")
            {
                $publishedDataTime=null;
            }
            //Binding
            mysqli_stmt_bind_param($stmt,"isss",$id,$title,$content,$publishedDataTime);

            //Execute the preapredStatement using execute Funtion,when we call this function when the database server inserts the values into the sql
            // If this function return true, then it works
            if(mysqli_stmt_execute($stmt)){
                
                /*Redirect to article page
                header("Location: article.php?ID=$id");
                exit;*/
                if ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS']!='off')){
                    $protocol='https';
                }
                else
                {
                    $protocol='http';
                }
                //$_SERVER['HTTP_HOST'] gives the server name
                header("Location: $protocol://" .$_SERVER['HTTP_HOST'] ."/article.php?ID=$id");
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
<?php require "requires/articleForm.php";?>


<?php require "requires/footer.php"; ?>