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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gurukul</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css2.css"> 
    <link rel="stylesheet" href="psn.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- modal--><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div>
      <img src="header.png" style="width:100%"></img>
    </div>

    <div id="navbar" >
      
      <a onclick="openTabs('Home')">Home</a>
      
      <div class="subnav">
        <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a onclick="openTabs('Campus')">Campus</a>
          <a onclick="openTabs('GurukulTrust')">Gurukul Trust</a>
          <a onclick="openTabs('Messages')">Messages</a>
          <a onclick="openTabs('vision&mission')">vision & mission</a>
        </div>
      </div> 
            
      <div class="subnav">
        <button class="subnavbtn">Facilities <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a onclick="openTabs('ComputerLaboratory')">Computer Laboratory</a>
          <a onclick="openTabs('ScienceLaboratory')">Science Laboratory</a>
          <a onclick="openTabs('Library')">Library</a>
          <a onclick="openTabs('Auditorium')">Auditorium</a>
        </div>
      </div> 
            
      <div class="subnav">
        <button class="subnavbtn">Academics <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a onclick="openTabs('Sports')">Sports</a>
          <a onclick="openTabs('ExtraCurricularActivities')">Extra Curricular Activities</a>
          <a onclick="openTabs('WorkingHours')">Working Hours</a>
          <a onclick="openTabs('SchoolAdmission')">School Admission</a>
        </div>
      </div> 
      
      <div class="subnav">
        <button class="subnavbtn">Faculties <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a onclick="openTabs('TeachingStaff')">Teaching Staff</a>
          <a onclick="openTabs('NonTeachingStaff')">Non-Teaching Staff</a>
        </div>
      </div> 
      
      <a onclick="openTabs('Gallery')">Gallery</a>
      <a onclick="openTabs('ContactUs')">Contact Us</a>
      <!-- Trigger the modal with a button -->
      <a id="myBtn"> Login</a>
      <!-- wall of frame -->
      <a onclick="openTabs('WallofFame')"> Wall of Fame</a>

    </div>

   <!--contents start ---------------------------------------------------------------------------------------------------------------  --> 
    <!-- Modal start -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <form method='POST'>
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span class="glyphicon"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
               <!-- <center>
                  <input type="radio" id="staff" name="des" value="staff">
                  <label for="staff">Staff</label> &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" id="student" name="des" value="student">
                  <label for="student">Student</label>	
                </center>   -->
                  <br>
              <div class="form-group">
                  <label for="user"><span class="glyphicon "></span> Username</label>
                  <input type="text" class="form-control" name="user" id="user" placeholder="Enter email">
              </div>
              <div class="form-group">
                  <label for="pass"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                  <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password">
              </div>
              <div class="checkbox">
                  <label><input type="checkbox" value="" checked>Remember me</label>
              </div>
                <button type="submit" class="orange  btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </div>
            <div class="modal-footer">
              <button type="submit" class="orange btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div> 


    <!-- Modal end -->

    <div id="Home" class="psn-container psn-display-container tabs">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['home'];?> </p> 
    </div>

    <div id="Campus" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['campus'];?> </p> 

    </div>
       
    <div id="GurukulTrust" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['trust'];?> </p> 
    </div>
 
    <div id="Messages" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['message'];?> </p> 
    </div>	
 
    <div id="vision&mission" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['vision'];?> </p> 
    </div>	
  
    <div id="ComputerLaboratory" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['computer'];?> </p> 
    </div>

    <div id="ScienceLaboratory" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['science'];?> </p> 
    </div>
      
    <div id="Library" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['library'];?> </p> 
    </div>

    <div id="Auditorium" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['auditorium'];?> </p> 
    </div>
    
    <div id="Sports" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['sports'];?> </p> 
    </div>

    <div id="ExtraCurricularActivities" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['extra'];?> </p> 
    </div>

    <div id="WorkingHours" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['working'];?> </p> 
    </div>

    <div id="SchoolAdmission" class="psn-container psn-display-container tabs" style="display:none">
      <span onclick="this.parentElement.style.display='none'" class="psn-button psn-large psn-display-topright">&times;</span>
      <p> <?php echo $info['admission'];?> </p> 
    </div>
        
   <!-- Gallery Start -->
    <div id="Gallery" class="psn-container psn-display-container tabs" style="display:none">
          <span onclick="this.parentElement.style.display='none'"
          class="psn-button psn-large psn-display-topright">&times;</span><br><br>
          
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

            ?>  &nbsp; 
            <?php
                  }
                  }
                
                  closedir($opendirectory);
              
              }
          ?>
    <!-- Gallery end-->
        
    <!--contents end ---------------------------------------------------------------------------------------------------------------- --> 


    <script>

      // closable tabs 
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

      // Sticky Top Nav Bar 
      window.onscroll = function() {myFunction()};
      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() 
      {
        if (window.pageYOffset >= sticky) 
        {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }
      }
      // modal login 
      $(document).ready(function()
      {
        <?php 
        if ($error)
        {
          echo"alert('$error');";
        } ?>
  
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>
  </body>
</html>