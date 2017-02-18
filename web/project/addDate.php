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

// echo $_SESSION['username'];
// echo $_SESSION['login_id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Content</title>
    <link rel="stylesheet" href="css/newstyle.css">
  </head>
  <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }    
  </script>
  <body>
    <h2>ADD DATA</h2>
    <form id="mainForm" action="insertToDb.php" method="POST">
      <label for="txtBooK">Date</label>
      <select name ="month">
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
      <input type="text" id="year" name="year" placeholder="YEAR" size="4" onkeypress="return isNumberKey(event)"></input>
      <br /><br />

      <label for="living_exp">Living Expense</label><br />
      <input type="text" id="living_exp" name="living_exp" placeholder="number only.." onkeypress="return isNumberKey(event)"></input>
      <br /><br />

      <label for="food_exp">Food Expense</label><br />
      <input type="text" id="food_exp" name="food_exp" placeholder="number only.." onkeypress="return isNumberKey(event)"></input>
      <br /><br />

      <label for="tithing">Tithing</label><br />
      <input type="text" id="tithing" name="tithing" placeholder="number only.." onkeypress="return isNumberKey(event)" ></input>
      <br /><br />

      <label for="others">Others</label><br />
      <input type="text" id="others" name="others" placeholder="number only.." onkeypress="return isNumberKey(event)" ></input>
      <br /><br />

      <label for="saving">Saving</label><br />
      <input type="text" id="saving" name="saving" placeholder="number only.." onkeypress="return isNumberKey(event)" ></input>
      <br /><br />

        <button name="submit" type="submit">Submit</button>
    </form>
  </body>
</html>



