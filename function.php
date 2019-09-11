<?php
ini_set('display_errors', 'Off');

function Error($Error)
{
	echo "<br /><br /><br /><br /><br /><br /><center><b><span style='color:#CD0000;'> " . $Error . "</span></b></center>";
}
function ConnectMysql()
{
	include("configs.php");
	$link=mysql_connect("" . $mysql_host . "","" . $mysql_user . "","" . $mysql_pass . "");
	
	if(!$link) {
	echo "Cannot connect to database!";
	}else{
	mysql_select_db("". $mysql_db . "",$link);
	}
}

function GetSrpResponse($username, $password)
{
  include("configs.php");
  $srp_command = "$srp6passwd_path $username $password";
  $srp_statement = system($srp6passwd_path, $retval);
  return $srp_statement;
}

function register()
{
include('configs.php');

if($core == 1) {
		if(isset($_POST['flags'])) {
		if($_POST['flags'] == "0") {
		$flags = "0";
		}elseif($_POST['flags'] == "8") {
		$flags = "1";
		}elseif($_POST['flags'] == "24") {
		$flags = "2";
		}
		
		}else{ echo '<script type="text/javascript">window.location = "index.php?error=Please select an expansion.";</script>'; exit(); }
		ConnectMysql();
		$user_chars = "#[^a-zA-Z0-9_\-]#";
		
        if ((empty($_POST["user"]))||(empty($_POST["password"])) ) {
				echo '<script type="text/javascript">window.location = "index.php?error=You did not enter all the required information.";</script>';
        } else {
                $username = strtoupper($_POST["user"]);
                $password = strtoupper($_POST["password"]);
                if (strlen($username) < 3) {
						echo '<script type="text/javascript">window.location = "index.php?error=Username is too short.";</script>';
						exit();
                };
                if (strlen($username) > 30) {
						echo '<script type="text/javascript">window.location = "index.php?error=Username is too long.";</script>';
						exit();
                };
                if (strlen($password) < 3) {
						echo '<script type="text/javascript">window.location = "index.php?error=Password is too short.";</script>';
						exit();
                };
                if (strlen($password) > 30) {
						echo '<script type="text/javascript">window.location = "index.php?error=Password is too long.";</script>';
						exit();
                };
                if (preg_match($user_chars,$username)) {
						echo '<script type="text/javascript">window.location = "index.php?error=Please only use A-Z and 0-9.";</script>';
						exit();
                };
                if (preg_match($user_chars,$password)) {
						echo '<script type="text/javascript">window.location = "index.php?error=Please only use A-Z and 0-9.";</script>';
						exit();
                };
                $username = mysql_real_escape_string($username);
                $password = mysql_real_escape_string($password);
                $qry = mysql_query("SELECT username FROM account WHERE username = '" . $username . "'");
				if (!$qry) {
					echo '<script type="text/javascript">window.location = "index.php?error=Error querying database.";</script>';
					exit();
				};
                if ($existing_username = mysql_fetch_assoc($qry)) {
                        foreach ($existing_username as $key => $value) {
                                $existing_username = $value;
                        };
                };
                $existing_username = strtoupper($existing_username);
                if ($existing_username == strtoupper($_POST['user'])) {
						echo '<script type="text/javascript">window.location = "index.php?error=Chosen username is already taken!";</script>';
						exit();
                };
				unset($qry);
				if($_POST['account_table'] == "sha") {
				$sha_pass_hash = sha1(strtoupper($username) . ":" . strtoupper($password));
				$register_sql = "INSERT INTO account (username, sha_pass_hash, expansion) VALUES ('" . $username . "','" . $sha_pass_hash . "','" . $flags . "')";
				}elseif($_POST['account_table'] == "srp") {
				$register_sql = GetSrpResponse();
				};
                $qry = mysql_query($register_sql);
				if (!$qry) {
					echo '<script type="text/javascript">window.location = "index.php?error=Error creating account.";</script>';
					exit();
				};
				echo '<br /><br /><br /><br /><br /><br /><center><span style="color:#41d600;">Your Account was successfully created!<br /></span></center>';
        };

}elseif($core == 2) {

		if(isset($_POST['flags'])) { $flags = "" . $_POST['flags'] . ""; }else{ echo '<script type="text/javascript">window.location = "index.php?error=Please select an expansion.";</script>'; exit(); }
		ConnectMysql();
		$user_chars = "#[^a-zA-Z0-9_\-]#";
		
        if ((empty($_POST["user"]))||(empty($_POST["password"])) ) {
				echo '<script type="text/javascript">window.location = "index.php?error=You did not enter all the required information.";</script>';
        } else {
                $username = strtoupper($_POST["user"]);
                $password = strtoupper($_POST["password"]);
                if (strlen($username) < 3) {
						echo '<script type="text/javascript">window.location = "index.php?error=Username is too short.";</script>';
						exit();
                };
                if (strlen($username) > 30) {
						echo '<script type="text/javascript">window.location = "index.php?error=Username is too long.";</script>';
						exit();
                };
                if (strlen($password) < 3) {
						echo '<script type="text/javascript">window.location = "index.php?error=Password is too short.";</script>';
						exit();
                };
                if (strlen($password) > 30) {
						echo '<script type="text/javascript">window.location = "index.php?error=Password is too long.";</script>';
						exit();
                };
                if (preg_match($user_chars,$username)) {
						echo '<script type="text/javascript">window.location = "index.php?error=Please only use A-Z and 0-9.";</script>';
						exit();
                };
                if (preg_match($user_chars,$password)) {
						echo '<script type="text/javascript">window.location = "index.php?error=Please only use A-Z and 0-9.";</script>';
						exit();
                };
                $username = mysql_real_escape_string($username);
                $password = mysql_real_escape_string($password);
                $qry = mysql_query("SELECT login FROM accounts WHERE login = '" . $username . "'");
				if (!$qry) {
					echo '<script type="text/javascript">window.location = "index.php?error=Error querying database.";</script>';
					exit();
				};
                if ($existing_username = mysql_fetch_assoc($qry)) {
                        foreach ($existing_username as $key => $value) {
                                $existing_username = $value;
                        };
                };
                $existing_username = strtoupper($existing_username);
                if ($existing_username == strtoupper($_POST['user'])) {
						echo '<script type="text/javascript">window.location = "index.php?error=Chosen username has already been taken.";</script>';
						exit();
                };
				unset($qry);
                $register_sql = "INSERT INTO accounts (login, password, flags) VALUES ('" . $username . "','" . $password . "','" . $flags . "')";
                $qry = mysql_query($register_sql);
				if (!$qry) {
					echo '<script type="text/javascript">window.location = "index.php?error=Error creating account.";</script>';
					exit();
				};
				echo '<br /><br /><br /><br /><br /><br /><center><span style="color:#00FFFF;">Congrats, Your account was successfully created!<br /></span></center>';
        };
}
}
?>