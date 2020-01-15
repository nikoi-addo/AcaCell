<?php
   //-- Connecting to "geolog" database, on "localhost" server: replace <USER> and <PASSWORD> variables with the ones which corresponds to your MySQL installation
   $mysqli = new mysqli('localhost', 'root', '', 'acacell members');
   if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      exit();
   }

   //-- Preparing parametrized INSERT
   if (!($stmt = $mysqli->prepare("INSERT INTO entries(Latitude, Longitude, Device, Annotation) VALUES (?, ?, ?, ?)"))) {
       echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }

   //-- Acquire GET parameters
   $latitude   = $_GET['lt'];
   $longitude  = $_GET['ln'];
   $device     = $_GET['d'];
   $annotation = $_GET['n'];

   //-- Bind GET parameters to prepared statement's variables
   if (!$stmt->bind_param("ddss", $latitude, $longitude, $device, $annotation)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }

   //-- Execute INSERT query
   if (!$stmt->execute()) {
       echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   }

   //-- Closing connection / cleanup
   $stmt->close();
   mysqli_close($mysqli);
?>
