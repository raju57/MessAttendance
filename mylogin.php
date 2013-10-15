<?php
$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
{

$connect = mysql_connect("localhost","root","") or die("Couldn't connect!");
mysql_select_db("mylogin") or die("Couldn't find data in db");

$query= mysql_query("SELECT * From student WHERE username='$username'");
$numrows = mysql_num_rows($query);

	if ($numrows!=0)
	{
	//code to login
	 while ($row = mysql_fetch_assoc($query))
	 	{
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username==$dbusername&&$password==$dbpassword)
		{
			   echo"<a href='main1.php'>click</a>";
		}
		else
		 echo "Incorrect password!";
		
	}
	else
	die("That user does't exist!");

	
}
else
   die("Please enter  username and Password!");

?>
