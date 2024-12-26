<html>  
<body> 
<form method="POST" >
    <input type="radio" name="class" value="1" />class<br><br>   
    <input type="radio" name="sub" value="s" />subject<br><br> 
    <input  type="submit" name="submit" value="Display"><br><br>
    </form> 
    <form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file"/>
    <input type="submit" value="Upload"/>
</form>
    <?php  
        if(isset($_POST['submit']))  
        {  
            $class = $_POST['class'];  
            $sub = $_POST['sub'];  
            $dir =  $class.$sub;   
            echo $dir;  
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
    ?>
</body>  
</html> 
