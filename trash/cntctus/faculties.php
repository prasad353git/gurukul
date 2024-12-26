<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<div class="container py-5">
    <div class="row mt-4">
        <?php
            $db = mysqli_connect("localhost","root","12345678","test");
            if(!$db)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
             $query=mysqli_query($db,"SELECT * FROM tbltest");
             if($query)
             {
                while($row = mysqli_fetch_assoc($query))
                {
                    ?>
                        <div class="col-md-3">
                            <div class="card">
                            <img src="./<?php echo $row['images']; ?>" width="260px" height="200px" alt="Faculty Images">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $row['fname']; ?></h2>
                                    <h3 class="card-title"><?php echo $row['id']; ?></h3>
                                    <p class="card-text">
                                    <h4 class="card-title"><?php echo $row['fname']; ?></h4><br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
             }
             else
             {
                 echo "no faculty found";
             }
        ?>   
    </div>
</div>
        