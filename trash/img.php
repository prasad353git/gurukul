<!DOCTYPE html>
    <html>
        <head>
        <title>image</title>
        </head>
        <body>

            <?php

                require_once "functions.php" ;
                $con=connect_my_db();

                if(isset($_POST["submit"]))
                {
                    $var1 = rand(1111,9999);  // generate random number in $var1 variable
                    $var2 = rand(1111,9999);  // generate random number in $var2 variable
                    
                    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
                    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

                    $dst = "all_images/".$var3;  // storing image path into the {all_images} folder with 32 characters hex number and file name
                    $dst_db = "all_images/".$var3; // storing image path into the database with 32 characters hex number and file name

                    move_uploaded_file($_FILES["image"]["temp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
                    
                    $check = mysqli_query($con,"insert into img(image) values('$dst_db')");  // executing insert query
                        
                    if($check)
                    {
                        echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
                    }
                }
            ?>

                <form method="post" enctype="multipart/form-data">
                <table border="2">
                    <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="image" Required></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Upload"></td>			
                    </tr>
                </table>
                </form>

                <hr/>

                <h2>All Records</h2>

            <table border="2">
            <tr>
                <td>id</td>
                <td>Images</td>
            </tr>

            <?php

            $records = mysqli_query($con,"select * from img"); // fetch data from database

            while($data = mysqli_fetch_array($records))
            {
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                
                <td><img src="<?php echo $data['image']; ?>" width="100" height="100"></td>
            </tr>	
            <?php
            }
            ?>

            </table>

            <?php mysqli_close($con);  // close connection ?>

        </body>
    </html>