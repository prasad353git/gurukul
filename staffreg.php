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

    if(isset($_POST['search']))
      {
        $id=$_POST['id'];
      }
    if(isset($_POST['join']))
      {		
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $dob = $_POST['dob'];
          $gender = $_POST['gender'];
          $phno = $_POST['phno'];
          $email = $_POST['email'];
          $adrs = $_POST['adrs'];
          $padrs = $_POST['padrs'];
          $ano = $_POST['ano'];
          $qual = $_POST['qual'];
          $pwd = $_POST['pwd'];
          $desg = $_POST['desg'];
                  
          $insert = "INSERT INTO staff(fname,lname,dob,gender,phno,email,adrs,padrs,ano,qual,pwd,desg) VALUES ('$fname','$lname','$dob','$gender','$phno','$email','$adrs','$padrs','$ano','$qual','$pwd','$desg')";
          $insert=mysqli_query($con,$insert);
          if(!$insert)
          {
              echo mysqli_error($con);
          }

          $insert1 = "INSERT INTO users( email,pwd,desg) VALUES ( '$email','$pwd','$desg')";
          $insert1=mysqli_query($con,$insert1);
          if(!$insert1)
          {
              echo mysqli_error($con);
          }
          $insert2 = "INSERT INTO staffbckup(fname,lname,dob,gender,phno,email,adrs,padrs,ano,qual,pwd,desg) VALUES ('$fname','$lname','$dob','$gender','$phno','$email','$adrs','$padrs','$ano','$qual','$pwd','$desg')";
          $insert2=mysqli_query($con,$insert2);
          if(!$insert2)
          {
              echo mysqli_error($con);
          }
          else
          {
            $sid=mysqli_insert_id($con);
              //mysqli_close($con); // Close connection
          }
      }
      if(isset($_POST['edit'])) // when click on Update button
        {
          $id = $_POST['id'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $dob = $_POST['dob'];
          $gender = $_POST['gender'];
          $phno = $_POST['phno'];
          $email = $_POST['email'];
          $adrs = $_POST['adrs'];
          $padrs = $_POST['padrs'];
          $ano = $_POST['ano'];
          $qual = $_POST['qual'];
          $pwd = $_POST['pwd'];
          $desg = $_POST['desg'];
          
            $edit = mysqli_query($con,"update staff set  fname='$fname' ,lname = '$lname',dob = '$dob',gender = $gender,phno = '$phno', email = '$email',adrs = '$adrs',padrs = '$padrs',ano = '$ano',qual = '$qual',pwd = '$pwd',desg='$desg' where id='$id'"); 
          
            if($edit)
            {
                mysqli_close($con); // Close connection
                header("location:staffreg.php"); // redirects to all records page
                exit;
            }
            else
            {
                echo mysqli_error($con);
            }    	
        }
      if(isset($_POST['delete'])) // when click on delete button
        {
          $id = $_POST['id'];
          $del = mysqli_query($con,"DELETE from staff where id = '$id'"); // delete query
          echo $del; 
          if($del)
          {
              mysqli_close($con); // Close connection
              header("location:staffreg.php"); // redirects to all records page
              exit;	
          }
          else
          {
            echo mysqli_error($con); // display error message if not delete
          }
        }
      if($id>0)
        {
          
          $query=mysqli_query($con,"SELECT * FROM  staff WHERE id=$id");
          if($query && mysqli_num_rows($query)>0)      
          $info=mysqli_fetch_assoc($query);
        }

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

<!DOCTYPE html>
  <html>
  <head>
  <title>Staff - Register</title>    

  <style>
    * { box-sizing: border-box; }
    body { font-family: Arial, Helvetica, sans-serif; background-color: #fff; }
    input[type=text],[type=number], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
    label { padding: 12px 12px 12px 0; display: inline-block; }
    fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
    .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
    .container { border-radius: 5px; padding: 20px; padding-left: 5%; }
    .col-15 { float: left; width: 15%; margin-top: 6px; }
    .col-65 { float: left; width: 65%; margin-top: 6px; }
    .row:after { content: ""; display: table; clear: both; }
    .right{float:right;} .left{float:left;}
    .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    
  </style>
  </head>
  <body>
  <?php    
    if($result && mysqli_num_rows($result)>0)
    {
        $userinfo=mysqli_fetch_assoc($result);
        
        if($userinfo['desg']==1)
        {
  ?>
          <br>
          <h1 class="h1">Staff - Register</h1>
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
              <legend>Search & Update</legend>
              <div class="container">
                <form method="post">
                  <div class="row">
                    <div class="col-15">
                      <label for="id">Id</label>
                    </div>
                    <div class="col-65">
                      <input type="number" id="id" name="id" placeholder="ID" value="<?php echo $info['id']; ?>" />
                    </div> 
                  </div><br>
                    <input type="submit" value="Search" name="search" class="mybtn" />
            </fieldset>
            <fieldset>
                  <legend>Admit Staff</legend>
                  <br>  
                  <div class="row">
                      <div class="col-15">
                        <label for="fname">First Name</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $info['fname']; ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                      <label for="lname">Last Name</label>
                    </div>
                    <div class="col-65">
                      <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $info['lname']; ?>">
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="dob">Date of Birth</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="dob" name="dob" placeholder="YYYY-MM-DD" value="<?php echo $info['dob']; ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="gender">Gender</label>
                      </div>
                      <div class="col-65">
                        <select name="gender">
                          <option selected disabled>Select Gender</option>
                          <option id="gender" name="gender" value="1" <?php echo ($info['gender']==1?'selected="selected"':''); ?>>Male</option>
                          <option id="gender" name="gender" value="0" <?php echo ($info['gender']==0?'selected="selected"':''); ?>>Female</option>           
                        </select>
                      </div>
                  </div>          
                  <div class="row">
                      <div class="col-15">
                        <label for="phno">Phone Number</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="fname" name="phno" placeholder="Phone Number" value="<?php echo $info['phno'];?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="email">E-mail</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="email" name="email" placeholder="E-mail" value="<?php echo $info['email']; ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="subject">Address</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="subject" name="adrs" placeholder="Address" style="height:100px" value="<?php echo $info['adrs']; ?>"></input>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="padrs">Permanent Address</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="padrs" name="padrs" placeholder="Permanent address" style="height:100px"value="<?php echo $info['padrs'];?>"></input>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="ano">Adhar Number</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="ano" name="ano" placeholder="Adhar Number" value="<?php echo $info['ano']; ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="qual">Qualification</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="qual" name="qual" placeholder="Qualification" value="<?php echo $info['qual']; ?>">
                      </div>
                  </div>              
                  <div class="row">
                      <div class="col-15">
                        <label for="pwd">Password</label>
                      </div>
                      <div class="col-65">
                        <input type="text" id="pwd" name="pwd" placeholder="Password" value="<?php echo $info['pwd']; ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="desg">Designation</label>
                      </div>
                      <div class="col-65">
                        <select  name="desg">
                          <option selected disabled>Select Designation</option>
                          <option name="desg" value="1" <?php echo ($info['desg']==1?'selected="selected"':''); ?>>Principal</option>
                          <option name="desg" value="2" <?php echo ($info['desg']==2?'selected="selected"':''); ?>>Non Teaching Staff</option>
                          <option name="desg" value="3" <?php echo ($info['desg']==3?'selected="selected"':''); ?>>Teaching Staff</option>           
                        </select>          
                      </div>
                  </div>
                  <div class="row">
                      <br><br>
                    <input type="submit" value="Admit" name="join" class="mybtn" /> &nbsp; &nbsp;
                    <input type="submit" value="Update" name="edit" class="mybtn" /> &nbsp; &nbsp;
                    <input type="submit" value="Delete" name="delete"  class="mybtn" /> &nbsp;
                  </div><br><br>
              </form>
            </div>
          </fieldset>
          </center> 
  <?php
        }
    }
  ?>   
</body>
</html>
