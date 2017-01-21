<!DOCTYPE html>
<html>
<head>
  <title>Survey Result</title>
</head>
<body>
<?php
session_start();
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $occuption = $_POST["occuption"];
    $interest = $_POST["interest"];

if($gender ===NULL)
{
  $result = fopen("result.txt","r") or die("Unable to open file!!");
    // fwrite($result, $person);

  if (filesize('result.txt') == 0)
  {
    $num = 0;
    $num2 = 0;
    $num3 = 0;
    $num4 = 0;
    $counter = 0;
  }
  else
  {
  while(!feof($result))
  {
   $str = fgets($result);
   $array[$counter] = (str_word_count($str, 1));
   $counter ++;
  }

  fclose($result);


  foreach ($array as $person) 
  {
    if($person[0] == "male")
    {
      $num ++;
    }
    if ($person[1] == "yes") 
    {
      $num2 ++;
    }
    if ($person[2] == "yes") 
    {
     $num3 += 1;
    }
    if ($person[3] == "yes") 
    {
      $num4 += 1;
    }
  }
}
}
else 
 {
    $_SESSION['counter'] = 1;
$num = 0;
$num2 = 0;
$num3 = 0;
$num4 = 0;
$counter = 0;

    $space = " ";
    $gender = $gender.$space;;
    $age = $age.$space;;
    $occuption = $occuption.$space;;
    $interest = $interest.$space;;


    $file = "./result.txt";
    
    if (filesize('result.txt') == 0)
    {
        file_put_contents($file, $gender, FILE_APPEND);
        file_put_contents($file, $age, FILE_APPEND);
        file_put_contents($file, $occuption,FILE_APPEND);
        file_put_contents($file, $interest, FILE_APPEND);
    }
    else
    {
        file_put_contents($file, "\n", FILE_APPEND);
        file_put_contents($file, $gender, FILE_APPEND);
        file_put_contents($file, $age, FILE_APPEND);
        file_put_contents($file, $occuption,FILE_APPEND);
        file_put_contents($file, $interest, FILE_APPEND);
    }


     $result = fopen($file,"r") or die("Unable to open file!!");
    // fwrite($result, $person);


while(!feof($result))
{
  $str = fgets($result);
  $array[$counter] = (str_word_count($str, 1));
  $counter ++;
}

fclose($result);


foreach ($array as $person) {
  if($person[0] == "male")
  {
    $num ++;
  }
  if ($person[1] == "yes") 
  {
    $num2 ++;
  }
  if ($person[2] == "yes") 
  {
    $num3 ++;
  }
  if ($person[3] == "yes") 
  {
    $num4 ++;
  }
}
}
echo "<center><h2>Result</h2></center><hr>";
echo "<center>People who did the survey :".$counter."</center><br>";
echo "<center>Male = ".$num."     Female = ".($counter-$num)."</center><br>";
echo "<center>People who are over 18 : Yes = ". $num2 ."     No = ".($counter-$num2)."</center><br>";
echo "<center>People who are college student : Yes = ". $num3 ."     No = ".($counter-$num3)."</center><br>";
echo "<center>People who like programming : Yes = ". $num4 ."     No = ".($counter-$num4)."</center><br>";

?>
</body>
</html>

