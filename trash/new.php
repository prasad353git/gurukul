<html>
    <head> 
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
    <meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
    <style type="text/css"> 
     @media screen and (min-width: 500px) 
    { a { display: none } } 

    body
    {
        background-image: url('crack.gif');
        padding:0;
        margin:0;
        background-attachment: fixed;
        background-position: center; 
    }

    .go 
    {
        background-color:	#ff0000;
        color: #fff;
    }
    
    .button 
    {
     width: 10%;
     height: 10%;
     background-image:url('share.png');
     background-size: cover;
     background-position: center; 
    }
    
    .white 
    {
        color: #fff;
    }

    </style> 
    </head> 
<body>
    <center>
       <h1> <?php echo $_POST["name"]; ?></h1>
        <br> <h3> wishing you <br> HAPPY DEEPAWALI </h3>


<br><br>

<form action="new.php" method="post">
Enter Your Name: <input type="text" name="name">
<button type="new.php" class="go">GO</button>
</form>

<br>
<a href= "whatsapp://send?text= I wanna surprise U !!!  Plz Click This Link !!!  http://localhost/web/new.php" data-action="share/whatsapp/share"  target="_blank"> 
<button class="button"></button></a> 
</center>


</body>
</html>