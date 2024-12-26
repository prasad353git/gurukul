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
    <title>Results</title>
    <style>
        fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
        select{width:50%; height:7%; border-radius:5px;}
        table{border-radius:15px; border-color:orange; color:blue;}
        th,td{border-radius:5px;  text-align: center;padding:0.5%;}
        input[type=number], select { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
        .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
        .right{float:right;} .left{float:left;}
        .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    </style>
</head>
<body>

<div class="main">
    <center> <br>
        <h1 class="h1">Results</h1>
        <form method="post">
            <div>
                <br>
                <input type="submit" value="Dashboard" name="dash" class="mybtn left" />
                <input type="submit" value="logout" name="logout" class="mybtn right" />
                <br><br><br><br>
            </div>
        </form>  
    <?php    
    if($result && mysqli_num_rows($result)>0)
    {
        $userinfo=mysqli_fetch_assoc($result);
        
        if($userinfo['desg']==1)
        {
    ?>
        <fieldset>
            <legend>Show Results</legend>
            <form method="post">
                              
                <select name="class">
                <h4>Enter the class</h4>
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
            <input type="submit" name="result" value="Show Result" class="mybtn" /><br><br>
        <?php  
            $class=$_POST['class'];
            $result=mysqli_query($con,"SELECT `s1`, `s2`, `s3`, `s4`, `s5`, `s6`,`rno`, `total` FROM `result` WHERE `class`='$class'");
            if(isset($_POST['result']))
            {
        ?>
                <table border=3>
                <th>Roll No</th>
                <th>subject 1</th>
                <th>subject 2</th>
                <th>subject 3</th>
                <th>subject 4</th>
                <th>subject 5</th>
                <th>subject 6</th>
                <th>Total Marks</th> 
        <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    $s1 = $row['s1'];
                    $s2 = $row['s2'];
                    $s3 = $row['s3'];
                    $s4 = $row['s4'];
                    $s5 = $row['s5'];
                    $s6 = $row['s6'];
                    $rno = $row['rno'];
                    $total = $row['total'];
        ?>
                    <tr><td border=2><?php echo $rno;?></td>
                        <td border=2><?php echo $s1;?></td>
                        <td border=2><?php echo $s2;?></td>
                        <td border=2><?php echo $s3;?></td>
                        <td border=2><?php echo $s4;?></td>
                        <td border=2><?php echo $s5;?></td>
                        <td border=2><?php echo $s6;?></td>
                        <td border=2><?php echo $total;?></td>
        <?php 
                }
            } 
        ?>              
                    </tr>
                </table>
            </fieldset>
        </form>  
        <?php
            if(mysqli_num_rows($result)==0)
            {
                echo "no results";
            }
        }

        if($userinfo['desg']==4)
        {
    ?>
            <form method="post">
                <fieldset>
                    <legend>Show Result</legend>
                    <input type="number" name="rno" placeholder="Roll No" /><br><br>
                    <input type="submit" name="show" value="Show Result" class="mybtn" />
            <br><br>
    <?php  
            $class = $userinfo['class'];
            $rno=$_POST['rno'];
            $result=mysqli_query($con,"SELECT `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `total` FROM `result` WHERE `rno`='$rno' and `class`='$class'");
            while($row = mysqli_fetch_assoc($result))
            {
                $s1 = $row['s1'];
                $s2 = $row['s2'];
                $s3 = $row['s3'];
                $s4 = $row['s4'];
                $s5 = $row['s5'];
                $s6 = $row['s6'];
                $total = $row['total'];
                if(isset($_POST['show']))
                {
                ?>
                    <p>  Roll No : <?php echo $rno;?></p><hr>
                    <p>Subject 1 : <?php echo $s1;?></p>
                    <p>Subject 2 : <?php echo $s2;?></p>
                    <p>Subject 3 : <?php echo $s3;?></p>
                    <p>Subject 4 : <?php echo $s4;?></p>
                    <p>Subject 5 : <?php echo $s5;?></p>
                    <p>Subject 6 : <?php echo $s6;?></p><hr>
                <?php 
                    echo '<p>Total Marks:&nbsp'.$total.'</p>';
                }
            }
        ?>   
            </fieldset>
            </form>
        <?php
            if(mysqli_num_rows($result)==0)
            {
                echo "no results";
            }
        }
    }
    ?>