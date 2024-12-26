<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
    
    if(mysqli_error($con))      
    echo "<br>Error = ".mysqli_error($con);

    if(isset($_POST['logout'])) 
    {
        session_destroy();
        header('Location: index.php');
    }
?>

<?php    
if($result && mysqli_num_rows($result)>0)
{
    $userinfo=mysqli_fetch_assoc($result);
    
    if($userinfo['desg']==3)
    {
?>


    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" value="Upload"/>
    </form>



    <?php
        $files = scandir("uploads");
        for( $a = 2 ; $a < count($files); $a++)
        {
    ?>
            <p>
                <a href="uploads/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                <a href="uploads/<?php echo $files[$a];?>"  download="<?php echo $files[$a]; ?>">Download</a>
                <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>
            </p>
    <?php
        }
    ?>

<?php 
    }

    else{
        ?>

            <?php
                    $files = scandir("uploads");
                    for( $a = 2 ; $a < count($files); $a++)
                    {
                ?>
                        <p>
                            <a href="uploads/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                            <a href="uploads/<?php echo $files[$a];?>"  download="<?php echo $files[$a]; ?>">Download</a>
                        </p>
                <?php
                    }
                ?>

  <?php  }

}
?>
