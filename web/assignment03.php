<?php
//session_destroy(); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assignment03</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body style="text-align:center;">
<h3>Survey</h3>
<hr>
<?php
// // session_start();
if(isset( $_SESSION['counter'] ) ) 
{
  echo '<center> You have already voted </center><br> 
          <a href="week03.php">See the result</a>';
}
else 
{

echo '<form id="week03" action="week03.php" method="post">
            <span>What is your gender?</span>
  			<br>
            <span><input type="radio" name="gender" value="male">Male</span><br>
            <span><input type="radio" name="gender" value="female">Female</span><br><br>
            <span>Are you over 18?</span>
  			<br>
            <span><input type="radio" name="age" value="yes">Yes</span><br>
            <span><input type="radio" name="age" value="no">No</span><br><br>
            <span>Are you a college student? </span>
            <br>
            <span><input type="radio" name="occuption" value="yes">Yes</span><br>
            <span><input type="radio" name="occuption" value="no">No</span><br><br>
            <span>Do you like programming?</span>
            <br>
            <span><input type="radio" name="interest" value="yes">Yes</span><br>
            <span><input type="radio" name="interest" value="no">No</span><br><br>
            <br>

            <input type="submit" value="Submit">

        </form>
        <a href="week03.php">See the result</a>';
}
?>
</body>
</html>