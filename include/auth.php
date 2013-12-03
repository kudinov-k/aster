<?php
session_start();

if (isset($_REQUEST['logout']))
{
	session_destroy();
	header('Location: ?');
	exit();
}

if(!isset($_SESSION['user']))
{
	if(isset($_REQUEST["login"]) && isset($_REQUEST["password"]))
	{
		$query = "SELECT * FROM $db_name.users WHERE login='".$_REQUEST["login"]."' AND password=MD5('".$_REQUEST["password"]."') ";
		try {
			$sth = $dbh->query($query);
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}

		$row = $sth->fetch(PDO::FETCH_ASSOC);

		if (!$row) {
			$_SESSION['error_msg'][] = 'Login or password is incorrect!';
		}elseif(!$row['access']){
			$_SESSION['error_msg'][] = 'This user has no rights!';
		}else{
			if($row['access'] == 'all')
			{
				$row['access'] = false;
			}
			else
			{
				$access = explode(',', $row['access']);
				$row['access'] = "'".implode("','", $access)."'";
			}

			$_SESSION['user'] = $row;
		}

		header('Location: '. $_SERVER['REQUEST_URI']);
		exit();
	}
}