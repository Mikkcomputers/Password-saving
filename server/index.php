<?php
// include "connection.php";
define("HOST","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DB_NAME","passwordsaving");
$conn = new mysqli(HOST,USERNAME,PASSWORD,DB_NAME);
// if (!$conn) {
//     echo "Error connection to server".connect_error;
// }
?>