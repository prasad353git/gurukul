<html>
<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
    
    if(mysqli_error($con))      
    echo "<br>Error = ".mysqli_error($con);

    if(isset($_POST['dash'])) 
    {
        header('Location: dash.php');
    }

    if(isset($_POST['logout'])) 
    {
        session_destroy();
        header('Location: index.php');
    }
?>

<head>
    <title>Office Room</title>
    <style>
        fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
        input[type=file], select { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
        .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
        .right{float:right;} .left{float:left;}
        .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    </style>	
</head>
<body>
    <center><br>
        <h1 class="h1">Notices</h1>
        <form method="post">
        <div>
            <br>
            <input type="submit" value="Dashboard" name="dash" class="mybtn left" />
            <input type="submit" value="logout" name="logout" class="mybtn right" />
            <br><br><br><br>
        </div>
            <fieldset>
                <legend>Notice</legend><br>
		<?php    
			if($result && mysqli_num_rows($result)>0)
			{
				$userinfo=mysqli_fetch_assoc($result);
				
				if($userinfo['desg']==1)
				{
		?>  
                            
                    <form method="POST" action="notice.php" enctype="multipart/form-data">
                        <input type="file" name="file"/>
                        <input type="submit" value="Upload" class="mybtn" />
                    </form>
                    <?php  
                        $files = scandir("notices");
                        for( $a = 2 ; $a < count($files); $a++)
                            {
                    ?>
                                <p>
                                                            
                                    <a href="delete.php?name=notices/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>
                                    <a href="notices/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp;&nbsp;&nbsp;&nbsp;

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