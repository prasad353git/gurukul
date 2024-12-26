<?php 
    require_once "functions.php" ;
    $con=connect_my_db();
    if(isset($_GET['p']))
      {
        $id=$_GET['p'];
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
                  
          $insert = "INSERT INTO staff(fname,lname,dob,gender,phno,email,adrs,padrs,ano,qual,pwd,desg) VALUES ('$fname','$lname','$dob',$gender,'$phno','$email','$adrs','$padrs','$ano','$qual','$pwd','$desg')";
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
          $insert2 = "INSERT INTO staffbckup(fname,lname,dob,gender,phno,email,adrs,padrs,ano,qual,pwd,desg) VALUES ('$fname','$lname','$dob',$gender,'$phno','$email','$adrs','$padrs','$ano','$qual','$pwd','$desg')";
          $insert2=mysqli_query($con,$insert2);
          if(!$insert)
          {
              echo mysqli_error($con);
          }
          else
          {
            $sid=mysqli_insert_id($con);
              mysqli_close($con); // Close connection
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
        $del = mysqli_query($con,"delete from staff where id = $id"); // delete query
        echo $del; 
        if($del)
        {
            mysqli_close($con); // Close connection
            header("location:staffreg.php"); // redirects to all records page
            exit;	
        }
        else
        {
            echo "Error deleting record"; // display error message if not delete
        }
      }
    if($id>0)
      {
        
        $query=mysqli_query($con,"SELECT * FROM  staff WHERE id=$id");
        if($query && mysqli_num_rows($query)>0)      
        $info=mysqli_fetch_assoc($query);
      }

?>

<!DOCTYPE html>
  <html>
  <head>
  <title>Staff - Register</title>    

  <style>
    * 
    {
      box-sizing: border-box;
    }

    body 
    {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #fff;
    }


    input[type=text], select, textarea 
    {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label 
    {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit]
    {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: left;
    }

    input[type=submit]:hover 
    {
      background-color: #45a049;
    }


    .h1
    {
    padding-top: 0.2%;
    text-align: center;
    }

    .container 
    {
      border-radius: 5px;
      padding: 20px;
      padding-left: 5%;
    }

    .col-15 
    {
      float: left;
      width: 15%;
      margin-top: 6px;
    }

    .col-65 
    {
      float: left;
      width: 65%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after 
    {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) 
    {
      .col-15, .col-65, input[type=submit] 
      {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
  </head>
  <body>

  <h1 class="h1">Staff - Register</h1>

  <div class="container">
    <form method="post">

    <div class="row">
            <div class="col-15">
              <label for="id">Id</label>
            </div>
            <div class="col-65">
              <input type="text" id="id" name="id" placeholder="Id" value="<?php echo $id; ?>" >
            </div>
        </div>  
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
            <label for="fname">Date of Birth</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="dob" placeholder="YYYY-MM-DD" value="<?php echo $info['dob']; ?>">
          </div>
      </div>
      <div class="row">
          <div class="col-15">
            <label for="fname">Gender</label>
          </div>
          <div class="col-65">
            <input type="radio" id="fname" name="gender" value="1" <?php echo ($info['gender']==1?'checked="checked"':''); ?>/>Male
            <input type="radio" name="gender" value="0" <?php echo ($info['gender']==0?'checked="checked"':''); ?>/>Female
          </div>
      </div>
      
      <div class="row">
          <div class="col-15">
            <label for="fname">Phone Number</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="phno" placeholder="Phone Number" value="<?php echo $info['phno'];?>">
          </div>
      </div>

      <div class="row">
          <div class="col-15">
            <label for="fname">E-mail</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="email" placeholder="E-mail" value="<?php echo $info['email']; ?>">
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
            <label for="fname">Adhar Number</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="ano" placeholder="Adhar Number" value="<?php echo $info['ano']; ?>">
          </div>
      </div>

      <div class="row">
          <div class="col-15">
            <label for="fname">Qualification</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="qual" placeholder="Qualification" value="<?php echo $info['qual']; ?>">
          </div>
      </div>
          
      <div class="row">
          <div class="col-15">
            <label for="fname">Password</label>
          </div>
          <div class="col-65">
            <input type="text" id="fname" name="pwd" placeholder="Password" value="<?php echo $info['pwd']; ?>">
          </div>
      </div>
      <div class="row">
          <div class="col-15">
            <label for="fname">Designation</label>
          </div>
          <div class="col-65">
              <input type="radio" name="desg" value="1" <?php echo ($info['desg']==1?'checked="checked"':''); ?>/>Principal
              <input type="radio" name="desg" value="2" <?php echo ($info['desg']==2?'checked="checked"':''); ?>/>Non Teaching
              <input type="radio" name="desg" value="3" <?php echo ($info['desg']==3?'checked="checked"':''); ?>/>Teaching           
            </div>
      </div>

      <div class="row">
          <br><br>
        <input type="submit" class="mybtn" value="Join" name="join"> &nbsp;
        <input type="submit" class="mybtn" value="edit" name="edit"> &nbsp;
        <input type="submit" class="mybtn" value="delete" name="delete"> &nbsp;
      </div>
    </form>
  </div>

  </body>
  </html>
