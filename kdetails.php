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
        header('Location: index.php');
    }
	
          $home=$_POST['home'];
          $campus = $_POST['campus'];
          $trust = $_POST['trust'];
          $message = $_POST['message'];
          $vision = $_POST['vision'];
          $computer = $_POST['computer'];
          $science = $_POST['science'];
          $library = $_POST['library'];
          $auditorium = $_POST['auditorium'];
          $sports = $_POST['sports'];
          $extra = $_POST['extra'];
          $working = $_POST['working'];
          $admission = $_POST['admission'];       

        if(isset($_POST['submit1']))
        {	
          $insert = mysqli_query($con,"update kdetails set home='$home' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit2']))
        {	
          $insert = mysqli_query($con,"update kdetails set campus='$campus' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit3']))
        {	
          $insert = mysqli_query($con,"update kdetails set trust = '$trust' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit4']))
        {	
          $insert = mysqli_query($con,"update kdetails set message = '$message' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit5']))
        {	
          $insert = mysqli_query($con,"update kdetails set vision = '$vision' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit6']))
        {	
          $insert = mysqli_query($con,"update kdetails set computer = '$computer' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        } 
        elseif(isset($_POST['submit7']))
        {	
          $insert = mysqli_query($con,"update kdetails set science = '$science' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit8']))
        {	
          $insert = mysqli_query($con,"update kdetails set library = '$library' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit9']))
        {	
          $insert = mysqli_query($con,"update kdetails set auditorium = '$auditorium' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit10']))
        {	
          $insert = mysqli_query($con,"update kdetails set sports = '$sports' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit11']))
        {	
          $insert = mysqli_query($con,"update kdetails set extra = '$extra' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit12']))
        {	
          $insert = mysqli_query($con,"update kdetails set working = '$working' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }
        elseif(isset($_POST['submit13']))
        {	
          $insert = mysqli_query($con,"update kdetails set admission = '$admission' where id='1'");
          if(!$insert) {  echo mysqli_error($con);  }
        }


    //teaching staff
    if(isset($_POST["tsubmit"]))
    {
        $fnm = $_FILES["timages"]["name"];
        $dst_db = "tfac/".$fnm;
        move_uploaded_file($_FILES["timages"]["tmp_name"],"./tfac/".$fnm); 
        $check = mysqli_query($con,"insert into tfac(name,desg,sdesg,images) values('$_POST[tname]','$_POST[tdesg]','$_POST[sdesg]','$dst_db')");  // inserting into db
        if($check)
        {
            echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        }
        else
        {
            echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
        }
    }
    
    //non teaching staff
        if(isset($_POST["ntsubmit"]))
        {
            $fnm = $_FILES["ntimages"]["name"];
            $dst_db = "ntfac/".$fnm;
            move_uploaded_file($_FILES["ntimages"]["tmp_name"],"./ntfac/".$fnm); 
            $check = mysqli_query($con,"insert into ntfac(name,desg,images) values('$_POST[ntname]','$_POST[ntdesg]','$dst_db')");  // inserting into db
            if($check)
            {
                echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
            }
        }
        mysqli_close($db);
?>

<html>
<head>
<title>Details</title>
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

        .right{float:right; padding-right:8%; padding-top:2%;}

        input[type=text], textarea 
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
          background-color: blue;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          float: left;
        }

        input[type=submit]:hover 
        {
          background-color: rgb(255, 0, 0);
        }
        input[type=file], select { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
        fieldset{width:90%; border-radius:5px; border-color:red;background:aqua;}
        .h1{background:red; color:white; border-radius:15px;padding:0.5%; text-align: center;}
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
<?php    
    if($result && mysqli_num_rows($result)>0)
    {
        $userinfo=mysqli_fetch_assoc($result);
        
        if($userinfo['desg']==1 || $userinfo['desg']==2)
        {
?>
    <br><br>
    <h1 class="h1">Enter School Details in Kannada</h1>
    <a href="kdetails.php">click here to edit details in English</a>
  <center>
    <fieldset>
        <legend>Details in Kannada</legend>
        <div class="container">
            <form method="post" >          
                <div class="row">
                    <div class="col-15">
                        <label for="home">Home</label>
                    </div>
                    <div class="col-65">
                        <textarea id="home" name="home" placeholder="home" style="height:100px"value="<?php echo $info['home'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit1" name="submit1" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="campus">campus</label>
                    </div>
                    <div class="col-65">
                        <textarea id="campus" name="campus" placeholder="campus" style="height:100px"value="<?php echo $info['campus'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit2" name="submit2" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="trust">Gurukul Trust</label>
                    </div>
                    <div class="col-65">
                        <textarea id="trust" name="trust" placeholder="trust" style="height:100px"value="<?php echo $info['trust'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit3" name="submit3" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="message">Message</label>
                    </div>
                    <div class="col-65">
                        <textarea id="message" name="message" placeholder="message" style="height:100px"value="<?php echo $info['message'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit4" name="submit4" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="vision">Vision & Mission</label>
                    </div>
                    <div class="col-65">
                        <textarea id="vision" name="vision" placeholder="vision & Mission" style="height:100px"value="<?php echo $info['vision'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit5" name="submit5" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="computer">Computer Lab</label>
                    </div>
                    <div class="col-65">
                        <textarea id="computer" name="computer" placeholder="computer" style="height:100px"value="<?php echo $info['computer'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit6" name="submit6" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="science">Science Lab</label>
                    </div>
                    <div class="col-65">
                        <textarea id="science" name="science" placeholder="science lab" style="height:100px"value="<?php echo $info['science'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit7" name="submit7" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="library">Library</label>
                    </div>
                    <div class="col-65">
                        <textarea id="library" name="library" placeholder="library" style="height:100px"value="<?php echo $info['library'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit8" name="submit8" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="auditorium">Auditorium</label>
                    </div>
                    <div class="col-65">
                        <textarea id="auditorium" name="auditorium" placeholder="auditorium" style="height:100px"value="<?php echo $info['auditorium'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit9" name="submit9" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="sports">Sports</label>
                    </div>
                    <div class="col-65">
                        <textarea id="sports" name="sports" placeholder="sports" style="height:100px"value="<?php echo $info['sports'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit10" name="submit10" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="extra">Extra Actiities</label>
                    </div>
                    <div class="col-65">
                        <textarea id="extra" name="extra" placeholder="extra" style="height:100px"value="<?php echo $info['extra'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit11" name="submit11" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="working">Working Hours</label>
                    </div>
                    <div class="col-65">
                        <textarea id="working" name="working" placeholder="working" style="height:100px"value="<?php echo $info['working'];?>"></textarea>
                    </div>
                    <div class="right">
                        <input type="submit" id="edit12" name="submit12" value="Update" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <label for="admission">Admission</label>
                    </div>
                    <div class="col-65">
                        <textarea id="admission" name="admission" placeholder="admission" style="height:100px"value="<?php echo $info['admission'];?>"></textarea>
                    </div><div class="right">
                        <input type="submit" id="edit13" name="submit13" value="Update" />
                    </div>
                </div>
            </form>
    </fieldset>    
  </center>
<?php
        }
    }
?>
</body>
</html>