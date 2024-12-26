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
 $kquery=mysqli_query($con,"SELECT * FROM  kdetails WHERE id='1'");
 if($query && mysqli_num_rows($kquery)>0) 
 $kinfo=mysqli_fetch_assoc($kquery);

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
    .bg{position:fixed; overflow:scroll; overflow-x:hidden; background-image:url('daymode.png'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
    .hr {border-top: 2px dashed red; width:50%; }
    input[type=text],input[type=password], select, textarea { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
    .navbar{ width:90%; text-align: center; border-radius: 5px; color: #fff; font-size: 16px; }
    .logo{height:15%; width:10%;padding:1%;}
    .btn{background-color:inherit; color: black; font-size:16px; border:inherit;}
    .left{float:left;}
    .right{float:right;}  
    .white{color:#fff;}    .black{color:black;}  .blue{color:blue;} .blueb{background:blue;}  .yellow{color:yellow;}
    .round{border-radius:15%;}
    .box{position:absolute; padding:3%; width:93%; font-size:20px; background-color:rgba(255,255,255,0.800); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
    .swtchrad{padding-right:3%;padding-top:1%;}
    .hide { display: none;}
    .mode:hover + .hide {display: block; color:black;}
    .navbar { width: 85%; overflow: hidden; background-color: inherit; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .navbar a {float: left; font-size: 16px; color:black; text-align: center; padding: 14px 16px; text-decoration: none; }
    .dropdown { float: left; overflow: hidden;}
    .dropdown .dropbtn {font-size: 16px;border: none; outline: none; color: black; padding: 14px 16px; background-color:inherit; font-family: inherit;margin: 0;}
    .navbar a:hover, .dropdown:hover .dropbtn { background-color: yellow;font-size:17px; border-radius:15px; color:red; }
    .dropdown-content { display: none; position: absolute; background-color: rgba(255,255,255,0.700); border-radius:15px; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); z-index: 1; }
    .dropdown-content a { float: none; color: black; padding: 12px 16px; text-decoration: none; display: block; text-align: left; }
    .dropdown-content a:hover { background-color: yellow; }
    .dropdown:hover .dropdown-content { display: block; }
    .padding{padding-left:5%; padding-top:5%;}
    .loghead{padding:5%; color:red; border:15px;}
    .conhead{padding:2%; color:red; border:15px;}
    .mybtn{width:25%; padding: 2%; background-color:rgb(255, 0, 0); color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .mybtn:hover{width:35%; background-color:blue; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .con{width:15%; padding:1%; background-color:rgb(255, 0, 0); color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .con:hover{width:20%; background-color:blue; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .col-25 { float: left; width: 15%; margin-top: 10px; }
    .col-75 { float: left; width: 75%; margin-top: 6px; }
    .card{float:left; width:15%; padding-left:5%; padding-right:10%; padding-top:5%;}
    .moon{padding:2%; float:right;}
    .padl{padding-left:45%; padding-top:20%; padding-right:15%;}
    .wall{position:fixed; overflow:scroll; overflow-x:hidden; background-image:url('walloffame.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
    .sppad{padding-right:2%; padding-top:2%;}

    .a a{color:white;}
    .ndropdown { float: left; overflow: hidden;}
    .ndropdown .dropbtn {font-size: 16px; border: none; outline: none; color: white; padding: 14px 16px; background-color:inherit; font-family: inherit; margin: 0; }
    .ndropdown-content { display: none; position: absolute; background-color: rgba(0,0,0,0.700); border-radius:15px; min-width:160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); z-index: 1; }
    .ndropdown-content a { float: none; color: white; padding: 12px 16px; text-decoration: none; display: block; text-align: left; }
    .ndropdown-content a:hover { background-color: yellow;color:red; }
    .ndropdown:hover .ndropdown-content { display: block; }
    .ndropdown:hover .dropbtn:hover { background-color: yellow;font-size:17px; border-radius:15px; color:red; }
    .nbg{position:fixed; overflow:scroll; overflow-x:hidden; background-image:url('nightmode.png'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
    .nhr {border-top: 2px dashed blue; width:50%; }
    .nbox{position:absolute; padding:3%; width:93%; color:white; font-size:20px; background-color:rgba(000,000,000,0.700); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
    .nhide { display: none;}
    .nmode:hover + .nhide {display: block; color: white;}
    .nloghead{padding:5%; color:white; border:15px;}
    .nconhead{padding:2%;}
    .nmybtn{width:25%; padding: 2%; background-color:blue; color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .nmybtn:hover{width:30%; background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    .ncon{width:15%; padding:1%; background-color:blue; color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
    .ncon:hover{width:20%; background-color:rgb(255, 0, 0); font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
    @media screen and (max-width: 600px) { .col-15, .col-65 { width: 100%;  margin-top: 0; }.navbar{width:100%; height:100;} img{width:250%;height:300%;}
    .card{padding-left:35%; padding-top:15%; padding-right:25%;}}
</style>
</head>
 
<body>
    <div id="day" class="bg">
        <header>
            <div>
                    <img src="logonbg.png" class="logo left round" onclick="openTabs('Home')"></img>
            </div> 
                
            <br><br>
            <!-- -------------------------       navbar start       ------------------------------ -->
                    <center>
                        <div class="navbar" >                
                                            
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
                                
                            <a onclick="openTabs('Gallery')">Gallery</a> 
                            <a onclick="openTabs('ContactUs')">Contact Us</a>
                            <a onclick="openTabs('Login')"> Login</a>
                            <a onclick="openTabs('WallofFame')"> Wall of Fame</a> 
                            <div class="right swtchrad">
                                <div class="mode"><span onclick="night();" class="moon">&#127769;</span></div>
                                <div class="hide">Night Mode</div>
                            </div>                      
                        </div>
                    </center>   
            <!-- -------------------------        navbar end        ------------------------------ -->
        </header>
        <br><br><br><br><br>
            <!-- -------------------------       details start      ------------------------------ -->                 
                <div id="Home" class="box tabs">
                    <span class="left blue" onclick="kan('Home');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['home'];?> </p> 
                </div>

                <div id="Campus" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('Campus');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['campus'];?> </p>     
                </div>
                    
                <div id="GurukulTrust" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('GurukulTrust');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['trust'];?> </p> 
                </div>

                <div id="Messages" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('Messages');"> Read in Kannada </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $info['message'];?> </p> 
                </div>	

                <div id="vision&mission" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('vision&mission');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['vision'];?> </p> 
                </div>	
                
                <div id="ComputerLaboratory" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('ComputerLaboratory');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['computer'];?> </p> 
                </div>

                <div id="ScienceLaboratory" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('ScienceLaboratory');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['science'];?> </p> 
                </div>
                    
                <div id="Library" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('Library');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['library'];?> </p> 
                </div>

                <div id="Auditorium" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('Auditorium');"> Read in Kannada </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $info['auditorium'];?> </p> 
                </div>
                
                <div id="Sports" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('Sports');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['sports'];?> </p> 
                </div>

                <div id="ExtraCurricularActivities" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('ExtraCurricularActivities');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['extra'];?> </p> 
                </div>

                <div id="WorkingHours" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('WorkingHours');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['working'];?> </p> 
                </div>

                <div id="SchoolAdmission" class="box tabs" style="display:none">
                    <span class="left blue" onclick="kan('SchoolAdmission');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();" >&#10060;</span>
                    <br><p> <?php echo $info['admission'];?> </p> 
                </div>

                <!-- kan -->
                <div id="kHome" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Home');"> Read in Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['home'];?> </p> 
                </div>

                <div id="kCampus" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Campus');"> Read in Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['campus'];?> </p>     
                </div>
                    
                <div id="kGurukulTrust" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('GurukulTrust');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['trust'];?> </p> 
                </div>

                <div id="kMessages" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Messages');"> Read in English </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $kinfo['message'];?> </p> 
                </div>	

                <div id="kvision&mission" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('vision&mission');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['vision'];?> </p> 
                </div>	
                
                <div id="kComputerLaboratory" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('ComputerLaboratory');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['computer'];?> </p> 
                </div>

                <div id="kScienceLaboratory" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('ScienceLaboratory');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['science'];?> </p> 
                </div>
                    
                <div id="kLibrary" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Library');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['library'];?> </p> 
                </div>

                <div id="kAuditorium" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Auditorium');"> Read in English </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $kinfo['auditorium'];?> </p> 
                </div>
                
                <div id="kSports" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('Sports');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['sports'];?> </p> 
                </div>

                <div id="kExtraCurricularActivities" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('ExtraCurricularActivities');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['extra'];?> </p> 
                </div>

                <div id="kWorkingHours" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('WorkingHours');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['working'];?> </p> 
                </div>

                <div id="kSchoolAdmission" class="box tabs" style="display:none">
                    <span class="left blue" onclick="eng('SchoolAdmission');"> Read in English </span>
                    <span class="right" onclick="closetabs();" >&#10060;</span>
                    <br><p> <?php echo $kinfo['admission'];?> </p> 
                </div>
            <!-- -------------------------        details end       ------------------------------ -->

        <center>
            <!-- -------------------------       login  start       ---------------------------    -->
                    <div id="Login" class="box tabs" style="display:none">
                        <span class="right" onclick="closetabs();"> &#10060; </span>
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
            <!-- -------------------------       login  end         ---------------------------    -->

            <!-- -------------------------    contact us start     ------------------------------  -->
                    <div id="ContactUs" class="box tabs" style="display:none">
                        <span class="right" onclick="closetabs();"> &#10060; </span>
                        <header class="conhead">
                            <h3>Contact Us</h3>
                        </header>
                        <label class="blue"> Email : gurukul@gmail.com </label><br>
                    <label class="blue">Phno : 9876543210</label><br>
                    <label class="blue"> Address : Gurukul primary and high school,
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
            <!-- -------------------------    contact us end       ------------------------------  -->    
        </center>
        
        <!-- -------------------------          gallery start        ------------------------------ -->
                <div id="Gallery" class="box tabs" style="display:none">
                    <span  onclick="this.parentElement.style.display='none'" class="right">&#10060;</span><br><br>
                    
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
        <!-- -------------------------           gallery end         ------------------------------ -->  

        <!-- -------------------------       Teaching staff start    ------------------------------ -->

            <div id="TeachingStaff" class="box tabs" style="display:none">
                <span  onclick="this.parentElement.style.display='none'" class="right">&#10060;</span><br><br>   
                
                <div>
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
                                            <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
                                            <label><?php echo $row['sdesg']; ?></label>&nbsp;
                                            <label><?php echo $row['desg']; ?></label><br>
                                        </center>    
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
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
        <!-- -------------------------        Teaching staff end     ------------------------------ -->  
        
        <!-- ------------------------     Non Teaching staff start   ------------------------------ -->
            <div id="NonTeachingStaff" class="box tabs" style="display:none">
                    <span  onclick="this.parentElement.style.display='none'" class="right">&#10060;</span><br><br>   
                    
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
                                                    <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
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
        <!-- ------------------------      Non Teaching staff end    ------------------------------ -->  
    </div>

        <!-- -------------------------       Wall of fame start    ------------------------------ -->
            <div id="WallofFame" class="wall tabs" style="display:none">
                <span  onclick="this.parentElement.style.display='none'" class="right sppad">&#10060;</span><br><br>   
                <center>       <?php
                            $db = mysqli_connect("localhost","root","12345678","gurukul");
                            if(!$db)
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $query=mysqli_query($db,"SELECT * FROM wof");
                            if($query)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                {
                                    ?>
                                        <div class="card padl">
                                            <img src="./<?php echo $row['image']; ?>" width="260px" height="200px" alt="Achiever's Images">
                                            <div class="white">
                                            <center>
                                                <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
                                                <label><?php echo $row['achv']; ?></label><br>
                                                <label><?php echo $row['class']; ?></label>&nbsp;
                                                <label><?php echo $row['year']; ?></label><br>
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
                    </center>       
            </div>    
        <!-- -------------------------        wall of fame end     ------------------------------ --> 

    <!-- --------------------------------------   night mode ------------------------------------------------- -->

    <div id="night" class="nbg" style="display:none">
        <header>
            <div>
                    <img src="logonbg.png" class="logo left round" onclick="openTabs('nHome')"></img>
            </div> 
            <br><br>
          <!-- -------------------------       navbar start       ------------------------------ -->
                <center>
                    <div class="navbar a" >                
                                        
                        <div class="ndropdown">
                            <button class="dropbtn">About &#11183; </button> &nbsp;&nbsp;
                            <div class="ndropdown-content">
                                <a onclick="openTabs('nCampus')">Campus</a>
                                <a onclick="openTabs('nGurukulTrust')">Gurukul Trust</a>
                                <a onclick="openTabs('nMessages')">Messages</a>
                                <a onclick="openTabs('nvision&mission')">vision & mission</a>
                            </div>
                        </div> 
                                                                
                        <div class="ndropdown">
                            <button class="dropbtn">Facilities &#11183; </button> &nbsp;&nbsp;
                            <div class="ndropdown-content">
                                <a onclick="openTabs('nComputerLaboratory')">Computer Laboratory</a>
                                <a onclick="openTabs('nScienceLaboratory')">Science Laboratory</a>
                                <a onclick="openTabs('nLibrary')">Library</a>
                                <a onclick="openTabs('nAuditorium')">Auditorium</a>
                            </div>
                        </div>     
                            
                        <div class="ndropdown">
                            <button class="dropbtn">Academics &#11183; </button> &nbsp;&nbsp;
                            <div class="ndropdown-content">
                                <a onclick="openTabs('nSports')">Sports</a>
                                <a onclick="openTabs('nExtraCurricularActivities')">Extra Curricular Activities</a>
                                <a onclick="openTabs('nWorkingHours')">Working Hours</a>
                                <a onclick="openTabs('nSchoolAdmission')">School Admission</a>
                            </div>
                        </div>      
                    
                        <div class="ndropdown">
                            <button class="dropbtn">Faculties &#11183; </button> &nbsp;&nbsp;
                            <div class="ndropdown-content">
                                <a onclick="openTabs('nTeachingStaff')">Teaching Staff</a>
                                <a onclick="openTabs('nNonTeachingStaff')">Non-Teaching Staff</a>
                            </div>
                        </div>                  
                            
                        <a onclick="openTabs('nGallery')">Gallery</a> &nbsp;&nbsp;
                        <a onclick="openTabs('nContactUs')">Contact Us</a> &nbsp;&nbsp;
                        <a id="nmyBtn" onclick="openTabs('nLogin')"> Login</a> &nbsp;&nbsp;
                        <a onclick="openTabs('nWallofFame')"> Wall of Fame</a> 
                        <div class="right swtchrad">
                            <div class="nmode"><span onclick="day();" class="moon">&#127774;</span></div>
                            <div class="nhide">Day Mode</div>
                        </div>                                                      
                    </div>
                </center>  
          <!-- -------------------------        navbar end        ------------------------------ -->
            
        </header>
        <br><br><br><br><br>
            <!-- -------------------------       details start      ------------------------------ -->                 
                <div id="nHome" class="nbox tabs">
                    <span class="left yellow" onclick="nkan('Home');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['home'];?> </p> 
                </div>

                <div id="nCampus" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('Campus');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['campus'];?> </p>     
                </div>
                    
                <div id="nGurukulTrust" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('GurukulTrust');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['trust'];?> </p> 
                </div>

                <div id="nMessages" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('Messages');"> Read in Kannada </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $info['message'];?> </p> 
                </div>	

                <div id="nvision&mission" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('vision&mission');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['vision'];?> </p> 
                </div>	
                
                <div id="nComputerLaboratory" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('ComputerLaboratory');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['computer'];?> </p> 
                </div>

                <div id="nScienceLaboratory" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('ScienceLaboratory');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['science'];?> </p> 
                </div>
                    
                <div id="nLibrary" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('Library');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['library'];?> </p> 
                </div>

                <div id="nAuditorium" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('Auditorium');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['auditorium'];?> </p> 
                </div>
                
                <div id="nSports" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('Sports');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['sports'];?> </p> 
                </div>

                <div id="nExtraCurricularActivities" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('ExtraCurricularActivities');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['extra'];?> </p> 
                </div>

                <div id="nWorkingHours" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('WorkingHours');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $info['working'];?> </p> 
                </div>

                <div id="nSchoolAdmission" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="nkan('SchoolAdmission');"> Read in Kannada </span>
                    <span class="right" onclick="closetabs();" >&#10060;</span>
                    <br><p> <?php echo $info['admission'];?> </p> 
                </div>

                <!-- kan -->
                <div id="nkHome" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Home');"> Read in Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['home'];?> </p> 
                </div>

                <div id="nkCampus" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Campus');"> Read in Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['campus'];?> </p>     
                </div>
                    
                <div id="nkGurukulTrust" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('GurukulTrust');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['trust'];?> </p> 
                </div>

                <div id="nkMessages" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Messages');"> Read in English </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $kinfo['message'];?> </p> 
                </div>	

                <div id="nkvision&mission" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('vision&mission');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['vision'];?> </p> 
                </div>	
                
                <div id="nkComputerLaboratory" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('ComputerLaboratory');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['computer'];?> </p> 
                </div>

                <div id="nkScienceLaboratory" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('ScienceLaboratory');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['science'];?> </p> 
                </div>
                    
                <div id="nkLibrary" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Library');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['library'];?> </p> 
                </div>

                <div id="nkAuditorium" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Auditorium');"> Read in English </span>
                    <span  onclick="closetabs();" class="right"> &#10060; </span>
                    <br><p> <?php echo $kinfo['auditorium'];?> </p> 
                </div>
                
                <div id="nkSports" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('Sports');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['sports'];?> </p> 
                </div>

                <div id="nkExtraCurricularActivities" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('ExtraCurricularActivities');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['extra'];?> </p> 
                </div>

                <div id="nkWorkingHours" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('WorkingHours');"> Read in English </span>
                    <span class="right" onclick="closetabs();"> &#10060; </span>
                    <br><p> <?php echo $kinfo['working'];?> </p> 
                </div>

                <div id="nkSchoolAdmission" class="nbox tabs" style="display:none">
                    <span class="left yellow" onclick="neng('SchoolAdmission');"> Read in English </span>
                    <span class="right" onclick="closetabs();" >&#10060;</span>
                    <br><p> <?php echo $kinfo['admission'];?> </p> 
                </div>
            <!-- -------------------------        details end       ------------------------------ -->

        <center>
          <!-- -------------------------       login  start       ---------------------------    -->
            <div id="nLogin" class="nbox tabs" style="display:none">
                <span class="right" onclick="closetabs();"> &#10060; </span>
                <header class="nloghead">
                    <label>Log In</label> 
                </header>  <hr class="nhr">
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
                        <input type="submit" class="nmybtn" value="Login" name="login">
                    </div>
                    <br>
                </form>    
            </div>
          <!-- -------------------------        login  end        ---------------------------    -->

          <!-- -------------------------    contact us start      ------------------------------ -->

            <div id="nContactUs" class="nbox tabs" style="display:none">
                <span class="right" onclick="closetabs();"> &#10060; </span>
                <header class="nconhead">
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
                        <input type="submit" class="ncon" style="float:left;" value="Submit" name="contact"><br><br><br>
                    </div>
                </form>    
            </div>
          <!-- -------------------------     contact us end       ------------------------------ -->
        </center>  

        <!-- -------------------------         gallery start       ------------------------------ -->
            <div id="nGallery" class="nbox tabs" style="display:none">
                    <span class="right" onclick="this.parentElement.style.display='none'">&#10060;</span><br><br>
                    
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

                <div id="nTeachingStaff" class="nbox tabs" style="display:none">
                <span class="right" onclick="this.parentElement.style.display='none'">&#10060;</span><br><br>   
                
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

            <div id="nNonTeachingStaff" class="nbox tabs" style="display:none">
                    <span class="right" onclick="this.parentElement.style.display='none'">&#10060;</span><br><br>   
                    
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

        <!-- -------------------------       Wall of fame start    ------------------------------ -->
            <div id="nWallofFame" class="wall tabs" style="display:none">
                <span  onclick="this.parentElement.style.display='none'" class="right sppad">&#10060;</span><br><br>   
                <center>       <?php
                            $db = mysqli_connect("localhost","root","12345678","gurukul");
                            if(!$db)
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $query=mysqli_query($db,"SELECT * FROM wof");
                            if($query)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                {
                                    ?>
                                        <div class="card padl">
                                            <img src="./<?php echo $row['image']; ?>" width="260px" height="200px" alt="Achiever's Images">
                                            <div class="white">
                                            <center>
                                                <label style="font-weight:bold;"><?php echo $row['name']; ?></label><br>
                                                <label><?php echo $row['achv']; ?></label><br>
                                                <label><?php echo $row['class']; ?></label>&nbsp;
                                                <label><?php echo $row['year']; ?></label><br>
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
                    </center>       
            </div>    
        <!-- -------------------------        wall of fame end     ------------------------------ --> 
    




    <script>

        function night() 
        {
            document.getElementById('day').style.display='none';
            document.getElementById('night').style.display='block';
        }
        
        function day() 
        {
            document.getElementById('night').style.display='none';
            document.getElementById('day').style.display='block';
        }

        function kan(tab) 
        {
            document.getElementById(tab).style.display='none';
            document.getElementById('k'+tab).style.display='block';
        }
        function eng(tab) 
        {
            document.getElementById('k'+tab).style.display='none';
            document.getElementById(tab).style.display='block';
        }

        function nkan(tab) 
        {
            document.getElementById('n'+tab).style.display='none';
            document.getElementById('nk'+tab).style.display='block';
        }
        function neng(tab) 
        {
            document.getElementById('nk'+tab).style.display='none';
            document.getElementById('n'+tab).style.display='block';
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
        var y = document.getElementsByClassName("nbox");
        for (i = 0; i < y.length; i++) 
        {
          y[i].style.display = "none";  
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

     // modal login 
     
        <?php 
        if ($error)
        {
          echo"alert('$error');";
        } ?>
  
    </script>
</body>
</hrtml>