<?php
include "../phpqrcode/phpqrcode/qrlib.php";

$backColor = 0xFFFF00;
$foreColor = 0xFF00FF;
$course = $_GET['course'];

// Create a QR Code and export to SVG
QRcode::png("attendance.php?course=".$course);

 ?>