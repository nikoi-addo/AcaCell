<?php
if (isset($_GET)) {
  $date = $_GET['date'];
  echo $date;
  $today = date("Y-m-d H:i:s");
  if($date > $today ){
    echo "Date is greater than today";
    $result = strtotime($date) - strtotime($today);

    echo $result;
  }
  else {
    echo "I am lost now";
  }
}

else {
  echo "date was not picked";
}


 ?>
