<!DOCTYPE html>
<html>
<head>
  <title>faculty</title>
</head>
<body>

<?php
//connecting to db-------------------------------------------------------------
$db = mysqli_connect("localhost","root","12345678","test");
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
//------------------------------------------------------------------------------
if(isset($_POST["submit"]))
{
    $fnm = $_FILES["image"]["name"];
    $dst_db = "all_images/".$fnm;
    move_uploaded_file($_FILES["image"]["tmp_name"],"./all_images/".$fnm); 
    $check = mysqli_query($db,"insert into tbltest(fname,images) values('$_POST[fname]','$dst_db')");  // inserting into db
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
<h2>Insert Data</h2>
<form method="post" enctype="multipart/form-data">
  <table border="2">
    <tr>
      <td>Enter Name</td>
      <td><input type="text" name="fname" placeholder="Enter Name" Required></td>
    </tr>
    <tr>
      <td>Select Image</td>
      <td><input type="file" name="image" Required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Upload"></td>			
    </tr>
  </table>
</form><hr/>
<?php mysqli_close($db);?>  <!-- close connection -->
</body>
</html>