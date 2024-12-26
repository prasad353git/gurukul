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
        header('Location: index.php');
    }
?>

    <head>
        <title>Office Room</title>
</head>
<body>
    <center>
		<?php    
			if($result && mysqli_num_rows($result)>0)
			{
				$userinfo=mysqli_fetch_assoc($result);
				
				if($userinfo['desg']==1)
				{
		?>  
                            
                    <form method="POST" action="notice.php" enctype="multipart/form-data">
                        <input type="file" name="file"/>
                        <input type="submit" value="Upload"/>
                    </form>
                    <?php  
                        $files = scandir("notices");
                        for( $a = 2 ; $a < count($files); $a++)
                            {
                    ?>
                                <p>
                                                            
                                    <a href="delete.php?name=notices/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>
                                    <a href="notices/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp

                                </p>
                <?php
                            } 
                }
                    
                elseif($userinfo['desg']>1)
                {  
                    $files = scandir("notices");
                    for( $a = 2 ; $a < count($files); $a++)
                        {
                ?>
                            <p>
                                <a href="notices/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                            </p>
            <?php
                        } 
                }
            }
            ?> 

    </center>
</body>   
</html>