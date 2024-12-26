<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM stureg where id=".$_SESSION['userid']);

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
        <style>
           * 
            {
            box-sizing: border-box;
            }

            body 
            {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image:url('palmbg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
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
        <div class="row container" >
            <br><br>
            <input type="submit" value="logout" name="logout" class="orange">
        </div>
    </form>
        <center>
            <div>
               
                <a href="sr.php"><img class="img" src="j5.png"></img></a>
                
                <a href="notes.php"><img class="img" src="j7.jpeg"></img></a>
                <a href="pp.php"><img class="img" src="j8.jpg"></img></a>
                <a href="res.php"><img class="img" src="j9.jpg"></img></a>
            </div>
        </center>
    </body>   
</html>