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
    <title>Papers</title>
    <style>
        fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
        select{width:50%; height:7%; border-radius:5px;}
        .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
        .right{float:right;} .left{float:left;}
        .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    </style>
</head>
<body>
    <h1 class="h1">Papers</h1>
    <form method="post">
        <div>
            <br>
            <input type="submit" value="Dashboard" name="dash" class="mybtn left" />
            <input type="submit" value="logout" name="logout" class="mybtn right" />
            <br><br><br><br>
        </div>
    </form> 
    <center>
    <fieldset>
        <legend>Previous Papers</legend>
        <?php    
            if($result && mysqli_num_rows($result)>0)
            {
                $userinfo=mysqli_fetch_assoc($result);
                
                if($userinfo['desg']==1)
                {
        ?>
                    <form method="POST">
                        <h3>Select the class and subject to display the Papers</h3><br>
                        <select name="class">
                            <option selected disabled>Select Class</option>
                            <option value="1">class1</option>
                            <option value="2">class2</option>
                            <option value="3">class3</option>
                            <option value="4">class4</option>
                            <option value="5">class5</option>
                            <option value="6">class6</option>
                            <option value="7">class7</option>
                            <option value="8">class8</option>
                            <option value="9">class9</option>
                            <option value="9">class10</option>
                        </select><br><br>
                        <select name="sub">
                            <option selected disabled>Select Subject</option>
                            <option value="psam">Samskrutam</option>
                            <option value="pkan">Kannada</option>
                            <option value="phin">Hindi</option>
                            <option value="peng">English</option>
                            <option value="ppe">Physical Education</option>
                            <option value="pmaths">Mathemetics</option>
                            <option value="pscience">Science</option>
                            <option value="pss">Social Science</option>
                            <option value="pes">Environmental Science</option>
                            <option value="pcs">Computer Science</option>
                        </select><br><br>                      
                        <input type="submit" name="submit" value="Display" class="mybtn" />
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
                                    
                                    
                                </p>
        <?php
                            } 
                        }
                }
                elseif($userinfo['desg']==4)
                {
        ?>
                    <form method="POST">  
                        <h4>Select the Subject</h4>
                        <select name="sub">
                            <option selected disabled>Select Subject</option>
                            <option value="psam">Samskrutam</option>
                            <option value="pkan">Kannada</option>
                            <option value="phin">Hindi</option>
                            <option value="peng">English</option>
                            <option value="ppe">Physical Education</option>
                            <option value="pmaths">Mathemetics</option>
                            <option value="pscience">Science</option>
                            <option value="pss">Social Science</option>
                            <option value="pes">Environmental Science</option>
                            <option value="pcs">Computer Science</option>
                        </select><br><br>                      
                        <input type="submit" name="submit" value="Display" class="mybtn" />
                    </form>
                <?php  
                    if(isset($_POST['submit']))  
                    {  
                        $class = $userinfo['class'];  
                        $sub = $_POST['sub'];  
                        $dir =  $class.$sub;  
                        $files = scandir($dir);
                        for( $a = 2 ; $a < count($files); $a++)
                            {
                ?>
                                <p>
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                                    <a href="<?php echo $dir; ?>/<?php echo $files[$a];?>"  download="<?php echo $files[$a]; ?>">Download</a>   
                                </p>
    <?php
                            } 
                    }
                }
            }
    ?>
    </fieldset>
    </center>
</body>
