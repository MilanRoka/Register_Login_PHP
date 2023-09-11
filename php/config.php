<?php
/*database configuration
user "root", password ""
*/

define ('DB_SERVER','localhost');
define ('DB_USENAME','root');
define ('DB_PASSWORD','');
define ('DB_NAME','login');

//connect to database
$con = mysqli_connect(DB_SERVER, DB_USENAME, DB_PASSWORD, DB_NAME);

//check connection
if($con === false){
    dir("Error: Could not connect.");
}

?>