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
<html>
    <head>
    <title>Dash Board</title>
        <style>
           * { box-sizing: border-box; }
            body { font-family: Arial, Helvetica, sans-serif; margin: 0; background-color: #fff; padding-top: 1%; }
            .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
            .right{float:right;} .left{float:left;}
            .mybtn{width:15%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
            .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}            .dash { padding-top: 0.1%; padding-bottom: 0.1%; background-color: #ff0000; color: #fff; }
            .img { padding-top:1%; padding-left:1%; height:30%; width:25%; }
            .container { padding-right: 5%; }
            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {a,img{float: left; width: 300%; height:300%;padding-left:15%;} h1 { width: 100%;  margin-top: 10; }  input[type=submit]{float:right;padding-right:2%;}}
        </style>
    </head>
    <body>      
    <form method="post">
        <h1 class="h1"> Dash Board </h1>
        <div>
            <br>
            <input type="submit" value="logout" name="logout" class="mybtn right">
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
        <a href="wof.php"><img class="img" src="wof.jpg"></img></a>
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