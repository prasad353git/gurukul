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
if(isset($_POST["ntsubmit"]))
{
  $fnm = $_FILES["name"];
  $dst_db = "ntfac/".$fnm;
  move_uploaded_file($_FILES["ntimages"]["tmp_name"],"./ntfac/".$fnm); 
  $check = mysqli_query($db,"insert into ntfac(name,desg,images) values('$_POST[ntname]','$_POST[ntdesg]','$dst_db')");  // inserting into db
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
<h2>Non-Teaching Staff</h2>
<form method="post" enctype="multipart/form-data">
  
  <label for="ntname">Enter Name</label>
  <input type="text" name="ntname" id="ntname" placeholder="Enter Name" />

  <label for="ntdesg">Designation</label>
  <input type="text" name="ntdesg" id="ntdesg" placeholder="Enter Designation" />

  <label for="ntimage">Select Image</label>
  <input type="file" name="ntimages" id="ntimage" Required>

  <input type="submit" name="ntsubmit" value="Upload">			

</form><hr/>
<?php mysqli_close($db);?>  <!-- close connection -->
</body>
</html>