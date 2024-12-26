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
        $rno=$_POST['searchid'];
        $class=$_POST['sclass'];
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
          $per = $_POST['per'];
          $class = $_POST['class'];

          $insert = "INSERT INTO stureg( rno,fname,lname,gender,dob,father,mother,pno,sno,adrs, padrs,fdes,mdes,ano,email,religion,caste,scaste,tc,ccer,icer,pwd,per,class) VALUES ( '$rno','$fname','$lname','$gender', '$dob','$father','$mother','$pno','$sno','$adrs','$padrs','$fdes','$mdes','$ano','$email', '$religion','$caste', '$scaste','$tc ','$ccer','$icer', '$pwd','$per','$class')";
          $insert=mysqli_query($con,$insert);
          if(!$insert)
          {
              echo mysqli_error($con);
          }
        
          $insert1 = "INSERT INTO users(email,pwd,desg,class) VALUES ('$email','$pwd','4','$class')";
          $insert1=mysqli_query($con,$insert1);
          if(!$insert1)
          {
              echo mysqli_error($con);
          }
          $insert2 = "INSERT INTO stubckup( rno,fname,lname,gender,dob,father,mother,pno,sno,adrs, padrs,fdes,mdes,ano,email,religion,caste,scaste,tc,ccer,icer,pwd,per,class) VALUES ( '$rno','$fname','$lname','$gender', '$dob','$father','$mother','$pno','$sno','$adrs','$padrs','$fdes','$mdes','$ano','$email', '$religion','$caste', '$scaste','$tc ','$ccer','$icer', '$pwd','$per','$class')";
          $insert2=mysqli_query($con,$insert2);
          if(!$insert2)
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
          $per = $_POST['per'];
          $class = $_POST['class'];
        
          $edit = mysqli_query($con,"update stureg set rno='$rno', fname='$fname' ,lname = '$lname',gender = '$gender',dob = '$dob',father = '$father',mother = '$mother',pno = '$pno',sno = '$sno',adrs = '$adrs',padrs = '$padrs',fdes = '$fdes',mdes = '$mdes',ano = '$ano', email = '$email',religion = '$religion',caste = '$caste',scaste = '$scaste', tc = '$tc', ccer = '$ccer',icer = '$icer',pwd = '$pwd',per='$per',class='$class' where sid='$sid'"); 
        
          if($edit)
          {
              mysqli_close($con); // Close connection
              header("location:stureg.php"); // redirects to all records page
              exit;
          }
          else
          {
              echo mysqli_error($con);
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
    if($rno>0)
      {
        $query=mysqli_query($con,"SELECT * FROM  stureg WHERE rno=$rno and class=$class");
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
    <title>Student - Register</title>    

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
      .right{float:right;} .left{float:left;}
      .mybtn{width:10%; padding:1%; background-color:blue; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
      .mybtn:hover{background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
      .row:after { content: ""; display: table; clear: both; }
      @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    </style>
  </head>
<body>
<?php    
    if($result && mysqli_num_rows($result)>0)
    {
        $userinfo=mysqli_fetch_assoc($result);
        
        if($userinfo['desg']==2)
        {
  ?>
          <br>  
          <h1 class="h1">Student - Register</h1>
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
                  <div class="row" style="display:none;">
                    <div class="col-15">
                      <label for="sid">Id</label>
                    </div>
                    <div class="col-65">
                      <input type="number" id="sid" name="sid" placeholder="ID" value="<?php echo $info['sid']; ?>" readonly/>
                    </div> 
                  </div>  
                  <div class="row">
                    <div class="col-15">
                      <label for="searchid">Search RollNo</label>
                    </div>
                    <div class="col-65">
                      <input type="number" id="searchid" name="searchid" placeholder="Search to Update/Delete data" value="<?php echo $info['rno']; ?>"  />
                    </div> 
                  </div>  
                  <div class="row">
                      <div class="col-15">
                        <label for="scalss">Search Class</label>
                      </div>
                      <div class="col-65">
                        <input type="number" id="sclass" name="sclass" placeholder="Search class" value="<?php echo $info['class']; ?>"/>
                      </div>
                  </div><br>
                    <input type="submit" value="Search" name="search" class="mybtn" />
            </fieldset>
            <fieldset>
              <legend>Admit Student</legend>  
                  <div class="row">
                      <div class="col-15">
                        <label for="rno">Roll Number</label>
                      </div>
                      <div class="col-65"> 
                        <input type="number" id="rno" name="rno" placeholder="Roll Number" value="<?php echo $info['rno'];?>">
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
                        <select>
                          <option selected disabled>Select Gender</option>
                          <option id="gender" name="gender" value="1"<?php echo ($info['gender']==1?'selected="selected"':''); ?>>Male</option>
                          <option id="gender" name="gender" value="0"<?php echo ($info['gender']==0?'selected="selected"':''); ?>>Female</option>           
                        </select>
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
                        <select>
                          <option name="tc" value="1"<?php echo ($info['tc']==1?'selected="selected"':''); ?>>Submitted</option>
                          <option name="tc" value="0"<?php echo ($info['tc']==0?'selected="selected"':''); ?>>Not Submitted</option>           
                        </select>         
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-15">
                        <label for="ccer">caste Certificate</label>
                      </div>
                      <div class="col-65">
                        <select>
                          <option name="ccer" value="1"<?php echo ($info['ccer']==1?'selected="selected"':''); ?>>Submitted</option>
                          <option name="ccer" value="0"<?php echo ($info['ccer']==0?'selected="selected"':''); ?>>Not Submitted</option>           
                        </select>            
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-15">
                      <label for="fname">Income Certificate</label>
                    </div>
                    <div class="col-65">
                        <select>
                          <option name="icer" value="1"<?php echo ($info['icer']==1?'selected="selected"':''); ?>>Submitted</option>
                          <option name="icer" value="0"<?php echo ($info['icer']==0?'selected="selected"':''); ?>>Not Submitted</option>           
                        </select>                
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
                   <div class="col-15">
                      <label for="per">Percentage</label>
                    </div>
                      <div class="col-65">
                        <input type="text" id="per" name="per" placeholder="Previous Year Percentage" value="<?php echo $info['per'];?>"></input>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-15">
                      <label for="class">Class</label>
                    </div>
                      <div class="col-65">
                        <select name="class">
                          <option selected disabled>Select Class</option>
                          <option value="1"<?php echo ($info['class']==1?'selected="selected"':''); ?>>class1</option>
                          <option value="2"<?php echo ($info['class']==2?'selected="selected"':''); ?>>class2</option>
                          <option value="3"<?php echo ($info['class']==3?'selected="selected"':''); ?>>class3</option>
                          <option value="4"<?php echo ($info['class']==4?'selected="selected"':''); ?>>class4</option>
                          <option value="5"<?php echo ($info['class']==5?'selected="selected"':''); ?>>class5</option>
                          <option value="6"<?php echo ($info['class']==6?'selected="selected"':''); ?>>class6</option>
                          <option value="7"<?php echo ($info['class']==7?'selected="selected"':''); ?>>class7</option>
                          <option value="8"<?php echo ($info['class']==8?'selected="selected"':''); ?>>class8</option>
                          <option value="9"<?php echo ($info['class']==9?'selected="selected"':''); ?>>class9</option>
                          <option value="10"<?php echo ($info['class']==10?'selected="selected"':''); ?>>class10</option>
                        </select>
                      </div>
                  </div>
                  <div class="row">
                      <br><br>
                    <input type="submit" value="Admit" name="admit" class="mybtn" /> &nbsp;
                    <input type="submit" value="Update" name="edit" class="mybtn" /> &nbsp;
                    <input type="submit" value="Delete" name="delete" class="mybtn" /> &nbsp;
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