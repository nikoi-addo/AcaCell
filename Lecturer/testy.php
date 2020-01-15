<?php

//This is where you put the date, but I use the current date for this example
 $date = date("Y-m-d H:i:s");

 //Convert the variable date using strtotime and 30 minutes then format it again on the desired date format
 $add_min = date("Y-m-d H:i:s", strtotime($date . "+30 minutes"));
 echo  $date . "<br />"; //current date or whatever date you want to put in here
 echo  $add_min; //add 30 minutes

echo "<a href='testyy.php?date=" . $add_min ."'>Here</a>"
?>
