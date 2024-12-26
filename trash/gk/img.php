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
        <title>Upload Images</title>
</head>
<body>
    <center>
		<?php    
			if($result && mysqli_num_rows($result)>0)
			{
				$userinfo=mysqli_fetch_assoc($result);
				
				if($userinfo['desg']==1 || $userinfo['desg']==2)
				{
		?>  
					<form method="POST" action="gallery.php" enctype="multipart/form-data">
						<input type="file" name="file"/>
						<input type="submit" value="Upload"/>
					</form>
				<?php  
					$files = scandir("gallery");
					for( $a = 2 ; $a < count($files); $a++)
						{
				?>
							<p>
								<a href="delete.php?name=gallery/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>
								<a href="gallery/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
							</p>
			<?php
						} 
				}
			}
			?> 

    </center>
</body>   
</html>