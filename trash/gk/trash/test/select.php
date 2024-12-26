<body>
<form method="post">
<select>
<option name="a" value="1">1</option>
<option name="a" value="2">2</option>
</select>
<select>
<option name="c" value="3">3</option>
<option name="c" value="4">4</option>
</select>
<input  name="submit" type="submit"/>
</form>
<?php
if(isset($_POST['submit']))
{
    $a=$_POST['a'];
    $b=$_POST['b'];
    //$c=$_POST['c'];
    //$d=$_POST['d'];
    $e=$_POST['a'].$_POST['c'];//.$_POST['c'].$_POST['d'];
    echo $e;
}
?>