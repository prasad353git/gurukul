<html>
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
        header('Location: indexday.php');
    }
?>
<head>
    <title>Notes</title>
</head>
<body>
    <center>
        <?php    
            if($result && mysqli_num_rows($result)>0)
            {
                $userinfo=mysqli_fetch_assoc($result);
                
                if($userinfo['desg']==3)
                {
        ?>
                    <form method="POST" enctype="multipart/form-data">
                        <h1>Notes</h1> 
                        <h3>Select the class and subject to display the available notes</h3><br>
                        <h4>Select the Class</h4>
                        <input type="radio" name="class" value="1" />1st &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="class" value="2" />2nd &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="class" value="3" />3rd &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="class" value="4" />4th &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="class" value="5" />5th &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="class" value="6" />6th &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="class" value="7" />7th &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="class" value="8" />8th &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="class" value="9" />9th &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="class" value="10" />10th  &nbsp; &nbsp; &nbsp;
                        <hr>   
                        <h4>Select the Subject</h4>
                        <input type="radio" name="sub" value="sam" />Samskrutham &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="sub" value="kan" />Kannada &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="sub" value="hin" />Hindi &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="sub" value="eng" />English &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="sub" value="pe" />Physical Education &nbsp; &nbsp; &nbsp;  <br> <br>   
                        <input type="radio" name="sub" value="maths" />Mathematics &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="sub" value="science" />Science &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="sub" value="social" />Social Science &nbsp; &nbsp; &nbsp;   
                        <input type="radio" name="sub" value="es" />Environmental Science &nbsp; &nbsp; &nbsp; 
                        <input type="radio" name="sub" value="cs" />Computer Science &nbsp; &nbsp; &nbsp;
                        <hr> 
                        <input type="submit" name="submit" value="Display"> <br>
                        <input type="file" name="file"/>&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="upload" value="Upload"> &nbsp;&nbsp;&nbsp;
                    </form>
                <?php  
                    if(isset($_POST['submit']))  
                    {   
                        $class = $_POST['class'];  
                        $sub = $_POST['sub'];  
                        $dir =  $class.$sub;  
                        $files = scandir($dir);
                        for( $a = 2 ; $a < count($files); $a++)
                            {
                ?>
                                <p>
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>"  download="<?php echo $files[$a]; ?>">Download</a>
                                    <a href="delete.php?name=<?php echo $dir; ?>/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>                               
                                </p>
        <?php
                            } 
                    }

                    elseif(isset($_POST['upload']))
                    {
                        $file = $_FILES["file"];
                        $class = $_POST['class'];  
                        $sub = $_POST['sub'];  
                        $dir =  $class.$sub;  
                        $files = scandir($dir);
                        $res= move_uploaded_file($file["tmp_name"], "$dir/" . $file["name"]);
                        
                        if($res)
                        {
                            $files = scandir($dir);
                            echo "<h1>Updated files list</h1>";
                            for( $a = 2 ; $a < count($files); $a++)
                            {
                ?>
                                <p>
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>"  download="<?php echo $files[$a]; ?>">Download</a>
                                    <a href="delete.php?name=<?php echo $dir; ?>/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>                               
                                </p>
                <?php
                            }
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>'; 
                        }
                    }



                }
            }
        ?>