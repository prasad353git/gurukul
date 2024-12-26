<html>  
<body>  
<form method="post">   
<input type="radio" name="class" value="upload" /><br><br>   
<input type="radio" name="sub" value="s" /><br><br>  
<input  type="submit" name="submit" value="Display">  
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