<html>
<head>
<body bgcolor="blue">

</head>
 <pre> <font color=red><h3>WHERE PRICE OF ALL MEALS ARE
			                     BREAKFAST=10
			                     LUNCH    =25
			                     SNACKS   =10
			                     DINNER   =25</h3></font>
								 
			 </pre>
			 <a href=main.php><font color=red>HOME<a></font></a><br><br><br><br>
			 <font color=black><h3>DETAIL OF STUDENT:</h3></font>
			
</body>
</html>




<?php
  $Roll_No1 = $_POST['Roll_No'];
     $connect=mysql_connect("localhost","root","") or die("Couldn't connect!");
         mysql_select_db("mess") or die("Couldn't find data in db");
		
		  $query= mysql_query("SELECT * From messstudent Where Roll_No=$Roll_No1");
         $numrows = mysql_num_rows($query);
		 $query1= mysql_query("SELECT Mess_Name From messdetail Where Roll_No=$Roll_No1");
		  $row1= mysql_fetch_assoc($query1);
		 $query2= mysql_query("SELECT * From mealtable Where Roll_No=$Roll_No1");
		 $row2= mysql_fetch_assoc($query2);
		 $total=$row2['Breakfast']*10+$row2['Lunch']*25+$row2['Snacks']*10+$row2['Dinner']*25;
	    
		 if($numrows!=0)
		 {
		    Print "<table border cellpadding=3>";
			print "<tr>";
			print "<th>Roll_No:</th><th>Name:</th><th>Mess_Name:</th><th>Breakfast:</th><th>Lunch:</th><th>Snacks:</th><th>Dinner:</th><th>total:</th>";
		     while ($row = mysql_fetch_assoc($query))
			{
				print "<tr>";
				Print "<td>".$row['Roll_No'] . "</td> "; 
				Print " <td>".$row['Name'] . "</td> "; 
			}
			
			Print "<td>".$row1['Mess_Name'] . "</td> "; 
			Print "<td>".$row2['Breakfast'] . "</td> "; 
			Print "<td>".$row2['Lunch'] . "</td> "; 
			Print "<td>".$row2['Snacks'] . "</td> "; 
			Print "<td>".$row2['Dinner'] . "</td> ";
            Print " <td>".$total. "</td> "; 			
			print "</tr>";
			print "</tr>";
			print "</table>";
			
			
			
		 }
		
		 else
		   die("no records found");
?>