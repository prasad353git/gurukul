<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
  <style>
    table{border-radius:15px; border-color:blue;}
    th,td{border-radius:10px;}
    h1{background:red; color:white; border-radius:15px;}
    input[type=submit]{background:blue; color:white;border:none;border-radius:15px; width:100%;height:150%;}
    input[type=submit]:hover{background:red;}
  </style>
</head>
<body>
  <?php
    require_once "functions.php" ;
    $con=connect_my_db();
    $rec = mysqli_query($con,"SELECT * FROM messages"); 
    $msg = mysqli_fetch_array($rec);
    //------------------------delete message-------------------------------
    if(isset($_POST['mdelete']))
    {
      $id = $msg['id'];
      $del = mysqli_query($con,"delete from messages where id = $id");
    } 
    //----------------------------------------------------------------------
  ?>
  <center><h1>All Messages</h1> </center><form method='post'>
  <table border="3" cellpadding=10>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <td style="font-weight:bold;">Message</th>
        <th>Delete</th>
      </tr> 
    <?php
    $records = mysqli_query($con,"SELECT * FROM messages"); // fetch data from database
    while($data = mysqli_fetch_array($records))
    {
    ?>
      <center>   
        <tr>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><?php echo $data['message']; ?></td>
          <td><input type="submit" name="mdelete" id="mdelete" value="Delete" /></td>
        </tr>	  
      </center>
    <?php
    }
    ?>
  </table></form>
  <?php mysqli_close($con);  // close connection ?>
</body>
</html>