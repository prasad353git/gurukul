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
<html>
    <head>
    <title>Dash Board</title>
        <style>
           * 
            {
            box-sizing: border-box;
            }

            body 
            {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-color: #fff;
            padding-top: 1%;
            }

            .dash
            {
                padding-top: 0.1%;
                padding-bottom: 0.1%;
                background-color: #ff0000;
                color: #fff;
            }

            .img
            {
                
                padding-top: 1%;
                padding-left: 1%;
                height: 30%;
                width: 25%;
            }

            .container 
            {
                padding-right: 5%;
            }

            input[type=submit]
            {
                background-color: #ff0000;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
            }

            .orange:hover {
			  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			}

        </style>
    </head>
    <body>      
    <form method="post">

        <div class="dash">
           <h2> <center> Dash Board </center> </h2>
        </div>

        <div>
        <br>
            <input type="submit" value="logout" name="logout" class="orange row container">
        </div>
    </form>
    <br><br>
<center>
<div class="dash2">
<?php    
if($result && mysqli_num_rows($result)>0)
{
    $userinfo=mysqli_fetch_assoc($result);
    
    if($userinfo['desg']==1)
    {
?>
        <a href="staffreg.php"><img class="img" src="staffreg.png"></img></a>
        <a href="img.php"><img class="img" src="uploadimage.png"></img></a>
        <a href="details.php"><img class="img" src="details.png"></img></a><br>
        <a href="messages.php"><img class="img" src="mail.png"></img></a>
        <a href="office.php"><img class="img" src="j5.png"></img></a>
        <a href="staff.php"><img class="img" src="j6.png"></img></a><br>
        <a href="notes.php"><img class="img" src="j7.jpeg"></img></a>
        <a href="paper.php"><img class="img" src="j8.jpg"></img></a>
        <a href="res.php"><img class="img" src="j9.jpg"></img></a></img></a><br><br>
        
<?php 
    }
    elseif($userinfo['desg']==2)
    {
 ?> 
        <a href="stureg.php"><img class="img" src="stureg.png"></img></a>       <br>
        <a href="office.php"><img class="img" src="j5.png"></img></a>
        <a href="img.php"><img class="img" src="uploadimage.png"></img></a>
        <a href="details.php"><img class="img" src="details.png"></img></a><br><br>

<?php 
    }
    elseif($userinfo['desg']==3)
    {
 ?> 
        <a href="office.php"><img class="img" src="j5.png"></img></a>
        <a href="upstaff.php"><img class="img" src="j6.png"></img></a>
        <a href="upnotes.php"><img class="img" src="j7.jpeg"></img></a>
        <a href="uppaper.php"><img class="img" src="j8.jpg"></img></a>
        <a href="upres.php"><img class="img" src="j9.jpg"></img></a><br><br>
<?php 
    }
    elseif($userinfo['desg']==4)
    {
?>         
            <a href="office.php"><img class="img" src="j5.png"></img></a>
            <a href="staff.php"><img class="img" src="j6.png"></img></a>       <br>
            <a href="notes.php"><img class="img" src="j7.jpeg"></img></a>
            <a href="paper.php"><img class="img" src="j8.jpg"></img></a>
            <a href="res.php"><img class="img" src="j9.jpg"></img></a><br><br>
<?php 
    }
}
else echo "You don't have permission to access this file !!!";
?>
           
        </center>
</div>
    </body>   
</html>