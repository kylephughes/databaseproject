<?php
if(!empty($_GET['email'])){
$to = "hughes72@students.rowan.edu";
$to1= "vivona70@students.rowan.edu";
$to2= "dijamc24@students.rowan.edu";
$subject = "New User";
$temp = $_GET['email'];
$message = "$temp wants access to maps";







mail($to, $subject,$message);
mail($to1,$subject,$message);
mail($to2,$subject,$message);
header("Location: schedule.html");
}


 else {
echo"Enter A Valid Email Address";
}
?>
