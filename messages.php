<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
  <style>
    table{border-radius:5px; border-color:blue; width:50%;}
    th,td{border-radius:5px; text-align:center; padding:0.1%}
    th{padding:1%;}
    fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
    .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
    .del{background:blue; color:white;border:none;border-radius:15px; width:100%;height:150%;}
    .del[type=submit]:hover{background:red;}
    .right{float:right;} .left{float:left;}
    .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
  </style>
</head>
<body>
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
          header('Location: indexday.php');
      }
         
			if($result && mysqli_num_rows($result)>0)
			{
				$userinfo=mysqli_fetch_assoc($result);
				
				if($userinfo['desg']==1)
				{
		
          $rec = mysqli_query($con,"SELECT * FROM messages"); 
          $msg = mysqli_fetch_array($rec);
          //------------------------delete message-------------------------------
          if(isset($_POST['mdelete']))
          {
            $id = $msg['id'];
            $del = mysqli_query($con,"delete from messages where id = $id");
          } 
          //----------------------------------------------------------------------

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
    <br><h1 class="h1">All Messages</h1>
    <form method="post">
        <div>
            <br>
            <input type="submit" value="Dashboard" name="dash" class="mybtn left" />
            <input type="submit" value="logout" name="logout" class="mybtn right" />
            <br><br><br><br>
        </div>
    </form>  
  <center>
    <form method='post'>
      <fieldset>
        <legend>Messages</legend>
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
              <tr>
                <td><?php echo $data['name']; ?>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $data['email']; ?>&nbsp;&nbsp;</td>
                <td><?php echo $data['message']; ?>&nbsp;&nbsp;</td>
                <td><input type="submit" name="mdelete" id="mdelete" value="Delete" class="del" /></td>
              </tr>	  
          <?php
          }
          ?>
        </table>
    </form>
        <?php mysqli_close($con);  // close connection ?>
    </fieldset>
  </center>  
<?php
        }
    }
?>
</body>
</html>