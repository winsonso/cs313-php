<!DOCTYPE html>
<html>
  <head>
    <title>Content</title>
    <link rel="stylesheet" href="css/newstyle.css">
  </head>
  <body>
    <h2>ADD DATA</h2>
    <form id="mainForm" action="insertToDb.php" method="POST">
      <label for="txtBooK">Date</label>
      <select>
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
      <input type="text" id="year" name="year" placeholder="YEAR" length="4"></input>
      <br /><br />

      <label for="living_exp">Living Expense</label>
      <input type="text" id="living_exp" name="living_exp"></input>
      <br /><br />

      <label for="food_exp">Food Expense</label>
      <input type="text" id="food_exp" name="food_exp"></input>
      <br /><br />

      <label for="tithing">Tithing</label><br />
      <input id="tithing" name="tithing" ></input>
      <br /><br />

      <label for="others">Others</label><br />
      <input id="others" name="others" ></input>
      <br /><br />

      <label for="saving">Saving</label><br />
      <input id="saving" name="saving" ></input>
      <br /><br />

        <button name="submit" type="submit">Submit</button>
    </form>
  </body>
</html>
