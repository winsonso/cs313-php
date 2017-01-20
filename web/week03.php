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

    $person = array(array('a','b','c'),array('aa','bb','bc'));
    print_r($person);
//     $var = 0;
    $result = fopen("result.txt","w") or die("Unable to open file!!");
    fwrite($result, $person);
// while(!feof($result)){
//    $array[$var] = fgets($result);
//    $var ++;
// }
// fclose($result);
// $t1 = ($array[0]+$happy);
// $t2 = ($array[1] + $hunger);
// $t3 = ($array[2] + $car);
// $t4 = ($array[3] +$student);
// echo "<center>Result</center>";
// echo "<br/><center>People who are happy: ". $t1 ."</center>";
// echo "<br/><center>People who are happy: ". $t2 ."</center>";
// echo "<br/><center>People who are happy: ". $t3 ."</center>";
// echo "<br/><center>People who are happy: ". $t4 ."</center>";
// $file = fopen("result.txt","w") or die("can't open fine");
// $final = ($t1 . "\n" . $t2 . "\n" . $t3 . "\n" . $t4 . "\n");
// fwrite($file,$final);
// fclose($file);
   //}
?>
</body>
</html>

