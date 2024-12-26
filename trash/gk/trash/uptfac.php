<!DOCTYPE html>
<html>
<head>
  <title>faculty</title>
</head>
<body>

<?php
//connecting to db-------------------------------------------------------------
$db = mysqli_connect("localhost","root","12345678","gurukul");
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
//------------------------------------------------------------------------------
if(isset($_POST["tsubmit"]))
{
    $fnm = $_FILES["images"]["name"];
    $dst_db = "tfac/".$fnm;
    move_uploaded_file($_FILES["images"]["tmp_name"],"./tfac/".$fnm); 
    $check = mysqli_query($db,"insert into tfac(name,desg,sdesg,images) values('$_POST[name]','$_POST[desg]','$_POST[sdesg]','$dst_db')");  // inserting into db
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
      <td><input type="text" name="name" placeholder="Enter Name" Required></td>
    </tr>
    <tr>
      <td>Designation</td>
      <td><input type="text" name="desg" placeholder="Enter Designation" Required></td>
    </tr>
    <tr>
      <td>Subject/Post</td>
      <td><input type="text" name="sdesg" placeholder="Enter Subject/Post" Required></td>
    </tr>
    <tr>
      <td>Select Image</td>
      <td><input type="file" name="images" Required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Upload"></td>			
    </tr>
  </table>
</form><hr/>
<?php mysqli_close($db);?>  <!-- close connection -->
</body>
</html>