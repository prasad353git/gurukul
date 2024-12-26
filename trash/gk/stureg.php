<?php 
    require_once "functions.php" ;
    $con=connect_my_db();
    if(isset($_GET['q']))
      {
        $sid=$_GET['q'];
      }
      if(isset($_POST['admit']))
      {		
          $sid=$_POST['sid'];
          $rno = $_POST['rno'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $gender = $_POST['gender'];
          $dob = $_POST['dob'];
          $father = $_POST['father'];
          $mother = $_POST['mother'];
          $pno = $_POST['pno'];
          $sno = $_POST['sno'];
          $adrs = $_POST['adrs'];
          $padrs = $_POST['padrs'];
          $fdes = $_POST['fdes'];
          $mdes = $_POST['mdes'];
          $ano = $_POST['ano'];
          $email = $_POST['email'];
          $religion = $_POST['religion'];
          $caste = $_POST['caste'];
          $scaste = $_POST['scaste'];
          $tc = $_POST['tc'];
          $ccer = $_POST['ccer'];
          $icer = $_POST['icer'];
          $pwd = $_POST['pwd'];

          $insert = "INSERT INTO stureg( rno,fname,lname,gender,dob,father,mother,pno,sno,adrs, padrs,fdes,mdes,ano,email,religion,caste,scaste,tc,ccer,icer,pwd) VALUES ( '$rno','$fname','$lname','$gender', '$dob','$father','$mother','$pno','$sno','$adrs','$padrs','$fdes','$mdes','$ano','$email', '$religion','$caste', '$scaste','$tc ','$ccer','$icer', '$pwd')";
          $insert=mysqli_query($con,$insert);
          if(!$insert)
          {
              echo mysqli_error($con);
          }
        
          $insert1 = "INSERT INTO users(email,pwd,desg) VALUES ('$email','$pwd','4')";
          $insert1=mysqli_query($con,$insert1);
          if(!$insert1)
          {
              echo mysqli_error($con);
          }
          $insert2 = "INSERT INTO stubckup( rno,fname,lname,gender,dob,father,mother,pno,sno,adrs, padrs,fdes,mdes,ano,email,religion,caste,scaste,tc,ccer,icer,pwd) VALUES ( '$rno','$fname','$lname','$gender', '$dob','$father','$mother','$pno','$sno','$adrs','$padrs','$fdes','$mdes','$ano','$email', '$religion','$caste', '$scaste','$tc ','$ccer','$icer', '$pwd')";
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
          $sid=$_POST['sid'];
          $rno = $_POST['rno'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $gender = $_POST['gender'];
          $dob = $_POST['dob'];
          $father = $_POST['father'];
          $mother = $_POST['mother'];
          $pno = $_POST['pno'];
          $sno = $_POST['sno'];
          $adrs = $_POST['adrs'];
          $padrs = $_POST['padrs'];
          $fdes = $_POST['fdes'];
          $mdes = $_POST['mdes'];
          $ano = $_POST['ano'];
          $email = $_POST['email'];
          $religion = $_POST['religion'];
          $caste = $_POST['caste'];
          $scaste = $_POST['scaste'];
          $tc = $_POST['tc'];
          $ccer = $_POST['ccer'];
          $icer = $_POST['icer'];
          $pwd = $_POST['pwd'];
        
          $edit = mysqli_query($con,"update stureg set rno='$rno', fname='$fname' ,lname = '$lname',gender = '$gender',dob = '$dob',father = '$father',mother = '$mother',pno = '$pno',sno = '$sno',adrs = '$adrs',padrs = '$padrs',fdes = '$fdes',mdes = '$mdes',ano = '$ano', email = '$email',religion = '$religion',caste = '$caste',scaste = '$scaste', tc = '$tc', ccer = '$ccer',icer = '$icer',pwd = '$pwd' where sid='$sid'"); 
        
          if($edit)
          {
              mysqli_close($con); // Close connection
              header("location:stureg.php"); // redirects to all records page
              exit;
          }
          else
          {
              echo mysqli_error();
          }    	
      }
    if(isset($_POST['delete'])) // when click on Update button
      {
        $sid = $_POST['sid'];
        $del = mysqli_query($con,"delete from stureg where sid = $sid"); // delete query 
        if($del)
        {
            mysqli_close($con); // Close connection
            header("location:stureg.php"); // redirects to all records page
            exit;	
        }
        else
        {
            echo "Error deleting record"; // display error message if not delete
        }
      }
    if($sid>0)
      {
        
        $query=mysqli_query($con,"SELECT * FROM  stureg WHERE sid=$sid");
        if($query && mysqli_num_rows($query)>0)      
        $info=mysqli_fetch_assoc($query);
      }

?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Student - Register</title>    

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

    <h1 class="h1">Student - Register</h1>

    <div class="container">
      <form method="post">
        
      <div class="row">
            <div class="col-15">
              <label for="sid">Id</label>
            </div>
            <div class="col-65">
              <input type="text" id="sid" name="sid" placeholder="Id" value="<?php echo $info['sid']; ?>"  />
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="rno">Roll Number</label>
            </div>
            <div class="col-65"> 
              <input type="text" id="rno" name="rno" placeholder="Roll Number" value="<?php echo $info['rno'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="fname">First Name</label>
            </div>
            <div class="col-65">
              <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $info['fname'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
            <label for="lname">Last Name</label>
          </div>
          <div class="col-65">
            <input type="text" id="lname" name="lname" placeholder="Last Name"value="<?php echo $info['lname'];?>">
          </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="gender">Gender</label>
            </div>
            <div class="col-65">
              <input type="radio" id="fname" name="gender" value="1" <?php echo ($info['gender']==1?'checked="checked"':''); ?>/>Male
              <input type="radio" name="gender" value="0" <?php echo ($info['gender']==0?'checked="checked"':''); ?>/>Female           
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="dob">Date of Birth</label>
            </div>
            <div class="col-65">
              <input type="text" id="dob" name="dob" placeholder="YYYY-MM-DD"value="<?php echo $info['dob'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="father">Father's Name</label>
            </div>
            <div class="col-65">
              <input type="text" id="father" name="father" placeholder="Father's Name"value="<?php echo $info['father'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="mother">Mother's Name</label>
            </div>
            <div class="col-65">
              <input type="text" id="mother" name="mother" placeholder="Mother's Name"value="<?php echo $info['mother'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="pno">Parent's Number</label>
            </div>
            <div class="col-65">
              <input type="text" id="pno" name="pno" placeholder="Parent's Number"value="<?php echo $info['pno'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="sno">Student's Number</label>
            </div>
            <div class="col-65">
              <input type="text" id="sno" name="sno" placeholder="Student's Number"value="<?php echo $info['sno'];?>">
            </div>
        </div>

        <div class="row">
            <div class="col-15">
              <label for="adrs">Address</label>
            </div>
            <div class="col-65">
              <input type="text" id="adrs" name="adrs" placeholder="address" style="height:100px"value="<?php echo $info['adrs'];?>"></input>
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
              <label for="fdes">Father's designation</label>
            </div>
            <div class="col-65">
              <input type="text" id="fdes" name="fdes" placeholder="Father's designation"value="<?php echo $info['fdes'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="mdes">Mother's designation</label>
            </div>
            <div class="col-65">
              <input type="text" id="mdes" name="mdes" placeholder="Mother's designation"value="<?php echo $info['mdes'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="ano">Adhar Number</label>
            </div>
            <div class="col-65">
              <input type="text" id="ano" name="ano" placeholder="Adhar Number"value="<?php echo $info['ano'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="email">E-mail</label>
            </div>
            <div class="col-65">
              <input type="text" id="email" name="email" placeholder="E-mail"value="<?php echo $info['email'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="religion">Religion</label>
            </div>
            <div class="col-65">
              <input type="text" id="religion" name="religion" placeholder="Religion"value="<?php echo $info['religion'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="caste">caste</label>
            </div>
            <div class="col-65">
              <input type="text" id="caste" name="caste" placeholder="caste"value="<?php echo $info['caste'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="scaste">Sub caste</label>
            </div>
            <div class="col-65">
              <input type="text" id="scaste" name="scaste" placeholder="Sub caste"value="<?php echo $info['scaste'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="tc">Transfer Certificate</label>
            </div>
            <div class="col-65">
              <input type="radio" id="fname" name="tc" value="1" <?php echo ($info['tc']==1?'checked="checked"':''); ?>/>Submitted
              <input type="radio" name="tc" value="0" <?php echo ($info['tc']==0?'checked="checked"':''); ?>/>Not submitted           
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="ccer">caste Certificate</label>
            </div>
            <div class="col-65">
              <input type="radio" id="fname" name="ccer" value="1" <?php echo ($info['ccer']==1?'checked="checked"':''); ?>/>Submitted
              <input type="radio" name="ccer" value="0" <?php echo ($info['ccer']==0?'checked="checked"':''); ?>/>Not submitted           
            </div>
        </div>
        <div class="row">
          <div class="col-15">
            <label for="fname">Income Certificate</label>
          </div>
          <div class="col-65">
              <input type="radio" id="icer" name="icer" value="1" <?php echo ($info['icer']==1?'checked="checked"':''); ?>/>Submitted
              <input type="radio" name="icer" value="0" <?php echo ($info['icer']==0?'checked="checked"':''); ?>/>Not submitted           
            </div>
        </div>
        <div class="row">
            <div class="col-15">
              <label for="pwd">Password</label>
            </div>
            <div class="col-65">
              <input type="text" id="pwd" name="pwd" placeholder="Password"value="<?php echo $info['pwd'];?>">
            </div>
        </div>

        <div class="row">
            <br><br>
          <input type="submit" class="mybtn" value="admit" name="admit"> &nbsp;
          <input type="submit" class="mybtn" value="edit" name="edit"> &nbsp;
          <input type="submit" class="mybtn" value="delete" name="delete"> &nbsp;
        </div>
      </form>
    </div>

    </body>
  </html>
