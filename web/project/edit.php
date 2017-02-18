<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit</title>
</head>
  <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }    
  </script>

<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['login_id']))
{
  $username = $_SESSION['username'];
  $login_id = $_SESSION['login_id'];
}
else
{
  header("Location: signIn.php");
  die(); // we always include a die after redirects.
}
?>

<?php

$record_id=$_GET['id'];

require("dbConnect.php");
  $db= get_db();

  foreach ($db->query('SELECT * from record where record_id='.$_GET["id"]) as $row)


?>

<body>
<h2>Edit Your Record</h2>

    <form id="mainForm" action="update.php" method="POST">
      <label for="">Date</label>
      <select name ="month" value='<?php echo $row['month'];?>'>
        <option value="Jan">Jan</option>
        <option value="Feb">Feb</option>
        <option value="Mar">Mar</option>
        <option value="Apr">Apr</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="Aug">Aug</option>
        <option value="Sept">Sept</option>
        <option value="Oct">Oct</option>
        <option value="Nov">Nov</option>
        <option value="Dec">Dec</option>
      </select>
      <input type="text" id="year" name="year" placeholder="YEAR" size="4" onkeypress="return isNumberKey(event)" value='<?php echo $row['year'];?>'></input>
      <br /><br />

      <label for="living_exp">Living Expense</label><br />
      <input type="text" id="living_exp" name="living_exp" placeholder="number only.." onkeypress="return isNumberKey(event)" value='<?php echo $row['living_exp'];?>'></input>
      <br /><br />

      <label for="food_exp">Food Expense</label><br />
      <input type="text" id="food_exp" name="food_exp" placeholder="number only.." onkeypress="return isNumberKey(event)" value='<?php echo $row['food_exp'];?>'></input>
      <br /><br />

      <label for="tithing">Tithing</label><br />
      <input type="text" id="tithing" name="tithing" placeholder="number only.." onkeypress="return isNumberKey(event)" value='<?php echo $row['tithing'];?>' ></input>
      <br /><br />

      <label for="others">Others</label><br />
      <input type="text" id="others" name="others" placeholder="number only.." onkeypress="return isNumberKey(event)" value='<?php echo $row['others'];?>' ></input>
      <br /><br />

      <label for="saving">Saving</label><br />
      <input type="text" id="saving" name="saving" placeholder="number only.." onkeypress="return isNumberKey(event)" value='<?php echo $row['saving'];?>' ></input>
      <br /><br />

        <button name="submit" type="submit">Update</button>
    </form>


  </body>
</html>