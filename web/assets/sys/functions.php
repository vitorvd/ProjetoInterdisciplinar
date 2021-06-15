<?php
class user
{		
	function LoggedIn()
	{
		@session_start();
		if (isset($_SESSION['cpf'], $_SESSION['ID']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function notBanned($odb)
	{
		$SQL = $odb -> prepare("SELECT `status` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$result = $SQL -> fetchColumn(0);
		if ($result == 0)
		{
			return true;
		}
		else
		{
			session_destroy();
			return false;
		}
	}
}

?>
