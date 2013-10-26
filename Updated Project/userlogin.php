<html>
<body bgcolor="green">
 
 <a href=main.php><font color=red>HOME</a><br><br><br>
			
</body>
</html>
<?php
    $Roll_No1 = $_POST['Roll_No'];
	$Mess_Id1 = $_POST['Mess_Id'];
	$choice1 =  $_POST["dropdown"];
	$Breakfast=0;
	$Lunch=0;
	$Snacks=0;
	$Dinner=0;
	
	if(!strcmp($choice1,"Breakfast"))
	$Breakfast=1;
	else if(!strcmp($choice1,"Lunch"))
	$Lunch=1;
	else if(!strcmp($choice1,"Snacks"))
	$Snacks=1;
	else if(!strcmp($choice1,"Dinner"))
	$Dinner=1;
	if($Roll_No1 && $Mess_Id1)
	{

$connect = mysql_connect("localhost","root","") or die("Couldn't connect!");
         mysql_select_db("mess") or die("Couldn't find data in db");
   		 $query= mysql_query("SELECT * FROM messdetail WHERE Roll_No='$Roll_No1' and Mess_Id='$Mess_Id1'");
		 $numrows = mysql_num_rows($query);
		 if($numrows!=0)
		 {		   
         $query4= mysql_query("SELECT * FROM mealtable  WHERE Roll_No='$Roll_No1'");
		 $numrows4 = mysql_num_rows($query4);	
		 
               if($numrows4!=0)	
                {			   
                    if(!strcmp($choice1,"Breakfast"))
			        {
			          mysql_query("UPDATE mealtable set Breakfast=Breakfast+1 WHERE Roll_No='$Roll_No1'");
                      echo "successfully update"; 					  
		            }
				else if(!strcmp($choice1,"Lunch"))
                    {
					 mysql_query("UPDATE mealtable set Lunch=Lunch+1 WHERE Roll_No='$Roll_No1'");
                     echo "successfully update";
					}
				else if(!strcmp($choice1,"Snacks"))
                    {
					 mysql_query("UPDATE mealtable set Snacks=Snacks+1 WHERE Roll_No='$Roll_No1'");
                     echo "successfully update";
					}
				else if(!strcmp($choice1,"Dinner"))
                    {
					 mysql_query("UPDATE mealtable set Dinner=Dinner+1 WHERE Roll_No='$Roll_No1'");
                     echo "successfully update";
					}
					else{}
				}
               else
               {		 
                 $query1  = "INSERT INTO mealtable (";
						$query1 .= "Roll_No ,Mess_Id, Breakfast , Lunch ,Snacks , Dinner ";
					$query1 .= ") VALUES ("; 
					$query1 .= "' $Roll_No1','$Mess_Id1','$Breakfast' ,' $Lunch ' , ' $Snacks ',' $Dinner '";
						$query1 .= ")";
					$result = mysql_query($query1);
					if ($result)
					{
						echo "Success!";
					} else
					{
						die("Database query failed. " . mysql_error());
					}

               }   
		 }
		 else
		   die("no records found");
		   }
		   else
   die("Please enter  username and Password!");

?>	 