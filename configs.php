<?php
$mysql_host = "localhost"; // Localhost
$mysql_user = "Username"; // Username
$mysql_pass = "Password"; // Password
$mysql_db = "Database"; // Logon/Realmd/Auth DB
$core = "1"; // 2 = Arcemu || 1 = Mangos/Trinity
$srp6passwd_path = "/some/path/to/the/srp6passwd/bin/srp6passwd"; // path to where github.com/skout23/srp6passwd is installed
global $link;
$link = mysqli_connect("$mysql_host", "$mysql_user", $mysql_pass, "$mysql_db");
?>