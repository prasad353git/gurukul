<?php
 session_start();

 $_SESSION["staff"] = "staff";
 $_SESSION["student"] = "student";
 
 $host="localhost";
 $user="root";
 $password="12345678";
 $db="gurukul";
 $error="";

 require_once "functions.php" ;
 $con=connect_my_db();
 $query=mysqli_query($con,"SELECT * FROM  details WHERE id='1'");
 if($query && mysqli_num_rows($query)>0)      
 $info=mysqli_fetch_assoc($query);

 if(isset($_POST['user']))
  {
      $con=mysqli_connect($host,$user,$password,$db) or die("Sorry unable to connect");
  
  //	mysql_select_db($db,$con) or die("failed to select db");
    
      $uname=$_POST['user'];
      $pwd=$_POST['pass'];
      
    //if ($_POST['des']=='staff')
    $sql="select * from users where email='$uname' AND pwd='$pwd' limit 1";
   /* else
    $sql="select * from stureg where email='$uname' AND pwd='$pwd' limit 1"; */

    $result=mysqli_query($con,$sql);
    if(mysqli_error($con))
    echo "<br>Error = ".mysqli_error($con);
    if(mysqli_num_rows($result)==1&&(!preg_match('/([\'"])/', $_POST['pass'])))
      {
        $userinfo=mysqli_fetch_assoc($result);

        $_SESSION['userid']=$userinfo['id'];
        $_SESSION['user']=$_POST['des'];
        //if ($_POST['des']=='staff')
        header("location:dash.php");
       /*  else
        header("location:sdash.php"); */
        exit();
      } 
    else
      {
        $error="You Have Entered Incorrect Email/Password !!!";
      }
  }
  if(isset($_POST['contact']))
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];

      $insert = "INSERT INTO messages(`name`,`email`,`message`) VALUES ('$name','$email','$message')";
      $insert=mysqli_query($con,$insert);
      if(!$insert)
      {
        echo mysqli_error($con);
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gurukul</title>
<style>
    body,html{height: 100%; width:100; margin: 0;}
    img{height:250px;width:220px;padding:1%;}
    .bg{position:fixed; overflow:scroll; overflow-x:hidden; background-image:url('nightmode.png'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
    .hr {border-top: 2px dashed blue; width:50%; }
    input[type=text],input[type=password], select, textarea { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
    .navbar{ width:90%; text-align: center; border-radius: 5px; color: #fff; font-size: 16px; }
    .logo{height:15%; width:10%;padding:1%;}
    .btn{background-color:inherit; color: white; font-size:16px; border:inherit;}
    .left{float:left;}
    .right{float:right;}  
    .white{color:#fff;}      .black{color:black;}  .yellow{color:yellow;}
    .round{border-radius:15%;}
    .box{position:absolute; padding:3%; width:93%; color:white; font-size:20px; background-color:rgba(000,000,000,0.700); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
    .swtchrad{padding-right:2%;}
    .hide { display: none;}
    .mode:hover + .hide {display: block; color: white;}
    .navbar { width: 80%; overflow: hidden; background-color: inherit; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .navbar a {float: left; font-size: 16px; color:white; text-align: center; padding: 14px 16px; text-decoration: none; }
    .dropdown { float: left; overflow: hidden;}
    .dropdown .dropbtn {font-size: 16px; border: none; outline: none; color: white; padding: 14px 16px; background-color:inherit; font-family: inherit; margin: 0; }
    .navbar a:hover, .dropdown:hover .dropbtn { background-color: yellow;font-size:17px; border-radius:15px; color:red; }
    .dropdown-content { display: none; position: absolute; background-color: rgba(255,255,255,0.500); border-radius:15px; min-width:160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); z-index: 1; }
    .dropdown-content a { float: none; color: black; padding: 12px 16px; text-decoration: none; display: block; text-align: left; }
    .dropdown-content a:hover { background-color: yellow; }
    .dropdown:hover .dropdown-content { display: block; }
    .login{padding:3%; width:50%;height:50%; color:white; background-color:rgba(000,000,000,0.800); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
    .padding{padding-left:5%; padding-top:5%;}
    .loghead{padding:5%; color:white; border:15px;}
    .conhead{padding:2%;}
    .mybtn{width:25%; padding: 2%; background-color:blue; color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .mybtn:hover{width:30%; background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .con{width:15%; padding:1%; background-color:blue; color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .con:hover{width:20%; background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .col-25 { float: left; width: 15%; margin-top: 10px; }
    .col-75 { float: left; width: 75%; margin-top: 6px; }
    .card{float:left; width:15%; padding:4%;}

    
</style>
</head>
 
<body>
    <div class="bg">
        <header>
            <div>
                    <img src="logonbg.png" class="logo left round" onclick="openTabs('Home')"></img>
            </div> 
            <br><br>
          <!-- -------------------------       navbar start       ------------------------------ -->
                <center>
                    <div class="navbar " >                
                                        
                        <div class="dropdown">
                            <button class="dropbtn">About &#11183; </button> &nbsp;&nbsp;
                            <div class="dropdown-content">
                                <a onclick="openTabs('Campus')">Campus</a>
                                <a onclick="openTabs('GurukulTrust')">Gurukul Trust</a>
                                <a onclick="openTabs('Messages')">Messages</a>
                                <a onclick="openTabs('vision&mission')">vision & mission</a>
                            </div>
                        </div> 
                                                                
                        <div class="dropdown">
                            <button class="dropbtn">Facilities &#11183; </button> &nbsp;&nbsp;
                            <div class="dropdown-content">
                                <a onclick="openTabs('ComputerLaboratory')">Computer Laboratory</a>
                                <a onclick="openTabs('ScienceLaboratory')">Science Laboratory</a>
                                <a onclick="openTabs('Library')">Library</a>
                                <a onclick="openTabs('Auditorium')">Auditorium</a>
                            </div>
                        </div>     
                            
                        <div class="dropdown">
                            <button class="dropbtn">Academics &#11183; </button> &nbsp;&nbsp;
                            <div class="dropdown-content">
                                <a onclick="openTabs('Sports')">Sports</a>
                                <a onclick="openTabs('ExtraCurricularActivities')">Extra Curricular Activities</a>
                                <a onclick="openTabs('WorkingHours')">Working Hours</a>
                                <a onclick="openTabs('SchoolAdmission')">School Admission</a>
                            </div>
                        </div>      
                    
                        <div class="dropdown">
                            <button class="dropbtn">Faculties &#11183; </button> &nbsp;&nbsp;
                            <div class="dropdown-content">
                                <a onclick="openTabs('TeachingStaff')">Teaching Staff</a>
                                <a onclick="openTabs('NonTeachingStaff')">Non-Teaching Staff</a>
                            </div>
                        </div>                  
                            
                        <a onclick="openTabs('Gallery')">Gallery</a> &nbsp;&nbsp;
                        <a onclick="openTabs('ContactUs')">Contact Us</a> &nbsp;&nbsp;
                        <a id="myBtn" onclick="openTabs('Login')"> Login</a> &nbsp;&nbsp;
                        <a onclick="openTabs('WallofFame')"> Wall of Fame</a> 
                        
                        <div class="right swtchrad">
                            <div class="mode"><a href="indexday.php"> &#127774;</a></div>
                            <div class="hide">Day Mode</div>
                        </div>                          
                    </div>
                </center>  
          <!-- -------------------------        navbar end        ------------------------------ -->
            
        </header>
        <br><br><br><br><br>
          <!-- -------------------------       details start      ------------------------------ -->
                            
            <div id="Home" class="box tabs">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['home'];?> </p> 
            </div>

            <div id="Campus" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['campus'];?> </p>     
            </div>
                
            <div id="GurukulTrust" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['trust'];?> </p> 
            </div>

            <div id="Messages" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['message'];?> </p> 
            </div>	

            <div id="vision&mission" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['vision'];?> </p> 
            </div>	
            
            <div id="ComputerLaboratory" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['computer'];?> </p> 
            </div>

            <div id="ScienceLaboratory" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['science'];?> </p> 
            </div>
                
            <div id="Library" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['library'];?> </p> 
            </div>

            <div id="Auditorium" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['auditorium'];?> </p> 
            </div>
            
            <div id="Sports" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['sports'];?> </p> 
            </div>

            <div id="ExtraCurricularActivities" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['extra'];?> </p> 
            </div>

            <div id="WorkingHours" class="box tabs" style="display:none">
                <span  onclick="closetabs();"> &#10060; </span>
                <p> <?php echo $info['working'];?> </p> 
            </div>

            <div id="SchoolAdmission" class="box tabs" style="display:none">
                <span  onclick="closetabs();">&#10060;</span>
                <p> <?php echo $info['admission'];?> </p> 
            </div>
          <!-- -------------------------        details end       ------------------------------ -->

        <center>
          <!-- -------------------------       login  start       ---------------------------    -->
            <div id="Login" class="login tabs" style="display:none">
                <span class="left" onclick="closetabs();"> &#10060; </span>
                <header class="loghead">
                    <label>Log In</label> 
                </header>  <hr class="hr">
                <form method="POST">
                    <div class="padding">            
                        <label for="user">Username</label>            
                        <input type="text" id="user" name="user" placeholder="User Name" />
                    </div>
                    <div class="padding">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" placeholder="Password" />
                    </div>
                    <div class="padding">
                        <input type="submit" class="mybtn" value="Login" name="login">
                    </div>
                    <br>
                </form>    
            </div>
          <!-- -------------------------        login  end        ---------------------------    -->

          <!-- -------------------------    contact us start      ------------------------------ -->

            <div id="ContactUs" class="box tabs" style="display:none">
                <span class="left" onclick="closetabs();"> &#10060; </span>
                <header class="conhead">
                    <h3>Contact Us</h3>
                </header>
                    <label class="yellow"> Email : gurukul@gmail.com </label><br>
                    <label class="yellow">Phno : 9876543210</label><br>
                    <label class="yellow"> Address : Gurukul primary and high school,
                    <br>Murudeshwar,Bhatkal tq,<br>Uttara Kannada,Karnataka-581350</label> <br><br>
                <hr class="hr">

                <form method="post"><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Your name..">
                        </div>
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Your Email ID..">
                        </div>
                    </div><br><br><br>                
                    <div class="row">
                        <div class="col-25">
                            <label for="message">Message</label>
                        </div>
                        <div class="col-75">
                            <textarea id="message" name="message" placeholder="Write Message Here.." style="height:100px"></textarea>
                        </div>
                    </div><br><br><br><br><br>                
                    <div class="padding">
                        <input type="submit" class="con" style="float:left;" value="Submit" name="contact"><br><br><br>
                    </div>
                </form>    
            </div>
          <!-- -------------------------     contact us end       ------------------------------ -->
        </center>  

        <!-- -------------------------         gallery start       ------------------------------ -->
            <div id="Gallery" class="box tabs" style="display:none">
                    <span  onclick="this.parentElement.style.display='none'">&#10060;</span><br><br>
                    
                    <?php
                        $imagesDirectory = "gallery/";
                        
                        if(is_dir($imagesDirectory))
                        {
                            $opendirectory = opendir($imagesDirectory);
                            
                            while (($image = readdir($opendirectory)) !== false)
                            {
                                if(($image == '.') || ($image == '..'))
                                {
                                    continue;
                                }
                                
                                $imgFileType = pathinfo($image,PATHINFO_EXTENSION);
                                
                                if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
                                {
                                    echo "<img src='images/".$image."' width='200'> ";
                                }
                    ?>  &nbsp; &nbsp;  &nbsp;  &nbsp; 
                    <?php
                            }
                            closedir($opendirectory);
                        }
                    ?>
                </div>   
        <!-- -------------------------          gallery end        ------------------------------ -->

        <!-- -------------------------     Teaching staff start    ------------------------------ -->

                <div id="TeachingStaff" class="box tabs" style="display:none">
                <span  onclick="this.parentElement.style.display='none'" class="left">&#10060;</span><br><br>   
                
                <div >
                    <?php
                        $db = mysqli_connect("localhost","root","12345678","gurukul");
                        if(!$db)
                        {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $query=mysqli_query($db,"SELECT * FROM tfac");
                        if($query)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                                ?>
                                    <div class="card">
                                        <img src="./<?php echo $row['images']; ?>" width="260px" height="200px" alt="Faculty Images">
                                        <div>
                                        <center>
                                            <label style="font-weight:bold"><?php echo $row['name']; ?></label><br>
                                            <label><?php echo $row['sdesg']; ?></label>&nbsp;
                                            <label><?php echo $row['desg']; ?></label><br>
                                        </center>    
                                        </div>
                                    </div>
                            <?php
                            }
                        }
                        else
                        {
                            echo "no faculty found";
                        }
                    ?>   
                </div>
            </div>
        <!-- ------------------------       Teaching staff end     ------------------------------ -->  
        
        <!-- ------------------------   Non Teaching staff start   ------------------------------ -->

            <div id="NonTeachingStaff" class="box tabs" style="display:none">
                    <span  onclick="this.parentElement.style.display='none'" class="left">&#10060;</span><br><br>   
                    
                    <div class="row mt-4">
                        <?php
                            $db = mysqli_connect("localhost","root","12345678","gurukul");
                            if(!$db)
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $query=mysqli_query($db,"SELECT * FROM ntfac");
                            if($query)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                {
                                    ?>
                                        <div class="card">
                                            <img src="./<?php echo $row['images']; ?>" width="260px" height="200px" alt="Faculty Images">
                                            <div>
                                                <center>
                                                    <label  style="font-weight:bold"><?php echo $row['name']; ?></label><br>
                                                    <label><?php echo $row['desg']; ?></label><br>
                                                </center>    
                                            </div>
                                        </div>
                                <?php
                                }
                            }
                            else
                            {
                                echo "no faculty found";
                            }
                        ?>   
                    </div>
                </div>
        <!-- ------------------------    Non Teaching staff end    ------------------------------ -->  
    </div>    



    <script>
        function daymode() 
        {
            location.replace("indexday.php")
        }

        function nightmode() 
        {
            location.replace("indexnight.php")
        }

         // closable tabs 

         function closetabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("box");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
      }
      
      function openTabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
        document.getElementById(tabsName).style.display = "block"; 
      }

      <?php 
        if ($error)
        {
          echo"alert('$error');";
        } ?>

    </script>
</body>
</html>