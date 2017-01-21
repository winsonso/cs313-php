<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Survey Result</title>
</head>
<body>
<?php
// session_start();
// if(isset( $_SESSION['counter'] ) ) {
//       echo "<center> You have already voted </center> ";
//    }else {
//      $_SESSION['counter'] = 1;
   
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $occuption = $_POST["occuption"];
    $interest = $_POST["interest"];

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

$counter = 0;
while(!feof($result))
{
  $str = fgets($result);
  $array[$counter] = (str_word_count($str, 1));
  $counter ++;
}

echo "toal is " . $counter;
print_r($array);

fclose($result);

foreach ($array as $person) {
  if($person[0] == "male")
  {
    $num += 1;
  }
  if ($person[1] == "yes") 
  {
    $num2 += 1;
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
// echo "Male :".$num."\t Female : ".($counter-$num)."\n";
// echo "Yes :".$num2;
// echo "No :".($counter-$num3);
// echo "Yes :".$num4;
// $t1 = ($array[0]+$happy);
// $t2 = ($array[1] + $hunger);
// $t3 = ($array[2] + $car);
// $t4 = ($array[3] +$student);

echo "<center>Result</center>\n";
echo "<center>People who did a survey :".$counter."</center>\n";
echo "<center>Male :".$num."\t Female : ".($counter-$num)."</center>\n";
echo "<center>People who are over 18 : Yes ". $num2 ."\t No : ".($counter-$num2)."</center>";
echo "<center>People who are college student : Yes ". $num3 ."\t No : ".($counter-$num3)."</center>";
echo "<center>People who like programming : Yes ". $num4 ."\t No : ".($counter-$num4)."</center>";
// echo "<br/><center>People who are happy: ". $t4 ."</center>";
// $file = fopen("result.txt","w") or die("can't open fine");
// $final = ($t1 . "\n" . $t2 . "\n" . $t3 . "\n" . $t4 . "\n");
// fwrite($file,$final);
// fclose($file);
   //}
?>
</body>
</html>

