<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

    $currentDateTime = date('H:i:a');
    echo $currentDateTime;
    $ipaddress = $_SERVER["REMOTE_ADDR"];

	echo "Your IP is $ipaddress!";


?>

</body>
</html>
